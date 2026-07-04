# SuperNative / NativePHP iOS screenshot handoff

Purpose: use Sir’s `SRWieZ/super-native` fork to capture the same 10 real-app SuperNative screenshots on **iOS**, so Sir can manually add a second screenshot to the existing Typefully drafts.

## Non-negotiables

- Use Sir’s fork: `https://github.com/SRWieZ/super-native.git`
- Use branch: `social/supernative-real-app-demos`
- Do **not** use the Hermes VM for Android/iOS simulator work.
- Do **not** update Typefully automatically unless Sir explicitly asks.
- Produce real iOS Simulator screenshots, not mockups, not browser screenshots.
- Screens should feel like app home/root screens: **no demo launcher chrome, no top back button**.
- Capture one screenshot per real app concept, plus an optional contact sheet for review.

## Current project state to preserve

The real-app demo work lives in these files:

```text
app/NativeComponents/RealWorldDemo.php
resources/views/native/real-world-demo.blade.php
routes/web.php
app/NativeComponents/DemoLauncher.php
```

The capture routes are direct chrome-less routes:

```text
/real-world/biteclub
/real-world/syncup
/real-world/vibepass
/real-world/frame
/real-world/pulse
/real-world/marketnest
/real-world/stayflow
/real-world/tunedeck
/real-world/shoproom
/real-world/fieldkit
```

The Typefully drafts already exist and already have Android screenshots. Sir wants iOS screenshots as a **second manual media pass**, not automatic publishing.

## Expected visual fixes already made on Android

Keep the same design intent on iOS:

- **BiteClub**: sushi/food category icon visible.
- **SyncUp**: search field and user names readable; no faded text.
- **VibePass**: event should say **NativePHP The Vibe**; Date / Doors / Venue labels and values visible.
- **MarketNest**: promo strip between categories and cards should not have buggy white spacing.
- **TuneDeck**: dark, Spotify-like, readable.
- **FieldKit**: dark/strong contrast; no invisible text.
- All screens: distinct layouts, real-app feel, portrait phone shape.

## Recommended iOS environment

Use a Mac with:

```bash
xcode-select -p
php -v          # prefer PHP 8.4+
composer -V
node -v         # Node 22+ if available
```

Install project dependencies:

```bash
git clone https://github.com/SRWieZ/super-native.git
cd super-native
git fetch origin
# Use the working SuperNative branch, not main
git checkout social/supernative-real-app-demos
composer install
npm install
```

If the branch does not include Sir’s latest local demo edits yet, ask Sir/JARVIS for the current patch before capturing. Do not silently capture from stale `main`.

## Verify before capture

Run the native smoke tests first:

```bash
php -l app/NativeComponents/RealWorldDemo.php
php -l resources/views/native/real-world-demo.blade.php
php -l routes/web.php
vendor/bin/pint app/NativeComponents/RealWorldDemo.php routes/web.php resources/views/native/real-world-demo.blade.php --test
php artisan test tests/Feature/Native/DemoLauncherTest.php tests/Feature/Native/DemoScreensSmokeTest.php --compact
```

Expected reference result from Android/VM301 was:

```text
42 tests passed
141 assertions
```

## iOS Simulator setup

Choose a common modern iPhone portrait target. Preferred:

```text
iPhone 15 / iPhone 15 Pro / iPhone 16-class simulator
portrait orientation
```

Boot a simulator:

```bash
xcrun simctl list devices available | grep -E "iPhone (15|16)"
open -a Simulator
# or boot a specific device:
xcrun simctl boot "iPhone 15" || true
```

Set portrait orientation if needed:

```bash
xcrun simctl io booted rotate portrait
```

## Capture strategy

Best strategy: launch each route directly with the NativePHP start URL/env override, then screenshot after the native tree renders.

For each slug:

```bash
SLUG=biteclub
export CAPTURE_REAL_WORLD_SLUG="$SLUG"
export NATIVEPHP_START_URL="/real-world/$SLUG"
php artisan optimize:clear
php artisan native:run ios --start-url="/real-world/$SLUG"
```

If `native:run ios --start-url` is not supported on the current NativePHP CLI, use the environment variables and/or app config used by NativePHP Mobile to set the initial URL:

```bash
CAPTURE_REAL_WORLD_SLUG="$SLUG" NATIVEPHP_START_URL="/real-world/$SLUG" php artisan native:run ios
```

If the route still does not change, temporarily set the route slug in `.env` before each run:

