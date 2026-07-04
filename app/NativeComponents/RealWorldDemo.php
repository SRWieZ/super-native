<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

/**
 * Ten "real app" proof-of-concept screens, each a bespoke, production-looking
 * mobile UI rendered entirely from PHP state. Every concept owns its own
 * composition in `real-world-demo.blade.php` (keyed on `layout`) — there is no
 * shared template, so a food-delivery home looks nothing like a music player.
 *
 * Photography is stable Unsplash (`images.unsplash.com/photo-…`); avatars are
 * `i.pravatar.cc` seeds so every face is distinct and deterministic. Icons are
 * Material names so they render on the Android screenshot target.
 */
class RealWorldDemo extends NativeComponent
{
    /** @var array<string, array<string, mixed>> */
    private array $examples = [
        // ── BiteClub — food delivery home ──────────────────────────────────
        'biteclub' => [
            'slug' => 'biteclub', 'title' => 'BiteClub', 'shortTitle' => 'Food delivery', 'layout' => 'food',
            'color' => '#FF4F1F', 'accent' => '#FFF1E8', 'dark' => '#1A0E08',
            'address' => '12 Rue Beauvoisine, Rouen',
            'hero' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=1200&q=85',
            'categories' => [
                ['label' => 'Sushi', 'icon' => 'set_meal'],
                ['label' => 'Burgers', 'icon' => 'lunch_dining'],
                ['label' => 'Pizza', 'icon' => 'local_pizza'],
                ['label' => 'Vegan', 'icon' => 'eco'],
                ['label' => 'Coffee', 'icon' => 'coffee'],
                ['label' => 'Bakery', 'icon' => 'bakery_dining'],
            ],
            'featured' => [
                ['name' => 'Maison Bao', 'tag' => 'Bao · Dumplings', 'eta' => '15–25 min', 'rating' => '4.9', 'promo' => 'Free delivery', 'image' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=700&q=80'],
                ['name' => 'Trattoria Nº7', 'tag' => 'Pasta · Wood-fired', 'eta' => '20–30 min', 'rating' => '4.8', 'promo' => '-20% today', 'image' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=700&q=80'],
            ],
            'restaurants' => [
                ['name' => 'Green & Grain', 'cuisine' => 'Poké · Healthy bowls', 'rating' => '4.7', 'reviews' => '1.2k', 'eta' => '18 min', 'fee' => 'Free', 'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80', 'promo' => 'Popular'],
                ['name' => 'Smoke House', 'cuisine' => 'Burgers · BBQ', 'rating' => '4.6', 'reviews' => '890', 'eta' => '24 min', 'fee' => '€1.90', 'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=600&q=80', 'promo' => null],
            ],
            'basketCount' => 3,
            'basketTotal' => '€34.80',
        ],

        // ── SyncUp — messaging inbox ────────────────────────────────────────
        'syncup' => [
            'slug' => 'syncup', 'title' => 'SyncUp', 'shortTitle' => 'Messaging', 'layout' => 'chat',
            'color' => '#3B82F6', 'accent' => '#EAF2FF', 'dark' => '#0B1220',
            'me' => 'https://i.pravatar.cc/150?u=syncup-me',
            'activeNow' => [
                ['name' => 'Emma', 'avatar' => 'https://i.pravatar.cc/150?u=emma'],
                ['name' => 'Noah', 'avatar' => 'https://i.pravatar.cc/150?u=noah'],
                ['name' => 'Léa', 'avatar' => 'https://i.pravatar.cc/150?u=lea'],
                ['name' => 'Sam', 'avatar' => 'https://i.pravatar.cc/150?u=sam'],
                ['name' => 'Ava', 'avatar' => 'https://i.pravatar.cc/150?u=ava'],
            ],
            'threads' => [
                ['name' => 'Emma Laurent', 'avatar' => 'https://i.pravatar.cc/150?u=emma', 'preview' => 'Typing…', 'time' => 'now', 'unread' => 2, 'online' => true, 'pinned' => true, 'typing' => true],
                ['name' => 'Design Guild', 'avatar' => 'https://i.pravatar.cc/150?u=guild', 'preview' => 'Noah: the new build renders 🔥', 'time' => '12m', 'unread' => 5, 'online' => true, 'pinned' => true, 'typing' => false],
                ['name' => 'Jason Meyer', 'avatar' => 'https://i.pravatar.cc/150?u=jason', 'preview' => '🎤 Voice message · 0:42', 'time' => '1h', 'unread' => 0, 'online' => false, 'pinned' => false, 'typing' => false],
                ['name' => 'Léa Dubois', 'avatar' => 'https://i.pravatar.cc/150?u=lea', 'preview' => 'Sent you the tickets ✅', 'time' => '2h', 'unread' => 0, 'online' => true, 'pinned' => false, 'typing' => false],
                ['name' => 'Camping Crew', 'avatar' => 'https://i.pravatar.cc/150?u=camp', 'preview' => 'You: parked by the river 🏕️', 'time' => 'Wed', 'unread' => 0, 'online' => false, 'pinned' => false, 'typing' => false],
                ['name' => 'Ava Rossi', 'avatar' => 'https://i.pravatar.cc/150?u=ava', 'preview' => 'Haha perfect, see you then', 'time' => 'Tue', 'unread' => 0, 'online' => false, 'pinned' => false, 'typing' => false],
            ],
        ],

        // ── VibePass — event ticket ─────────────────────────────────────────
        'vibepass' => [
            'slug' => 'vibepass', 'title' => 'VibePass', 'shortTitle' => 'Events', 'layout' => 'ticket',
            'color' => '#7C3AED', 'accent' => '#F4EEFF', 'dark' => '#160C2E',
            'hero' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1200&q=85',
            'event' => 'NativePHP The Vibe',
            'tagline' => 'Native app demos · community meetup · rooftop bar',
            'date' => 'Thu 24 Jul', 'time' => '19:30', 'venue' => 'La Cité', 'city' => 'Rouen',
            'pass' => ['holder' => 'Eser Deniz', 'section' => 'GA', 'seat' => 'B-12', 'gate' => '3', 'order' => 'SN-2049-B12'],
            'goingCount' => 128,
            'attendees' => [
                'https://i.pravatar.cc/150?u=a1', 'https://i.pravatar.cc/150?u=a2',
                'https://i.pravatar.cc/150?u=a3', 'https://i.pravatar.cc/150?u=a4',
                'https://i.pravatar.cc/150?u=a5',
            ],
        ],

        // ── Frame — photo feed ──────────────────────────────────────────────
        'frame' => [
            'slug' => 'frame', 'title' => 'Frame', 'shortTitle' => 'Photo feed', 'layout' => 'photo',
            'color' => '#E1306C', 'accent' => '#FDF2F8', 'dark' => '#1A1A1A',
            'stories' => [
                ['name' => 'Your story', 'avatar' => 'https://i.pravatar.cc/150?u=frame-me', 'me' => true],
                ['name' => 'maya', 'avatar' => 'https://i.pravatar.cc/150?u=maya', 'me' => false],
                ['name' => 'lucas', 'avatar' => 'https://i.pravatar.cc/150?u=lucas', 'me' => false],
                ['name' => 'aria', 'avatar' => 'https://i.pravatar.cc/150?u=aria', 'me' => false],
                ['name' => 'theo', 'avatar' => 'https://i.pravatar.cc/150?u=theo', 'me' => false],
            ],
            'post' => [
                'user' => 'maya.travels', 'avatar' => 'https://i.pravatar.cc/150?u=maya', 'verified' => true,
                'location' => 'Dordogne, France',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1100&q=85',
                'likes' => '8,421', 'caption' => 'Golden hour over the valley — no filter needed 🌄',
                'comments' => 214, 'time' => '2 hours',
            ],
            'peek' => [
                'user' => 'lucas.frames', 'avatar' => 'https://i.pravatar.cc/150?u=lucas', 'verified' => false,
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1100&q=85',
            ],
        ],

        // ── Pulse — microblog timeline ──────────────────────────────────────
        'pulse' => [
            'slug' => 'pulse', 'title' => 'Pulse', 'shortTitle' => 'Microblog', 'layout' => 'timeline',
            'color' => '#1D9BF0', 'accent' => '#EAF5FF', 'dark' => '#0A1622',
            'me' => 'https://i.pravatar.cc/150?u=pulse-me',
            'trends' => ['#Laravel13', '#NativePHP', '#BuildInPublic'],
            'posts' => [
                [
                    'name' => 'NativePHP', 'handle' => 'nativephp', 'verified' => true, 'avatar' => 'https://i.pravatar.cc/150?u=nativephp',
                    'time' => '2h', 'pinned' => true,
                    'text' => 'SuperNative makes the web view optional — but the Laravel mental model stays exactly the same. Blade in, native views out.',
                    'image' => null, 'replies' => '128', 'reposts' => '642', 'likes' => '3.1k', 'views' => '84k',
                ],
                [
                    'name' => 'Eser Deniz', 'handle' => 'srwiez', 'verified' => true, 'avatar' => 'https://i.pravatar.cc/150?u=eser',
                    'time' => '4h', 'pinned' => false,
                    'text' => 'Real app screens tell the story better than any component checklist. Shipping 10 concept apps today 👇',
                    'image' => 'https://images.unsplash.com/photo-1611606063065-ee7946f0787a?auto=format&fit=crop&w=900&q=80',
                    'replies' => '42', 'reposts' => '188', 'likes' => '1.8k', 'views' => '31k',
                ],
                [
                    'name' => 'Marion Klein', 'handle' => 'marionk', 'verified' => false, 'avatar' => 'https://i.pravatar.cc/150?u=marion',
                    'time' => '6h', 'pinned' => false,
                    'text' => 'Wait, this whole timeline is rendered from PHP state and it scrolls at 60fps? Okay, I\'m in.',
                    'image' => null, 'replies' => '17', 'reposts' => '54', 'likes' => '903', 'views' => '12k',
                ],
            ],
        ],

        // ── MarketNest — marketplace ────────────────────────────────────────
        'marketnest' => [
            'slug' => 'marketnest', 'title' => 'MarketNest', 'shortTitle' => 'Marketplace', 'layout' => 'market',
            'color' => '#F97316', 'accent' => '#FFF4E8', 'dark' => '#231404',
            'categories' => ['All', 'Tech', 'Home', 'Bikes', 'Audio'],
            'listings' => [
                ['title' => 'Framework Desktop 128GB', 'price' => '€2,450', 'was' => '€2,780', 'drop' => true, 'place' => 'Rouen · 2 km', 'verified' => true, 'saved' => true, 'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=700&q=80'],
                ['title' => 'Ryzen AI Mini PC', 'price' => '€1,780', 'was' => null, 'drop' => false, 'place' => 'Le Havre · 8 km', 'verified' => true, 'saved' => false, 'image' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=700&q=80'],
                ['title' => 'Herman Miller Aeron', 'price' => '€520', 'was' => '€690', 'drop' => true, 'place' => 'Rouen · 3 km', 'verified' => false, 'saved' => false, 'image' => 'https://images.unsplash.com/photo-1580480055273-228ff5388ef8?auto=format&fit=crop&w=700&q=80'],
                ['title' => 'Sony WH-1000XM5', 'price' => '€219', 'was' => null, 'drop' => false, 'place' => 'Elbeuf · 12 km', 'verified' => true, 'saved' => true, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=700&q=80'],
            ],
            'watch' => ['title' => 'Framework Desktop', 'sub' => 'Watched search · lowest price in 30 days', 'bars' => [34, 52, 40, 66, 48, 78, 58, 92]],
        ],

        // ── StayFlow — travel booking ───────────────────────────────────────
        'stayflow' => [
            'slug' => 'stayflow', 'title' => 'StayFlow', 'shortTitle' => 'Travel booking', 'layout' => 'travel',
            'color' => '#E11D48', 'accent' => '#FFF0F3', 'dark' => '#2A0710',
            'hero' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=85',
            'gallery' => [
                'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=400&q=80',
                'https://images.unsplash.com/photo-1449158743715-0a90ebb6d2d8?auto=format&fit=crop&w=400&q=80',
                'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=400&q=80',
            ],
            'name' => 'Riverside cabin retreat',
            'place' => 'Sarlat-la-Canéda, Dordogne',
            'rating' => '4.92', 'reviews' => '176', 'superhost' => true,
            'specs' => '4 guests · 2 bedrooms · 2 beds · 1 bath',
            'amenities' => [
                ['label' => 'River view', 'icon' => 'landscape'],
                ['label' => 'Fast Wi-Fi', 'icon' => 'wifi'],
                ['label' => 'Free parking', 'icon' => 'local_parking'],
                ['label' => 'Kitchen', 'icon' => 'kitchen'],
                ['label' => 'Pets OK', 'icon' => 'pets'],
            ],
            'host' => ['name' => 'Hosted by Claire', 'sub' => 'Superhost · 6 years hosting', 'avatar' => 'https://i.pravatar.cc/150?u=claire'],
            'checkIn' => '24 Jul', 'checkOut' => '27 Jul', 'guests' => '2 guests',
            'nightly' => '€106', 'nights' => 3, 'total' => '€338',
        ],

        // ── TuneDeck — music now-playing ────────────────────────────────────
        'tunedeck' => [
            'slug' => 'tunedeck', 'title' => 'TuneDeck', 'shortTitle' => 'Music', 'layout' => 'music',
            'color' => '#1DB954', 'accent' => '#E8FFF0', 'dark' => '#0A0A0A',
            'cover' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=1000&q=85',
            'track' => 'Midnight Compiler', 'artist' => 'The Async Waves', 'album' => 'Deep Work, Vol. 3',
            'elapsed' => '1:42', 'duration' => '3:58', 'progress' => 43,
            'queue' => [
                ['title' => 'Recursive Dreams', 'artist' => 'The Async Waves', 'len' => '4:12', 'cover' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?auto=format&fit=crop&w=200&q=80'],
                ['title' => 'Garbage Collector', 'artist' => 'Nullpointer', 'len' => '3:05', 'cover' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=200&q=80'],
                ['title' => 'Warm Cache', 'artist' => 'Lo-Fi Daemon', 'len' => '2:48', 'cover' => 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?auto=format&fit=crop&w=200&q=80'],
            ],
        ],

        // ── ShopRoom — product detail ───────────────────────────────────────
        'shoproom' => [
            'slug' => 'shoproom', 'title' => 'ShopRoom', 'shortTitle' => 'E-commerce', 'layout' => 'shop',
            'color' => '#2563EB', 'accent' => '#EAF0FF', 'dark' => '#0B1633',
            'brand' => 'ATELIER OAK',
            'name' => 'Nord Oak Lounge Chair',
            'hero' => 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?auto=format&fit=crop&w=1000&q=85',
            'thumbs' => [
                'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?auto=format&fit=crop&w=200&q=80',
                'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=200&q=80',
                'https://images.unsplash.com/photo-1493666438817-866a91353ca9?auto=format&fit=crop&w=200&q=80',
            ],
            'price' => '€349', 'was' => '€449', 'rating' => '4.8', 'reviews' => '312',
            'colors' => [['name' => 'Natural', 'hex' => '#D6B98C'], ['name' => 'Walnut', 'hex' => '#6B4A2B'], ['name' => 'Charcoal', 'hex' => '#2F2F2F']],
            'sizes' => ['Standard', 'Wide', 'Ottoman set'],
            'features' => ['Solid FSC oak frame', 'Boucle wool cushion, removable cover', 'Delivered in 3–5 days, free returns'],
            'cartCount' => 1,
        ],

        // ── FieldKit — offline field service ────────────────────────────────
        'fieldkit' => [
            'slug' => 'fieldkit', 'title' => 'FieldKit', 'shortTitle' => 'Field service', 'layout' => 'field',
            'color' => '#14B8A6', 'accent' => '#E6FFFA', 'dark' => '#0B1F1E',
            'tech' => 'Marc · Field tech',
            'syncPending' => 4, 'syncPercent' => 92,
            'order' => ['id' => 'WO-4471', 'title' => 'Inspect solar inverter', 'address' => 'La Ferme du Coteau, Bosc-le-Hard', 'priority' => 'High', 'due' => 'Today 14:00'],
            'checklist' => [
                ['label' => 'Isolate DC supply', 'done' => true],
                ['label' => 'Torque check on terminals', 'done' => true],
                ['label' => 'Log string voltages', 'done' => true],
                ['label' => 'Thermal scan of connectors', 'done' => true],
                ['label' => 'Photo evidence of fault', 'done' => true],
                ['label' => 'Customer signature', 'done' => false],
                ['label' => 'Restore & verify supply', 'done' => false],
            ],
            'photos' => [
                'https://images.unsplash.com/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=300&q=80',
                'https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=300&q=80',
                'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?auto=format&fit=crop&w=300&q=80',
            ],
            'queue' => [
                ['label' => 'WO-4471 checklist', 'state' => 'saved'],
                ['label' => '3 photos (4.2 MB)', 'state' => 'pending'],
                ['label' => 'WO-4468 signature', 'state' => 'synced'],
            ],
        ],
    ];

    /** @var array<string, mixed> */
    public array $example = [];

    public bool $isSaved = false;

    public function mount(): void
    {
        // CAPTURE_REAL_WORLD_SLUG is only used by the Android screenshot harness,
        // which temporarily boots a single concept at `/` to avoid relying on
        // navigation events while NativePHP's Android bridge is in flux.
        $slug = env('CAPTURE_REAL_WORLD_SLUG') ?: (string) $this->param('slug');
        $this->example = $this->examples[$slug] ?? $this->examples['biteclub'];
    }

    public function navTitle(): string
    {
        return (string) ($this->example['title'] ?? 'Real app demo');
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->displayMode('inline')
            ->scrollBehavior('collapse')
            ->subtitle((string) ($this->example['shortTitle'] ?? 'Real app concept'));
    }

    public function toggleSaved(): void
    {
        $this->isSaved = ! $this->isSaved;
    }

    public function render(): View
    {
        return view('real-world-demo');
    }
}
