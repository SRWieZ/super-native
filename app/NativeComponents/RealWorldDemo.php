<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

class RealWorldDemo extends NativeComponent
{
    /** @var array<string, array<string, mixed>> */
    private array $examples = [
        'biteclub' => [
            'slug' => 'biteclub', 'title' => 'BiteClub', 'shortTitle' => 'Food delivery', 'layout' => 'food',
            'color' => '#FF4F1F', 'accent' => '#FFF1E8', 'dark' => '#22110B', 'icon' => 'fork.knife',
            'hero' => 'Dinner in 22 minutes', 'subtitle' => 'Restaurant discovery, menu detail, cart state and a checkout sheet from Laravel data.',
            'cover' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=1200&q=85',
            'avatar' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=300&q=80',
            'stats' => [['ETA','22 min'], ['Basket','€34.80'], ['Fee','€0']],
            'chips' => ['Popular', 'Open now', 'Free delivery', 'Under 30 min'],
            'items' => [
                ['title'=>'Maison Bao','subtitle'=>'Bao buns · cucumber salad · miso caramel','meta'=>'4.9 · 18 min','image'=>'https://images.unsplash.com/photo-1559847844-5315695dadae?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Pasta Club','subtitle'=>'Carbonara · burrata · tiramisu','meta'=>'€€ · 24 min','image'=>'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Image-led restaurant cards', 'Sticky cart state', 'Checkout sheet-ready'],
        ],
        'syncup' => [
            'slug' => 'syncup', 'title' => 'SyncUp', 'shortTitle' => 'Messaging', 'layout' => 'chat',
            'color' => '#0EA5E9', 'accent' => '#E0F7FF', 'dark' => '#082F49', 'icon' => 'bubble.left.and.bubble.right.fill',
            'hero' => 'Private threads that feel native', 'subtitle' => 'Presence, unread state, message previews and composer UI controlled from PHP.',
            'cover' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Online','7'], ['Unread','3'], ['Pinned','2']],
            'chips' => ['Friends', 'Work', 'Camper', 'Laravel'],
            'items' => [
                ['title'=>'Emma','subtitle'=>'Typing… still parked by the river?','meta'=>'now','image'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=240&q=80'],
                ['title'=>'Laravel Friends','subtitle'=>'New SuperNative build is rendering properly','meta'=>'12m','image'=>'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=240&q=80'],
                ['title'=>'Jason','subtitle'=>'Voice note · 0:42','meta'=>'1h','image'=>'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=240&q=80'],
            ],
            'proof' => ['Presence badges', 'Thread previews', 'Native composer'],
        ],
        'vibepass' => [
            'slug' => 'vibepass', 'title' => 'VibePass', 'shortTitle' => 'Events', 'layout' => 'ticket',
            'color' => '#7C3AED', 'accent' => '#F4EEFF', 'dark' => '#1E103B', 'icon' => 'ticket.fill',
            'hero' => 'Tonight: Laravel After Hours', 'subtitle' => 'Ticket detail, RSVP state, people going and QR-style pass layout.',
            'cover' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Going','128'], ['Starts','19:30'], ['Seat','B12']],
            'chips' => ['Nearby', 'Friends going', 'Saved', 'QR pass'],
            'items' => [
                ['title'=>'NativePHP meetup','subtitle'=>'Live demo, drinks and product Q&A','meta'=>'Rouen · Thu','image'=>'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Indie makers dinner','subtitle'=>'Tiny event, proper RSVP flow','meta'=>'8 seats left','image'=>'https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Ticket state', 'QR pass layout', 'RSVP actions'],
        ],
        'frame' => [
            'slug' => 'frame', 'title' => 'Frame', 'shortTitle' => 'Photo feed', 'layout' => 'photo',
            'color' => '#E1306C', 'accent' => '#FDF2F8', 'dark' => '#2D0B18', 'icon' => 'camera.fill',
            'hero' => 'A social photo feed, not a toy grid', 'subtitle' => 'Stories, large media, caption state and action chrome built as native views.',
            'cover' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Posts','42'], ['Likes','8.4k'], ['Stories','9']],
            'chips' => ['Stories', 'Reels', 'Profile', 'Saved'],
            'items' => [
                ['title'=>'@native.camp','subtitle'=>'Dordogne sunset from a native image card','meta'=>'1.2k likes','image'=>'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'@phpmobile','subtitle'=>'Post detail with native transition','meta'=>'342 comments','image'=>'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Stories rail', 'Media feed', 'Action chrome'],
        ],
        'pulse' => [
            'slug' => 'pulse', 'title' => 'Pulse', 'shortTitle' => 'Microblog', 'layout' => 'timeline',
            'color' => '#1D9BF0', 'accent' => '#EAF5FF', 'dark' => '#061B32', 'icon' => 'quote.bubble.fill',
            'hero' => 'A fast timeline rendered by PHP', 'subtitle' => 'Posts, composer, engagement counts and profile row patterns.',
            'cover' => 'https://images.unsplash.com/photo-1611606063065-ee7946f0787a?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Posts','287'], ['Boosts','1.8k'], ['Draft','1']],
            'chips' => ['Following', 'PHP', 'Native', 'For you'],
            'items' => [
                ['title'=>'NativePHP','subtitle'=>'SuperNative makes the web view optional, but the Laravel mental model stays.','meta'=>'Pinned','image'=>'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=240&q=80'],
                ['title'=>'Eser','subtitle'=>'Real app screens tell the story better than component checklists.','meta'=>'4m','image'=>'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=240&q=80'],
            ],
            'proof' => ['Composer card', 'Timeline cells', 'Engagement state'],
        ],
        'marketnest' => [
            'slug' => 'marketnest', 'title' => 'MarketNest', 'shortTitle' => 'Marketplace', 'layout' => 'market',
            'color' => '#F97316', 'accent' => '#FFF4E8', 'dark' => '#331400', 'icon' => 'tag.fill',
            'hero' => 'Local deals with filters that matter', 'subtitle' => 'Listings, saved searches, seller trust and price-drop state.',
            'cover' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Listings','64'], ['Saved','11'], ['Alerts','3']],
            'chips' => ['Local', 'Price drop', 'Verified', 'Pickup'],
            'items' => [
                ['title'=>'Framework Desktop 128GB','subtitle'=>'Watched search · seller verified','meta'=>'€2,450','image'=>'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Ryzen AI mini PC','subtitle'=>'Pickup near Rouen · new today','meta'=>'€1,780','image'=>'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Listing grid', 'Filters', 'Saved searches'],
        ],
        'stayflow' => [
            'slug' => 'stayflow', 'title' => 'StayFlow', 'shortTitle' => 'Travel booking', 'layout' => 'travel',
            'color' => '#FF385C', 'accent' => '#FFF0F3', 'dark' => '#3A0712', 'icon' => 'house.fill',
            'hero' => 'Book a quiet place near the river', 'subtitle' => 'Search dates, hero stay card, booking summary and reserve CTA.',
            'cover' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Nights','3'], ['Guests','2'], ['Total','€318']],
            'chips' => ['Cabins', 'Pet friendly', 'River', 'Map'],
            'items' => [
                ['title'=>'Cabin near Sarlat','subtitle'=>'4.92 · 16 km away · quiet river view','meta'=>'€106/night','image'=>'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Tiny house in Normandy','subtitle'=>'Free cancellation · workspace','meta'=>'€88/night','image'=>'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Booking state', 'Image cards', 'Reserve CTA'],
        ],
        'tunedeck' => [
            'slug' => 'tunedeck', 'title' => 'TuneDeck', 'shortTitle' => 'Music', 'layout' => 'music',
            'color' => '#1DB954', 'accent' => '#E8FFF0', 'dark' => '#06170C', 'icon' => 'music.note',
            'hero' => 'Now playing: native UI from Blade', 'subtitle' => 'Album art, playlist rows, artist cards and a persistent mini-player.',
            'cover' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Tracks','48'], ['Time','2h14'], ['Saved','9k']],
            'chips' => ['Focus', 'Indie', 'Live', 'Saved'],
            'items' => [
                ['title'=>'Code Focus','subtitle'=>'Deep work playlist · 48 tracks','meta'=>'Playing','image'=>'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'French indie','subtitle'=>'Fresh albums with horizontal scroll','meta'=>'Updated','image'=>'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Album art', 'Mini-player', 'Tab chrome'],
        ],
        'shoproom' => [
            'slug' => 'shoproom', 'title' => 'ShopRoom', 'shortTitle' => 'E-commerce', 'layout' => 'shop',
            'color' => '#0058A3', 'accent' => '#EAF3FF', 'dark' => '#071B33', 'icon' => 'bag.fill',
            'hero' => 'A storefront that looks shippable', 'subtitle' => 'Product detail, variants, cart quantity and checkout progress from Laravel state.',
            'cover' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Items','126'], ['Cart','4'], ['Total','€482']],
            'chips' => ['New', 'Furniture', 'Lighting', 'Cart'],
            'items' => [
                ['title'=>'Oak standing desk','subtitle'=>'Natural oak · 120×70 · in stock','meta'=>'€349','image'=>'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Warm ceramic lamp','subtitle'=>'Matte clay · dimmable','meta'=>'€69','image'=>'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Product detail', 'Variant chips', 'Cart state'],
        ],
        'fieldkit' => [
            'slug' => 'fieldkit', 'title' => 'FieldKit', 'shortTitle' => 'Offline field service', 'layout' => 'field',
            'color' => '#0F766E', 'accent' => '#E6FFFA', 'dark' => '#042F2E', 'icon' => 'checklist',
            'hero' => 'Work orders when the network dies', 'subtitle' => 'Offline jobs, checklist progress, photo evidence and sync queue UI.',
            'cover' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=1200&q=85',
            'stats' => [['Jobs','8'], ['Offline','Ready'], ['Sync','92%']],
            'chips' => ['Today', 'Offline', 'Photos', 'Signature'],
            'items' => [
                ['title'=>'Inspect solar inverter','subtitle'=>'5/7 checks complete · photo required','meta'=>'Due 14:00','image'=>'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=500&q=80'],
                ['title'=>'Replace Starlink cable','subtitle'=>'Offline note saved locally','meta'=>'No network','image'=>'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=500&q=80'],
            ],
            'proof' => ['Offline state', 'Checklist rows', 'Sync queue'],
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