```bash
perl -0777 -i -pe 's/^CAPTURE_REAL_WORLD_SLUG=.*/CAPTURE_REAL_WORLD_SLUG='$SLUG'/m || $_ .= "\nCAPTURE_REAL_WORLD_SLUG='$SLUG'\n"' .env
perl -0777 -i -pe 's#^NATIVEPHP_START_URL=.*#NATIVEPHP_START_URL=/real-world/'$SLUG'#m || $_ .= "\nNATIVEPHP_START_URL=/real-world/'$SLUG'\n"' .env
php artisan optimize:clear
php artisan native:run ios
```

Wait until the screen is visually rendered. Do **not** capture while the app says `Loading…`.

## Screenshot commands

Create an output folder:

```bash
mkdir -p ~/Desktop/supernative-ios-screenshots
```

After each screen is rendered in the booted simulator:

```bash
xcrun simctl io booted screenshot ~/Desktop/supernative-ios-screenshots/${SLUG}.png
```

Repeat for all slugs:

```text
biteclub
syncup
vibepass
frame
pulse
marketnest
stayflow
tunedeck
shoproom
fieldkit
```

## Quality gate before handing back to Sir

Reject and fix before sending if any screenshot has:

- blank/white screen
- `Loading…`
- demo launcher chrome
- top navigation/back button
- unreadable white-on-white text
- repeated same-template design
- weird square-ish crop
- missing VibePass Date / Doors / Venue values
- TuneDeck not dark/music-like
- FieldKit weak contrast

Build a contact sheet for fast review:

```bash
python3 - <<'PY'
from PIL import Image, ImageDraw, ImageFont
from pathlib import Path
out = Path.home() / 'Desktop/supernative-ios-screenshots'
slugs = ['biteclub','syncup','vibepass','frame','pulse','marketnest','stayflow','tunedeck','shoproom','fieldkit']
imgs = []
for slug in slugs:
    p = out / f'{slug}.png'
    if not p.exists():
        raise SystemExit(f'Missing {p}')
    imgs.append((slug, Image.open(p).convert('RGB')))
thumb_w = 216
label_h = 44
gap = 28
cols = 5
rows = 2
thumbs = []
for slug, im in imgs:
    ratio = thumb_w / im.width
    thumb_h = int(im.height * ratio)
    thumbs.append((slug, im.resize((thumb_w, thumb_h), Image.LANCZOS)))
thumb_h = max(t.height for _, t in thumbs)
sheet = Image.new('RGB', (cols*thumb_w + (cols+1)*gap, rows*(thumb_h+label_h) + (rows+1)*gap), 'white')
d = ImageDraw.Draw(sheet)
try:
    font = ImageFont.truetype('/System/Library/Fonts/Supplemental/Arial Bold.ttf', 22)
except Exception:
    font = ImageFont.load_default()
for i, (slug, im) in enumerate(thumbs):
    r, c = divmod(i, cols)
    x = gap + c*(thumb_w+gap)
    y = gap + r*(thumb_h+label_h+gap)
    d.text((x, y), slug, fill='black', font=font)
    sheet.paste(im, (x, y+label_h))
sheet.save(out / 'contact-sheet.jpg', quality=94)
print(out / 'contact-sheet.jpg')
PY
```

## Existing Typefully drafts for manual update

Sir can manually add the iOS screenshot as a second media item to each draft:

| App | Draft |
|---|---|
| Overview / contact sheet | https://typefully.com/t/JIEGv7C |
| BiteClub | https://typefully.com/t/Sli4Cgh |
| SyncUp | https://typefully.com/t/94aqDN5 |
| VibePass | https://typefully.com/t/fvqvWW3 |
| Frame | https://typefully.com/t/Eku8H4k |
| Pulse | https://typefully.com/t/GzAQSbb |
| MarketNest | https://typefully.com/t/6ox2TcY |
| StayFlow | https://typefully.com/t/i8ccOjb |
| TuneDeck | https://typefully.com/t/3PU2Zpu |
| ShopRoom | https://typefully.com/t/LVjoeU9 |
| FieldKit | https://typefully.com/t/uj65hI0 |

## Final deliverable expected from the iOS agent

Return a folder containing:

```text
biteclub.png
syncup.png
vibepass.png
frame.png
pulse.png
marketnest.png
stayflow.png
tunedeck.png
shoproom.png
fieldkit.png
contact-sheet.jpg
```

And a short QA note:

```text
All 10 iOS screenshots rendered.
No Loading/blank screens.
No top back bar.
Text readability checked.
VibePass meta visible.
TuneDeck dark/readable.
FieldKit contrast OK.
```
