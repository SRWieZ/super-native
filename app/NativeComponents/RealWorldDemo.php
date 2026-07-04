<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

class RealWorldDemo extends NativeComponent
{
    /**
     * @var array<string, array{
     *     title: string,
     *     shortTitle: string,
     *     inspiration: string,
     *     subtitle: string,
     *     icon: string,
     *     color: string,
     *     accent: string,
     *     gradient: string,
     *     hero: string,
     *     cta: string,
     *     stats: array<int, array{label: string, value: string}>,
     *     chips: array<int, string>,
     *     cards: array<int, array{title: string, subtitle: string, meta: string, icon: string}>,
     *     proof: array<int, string>
     * }>
     */
    private array $examples = [
        'biteclub' => [
            'title' => 'BiteClub',
            'shortTitle' => 'Food delivery',
            'inspiration' => 'Uber Eats / Deliveroo',
            'subtitle' => 'Restaurant discovery, dish detail and a sticky basket flow rendered as native UI.',
            'icon' => 'fork.knife',
            'color' => '#FF6B35',
            'accent' => '#FFF2EC',
            'gradient' => '#FF8A4C',
            'hero' => 'Dinner in 22 minutes',
            'cta' => 'Checkout bottom sheet',
            'stats' => [
                ['label' => 'ETA', 'value' => '22 min'],
                ['label' => 'Basket', 'value' => '€34.80'],
                ['label' => 'Rating', 'value' => '4.8'],
            ],
            'chips' => ['Burgers', 'Sushi', 'Healthy', 'Open now'],
            'cards' => [
                ['title' => 'Maison Bao', 'subtitle' => 'Handmade buns, spicy cucumber, miso caramel', 'meta' => '€€ · 18-28 min', 'icon' => 'takeoutbag.and.cup.and.straw.fill'],
                ['title' => 'Pasta Club', 'subtitle' => 'Carbonara, burrata salad, tiramisu', 'meta' => 'Free delivery', 'icon' => 'flame.fill'],
                ['title' => 'Green Bowl', 'subtitle' => 'Offline cart state survives tab changes', 'meta' => 'Native sheet ready', 'icon' => 'leaf.fill'],
            ],
            'proof' => ['Native cards', 'Bottom sheet', 'Cart state in PHP'],
        ],
        'syncup' => [
            'title' => 'SyncUp',
            'shortTitle' => 'Messaging',
            'inspiration' => 'iMessage / WhatsApp / Discord',
            'subtitle' => 'Chat threads, presence badges and message actions driven by a PHP component.',
            'icon' => 'bubble.left.and.bubble.right.fill',
            'color' => '#0891B2',
            'accent' => '#ECFEFF',
            'gradient' => '#22D3EE',
            'hero' => 'Laravel state, native conversations',
            'cta' => 'Open thread',
            'stats' => [
                ['label' => 'Threads', 'value' => '18'],
                ['label' => 'Online', 'value' => '7'],
                ['label' => 'Unread', 'value' => '3'],
            ],
            'chips' => ['Typing', 'Presence', 'Pinned', 'Native tabs'],
            'cards' => [
                ['title' => 'Emma', 'subtitle' => 'Typing… want to meet near the river?', 'meta' => 'Now', 'icon' => 'person.crop.circle.fill'],
                ['title' => 'Laravel friends', 'subtitle' => 'Shared a new SuperNative build screenshot', 'meta' => '12 min', 'icon' => 'person.3.fill'],
                ['title' => 'Jason', 'subtitle' => 'Voice note placeholder with PHP action buttons', 'meta' => '1h', 'icon' => 'waveform'],
            ],
            'proof' => ['Livewire-like events', 'Native list', 'PHP message state'],
        ],
        'vibepass' => [
            'title' => 'VibePass',
            'shortTitle' => 'Events',
            'inspiration' => 'Eventbrite / Partiful / Meetup',
            'subtitle' => 'Event cards, RSVP state, ticket detail and QR pass layout without leaving Blade.',
            'icon' => 'ticket.fill',
            'color' => '#7C3AED',
            'accent' => '#F5F3FF',
            'gradient' => '#A78BFA',
            'hero' => 'Tonight: Laravel After Hours',
            'cta' => 'RSVP modal',
            'stats' => [
                ['label' => 'Going', 'value' => '128'],
                ['label' => 'Waitlist', 'value' => '14'],
                ['label' => 'Starts', 'value' => '19:30'],
            ],
            'chips' => ['Nearby', 'Free', 'Friends going', 'QR pass'],
            'cards' => [
                ['title' => 'NativePHP meetup', 'subtitle' => 'Talk, drinks, live demo screenshots', 'meta' => 'Rouen · Thu', 'icon' => 'calendar'],
                ['title' => 'Indie makers dinner', 'subtitle' => 'Tiny RSVP flow with a blocking modal', 'meta' => '8 seats left', 'icon' => 'sparkles'],
                ['title' => 'Campervan weekend', 'subtitle' => 'Offline ticket available after sync', 'meta' => 'Saved', 'icon' => 'qrcode'],
            ],
            'proof' => ['RSVP forms', 'Modal / sheet', 'Ticket screen'],
        ],
        'frame' => [
            'title' => 'Frame',
            'shortTitle' => 'Photo feed',
            'inspiration' => 'Instagram',
            'subtitle' => 'Stories, image feed, profile grid and composer patterns as native screens.',
            'icon' => 'camera.fill',
            'color' => '#E1306C',
            'accent' => '#FDF2F8',
            'gradient' => '#F97316',
            'hero' => 'A social photo app in PHP',
            'cta' => 'Open profile grid',
            'stats' => [
                ['label' => 'Posts', 'value' => '42'],
                ['label' => 'Likes', 'value' => '8.4k'],
                ['label' => 'Stories', 'value' => '9'],
            ],
            'chips' => ['Stories', 'Profile', 'Search', 'Composer'],
            'cards' => [
                ['title' => '@native.camp', 'subtitle' => 'Liquid glass card over a Dordogne sunset', 'meta' => '1.2k likes', 'icon' => 'photo.fill'],
                ['title' => '@phpmobile', 'subtitle' => 'Post detail navigates with a native transition', 'meta' => '342 comments', 'icon' => 'heart.fill'],
                ['title' => '@srwiez', 'subtitle' => 'Profile grid built from a PHP array', 'meta' => 'Saved', 'icon' => 'square.grid.3x3.fill'],
            ],
            'proof' => ['Image feed', 'Native transitions', 'Blade templates'],
        ],
        'pulse' => [
            'title' => 'Pulse',
            'shortTitle' => 'Microblog',
            'inspiration' => 'X / Threads / Bluesky',
            'subtitle' => 'Timeline, post detail, profile and compose flow for short-form social apps.',
            'icon' => 'quote.bubble.fill',
            'color' => '#1D9BF0',
            'accent' => '#EFF6FF',
            'gradient' => '#60A5FA',
            'hero' => 'A native timeline from PHP',
            'cta' => 'Compose post',
            'stats' => [
                ['label' => 'Posts', 'value' => '287'],
                ['label' => 'Reposts', 'value' => '1.8k'],
                ['label' => 'Draft', 'value' => '1'],
            ],
            'chips' => ['Timeline', 'Compose', 'Profile', 'Pull refresh'],
            'cards' => [
                ['title' => 'NativePHP', 'subtitle' => 'SuperNative makes the web view optional in v4.', 'meta' => 'Pinned', 'icon' => 'checkmark.seal.fill'],
                ['title' => 'Eser', 'subtitle' => 'Trying real app screens instead of toy demos.', 'meta' => '4 min', 'icon' => 'person.crop.circle'],
                ['title' => 'Laravel devs', 'subtitle' => 'The mental model feels close to Livewire.', 'meta' => 'Hot', 'icon' => 'flame.fill'],
            ],
            'proof' => ['Timeline cells', 'Compose form', 'Native refresh'],
        ],
        'marketnest' => [
            'title' => 'MarketNest',
            'shortTitle' => 'Marketplace',
            'inspiration' => 'Leboncoin / Vinted / Facebook Marketplace',
            'subtitle' => 'Listing cards, filters, favourites and seller detail for marketplace apps.',
            'icon' => 'tag.fill',
            'color' => '#F97316',
            'accent' => '#FFF7ED',
            'gradient' => '#FDBA74',
            'hero' => 'Find a tiny AI workstation deal',
            'cta' => 'Filter bottom sheet',
            'stats' => [
                ['label' => 'Listings', 'value' => '64'],
                ['label' => 'Saved', 'value' => '11'],
                ['label' => 'Alerts', 'value' => '3'],
            ],
            'chips' => ['Local', 'Saved search', 'Price drop', 'Seller card'],
            'cards' => [
                ['title' => 'Framework Desktop 128GB', 'subtitle' => 'Watched search with price history badge', 'meta' => '€2,450', 'icon' => 'desktopcomputer'],
                ['title' => 'Ryzen AI Max+ mini PC', 'subtitle' => 'Seller verified, pickup near Rouen', 'meta' => 'New today', 'icon' => 'cpu.fill'],
                ['title' => 'RTX workstation', 'subtitle' => 'Favourite state and offer button', 'meta' => 'Price drop', 'icon' => 'bolt.fill'],
            ],
            'proof' => ['Filter chips', 'Saved state', 'Listing detail'],
        ],
        'stayflow' => [
            'title' => 'StayFlow',
            'shortTitle' => 'Travel booking',
            'inspiration' => 'Airbnb / Booking.com',
            'subtitle' => 'Travel cards, date search, booking summary and premium Liquid Glass chrome.',
            'icon' => 'house.fill',
            'color' => '#FF385C',
            'accent' => '#FFF1F2',
            'gradient' => '#FB7185',
            'hero' => 'Book a quiet place near the river',
            'cta' => 'Reserve sheet',
            'stats' => [
                ['label' => 'Nights', 'value' => '3'],
                ['label' => 'Guests', 'value' => '2'],
                ['label' => 'Total', 'value' => '€318'],
            ],
            'chips' => ['Map card', 'Dates', 'Reviews', 'Reserve'],
            'cards' => [
                ['title' => 'Cabin near Sarlat', 'subtitle' => 'Large image card, rating and distance', 'meta' => '4.92 · €106/night', 'icon' => 'star.fill'],
                ['title' => 'Tiny house in Normandy', 'subtitle' => 'Booking state calculated in PHP', 'meta' => 'Free cancellation', 'icon' => 'calendar.badge.checkmark'],
                ['title' => 'Camper-friendly stop', 'subtitle' => 'Native sheet for filters and amenities', 'meta' => 'Pet friendly', 'icon' => 'mappin.and.ellipse'],
            ],
            'proof' => ['Image cards', 'Booking state', 'Native sheets'],
        ],
        'tunedeck' => [
            'title' => 'TuneDeck',
            'shortTitle' => 'Music',
            'inspiration' => 'Spotify / Apple Music',
            'subtitle' => 'Playlist home, artist detail, mini-player and glass tab bar for audio apps.',
            'icon' => 'music.note',
            'color' => '#1DB954',
            'accent' => '#ECFDF5',
            'gradient' => '#34D399',
            'hero' => 'Now playing: Native UI from Blade',
            'cta' => 'Open playlist',
            'stats' => [
                ['label' => 'Tracks', 'value' => '48'],
                ['label' => 'Time', 'value' => '2h 14'],
                ['label' => 'Saved', 'value' => '9k'],
            ],
            'chips' => ['Playlist', 'Artist', 'Search', 'Mini-player'],
            'cards' => [
                ['title' => 'Code Focus', 'subtitle' => 'Mini-player stays pinned above tabs', 'meta' => 'Playing', 'icon' => 'play.fill'],
                ['title' => 'French indie', 'subtitle' => 'Horizontal albums with native scroll', 'meta' => 'Updated', 'icon' => 'rectangle.stack.fill'],
                ['title' => 'Laravel radio', 'subtitle' => 'Artist cards rendered from PHP arrays', 'meta' => 'Live', 'icon' => 'antenna.radiowaves.left.and.right'],
            ],
            'proof' => ['Horizontal lists', 'Mini-player', 'Tab chrome'],
        ],
        'shoproom' => [
            'title' => 'ShopRoom',
            'shortTitle' => 'E-commerce',
            'inspiration' => 'IKEA / Zara / Shopify mobile',
            'subtitle' => 'Product listing, detail, cart, colour chips and checkout progress for shops.',
            'icon' => 'bag.fill',
            'color' => '#0058A3',
            'accent' => '#EFF6FF',
            'gradient' => '#FACC15',
            'hero' => 'A native storefront from Laravel data',
            'cta' => 'Add to cart',
            'stats' => [
                ['label' => 'Items', 'value' => '126'],
                ['label' => 'Cart', 'value' => '4'],
                ['label' => 'Total', 'value' => '€482'],
            ],
            'chips' => ['Colours', 'Cart', 'Search', 'Checkout'],
            'cards' => [
                ['title' => 'Oak standing desk', 'subtitle' => 'Variant chips and stock badge', 'meta' => '€349', 'icon' => 'table.furniture.fill'],
                ['title' => 'Warm lamp', 'subtitle' => 'Product detail with sticky action row', 'meta' => 'In stock', 'icon' => 'lightbulb.fill'],
                ['title' => 'Storage box', 'subtitle' => 'Cart quantity controlled in PHP', 'meta' => '2 in cart', 'icon' => 'shippingbox.fill'],
            ],
            'proof' => ['Product grid', 'Cart state', 'Checkout UI'],
        ],
        'fieldkit' => [
            'title' => 'FieldKit',
            'shortTitle' => 'Offline field service',
            'inspiration' => 'Notion / Linear / maintenance apps',
            'subtitle' => 'Jobs, checklists, photo capture placeholders and offline sync badges for B2B apps.',
            'icon' => 'checklist',
            'color' => '#0F766E',
            'accent' => '#F0FDFA',
            'gradient' => '#2DD4BF',
            'hero' => 'Offline-first work orders',
            'cta' => 'Complete job',
            'stats' => [
                ['label' => 'Jobs', 'value' => '8'],
                ['label' => 'Offline', 'value' => 'Ready'],
                ['label' => 'Sync', 'value' => '92%'],
            ],
            'chips' => ['Checklist', 'Camera', 'Secure storage', 'Sync queue'],
            'cards' => [
                ['title' => 'Inspect solar inverter', 'subtitle' => 'Checklist rows and photo capture action', 'meta' => 'Due 14:00', 'icon' => 'wrench.and.screwdriver.fill'],
                ['title' => 'Replace Starlink cable', 'subtitle' => 'Offline note saved locally before sync', 'meta' => 'No network', 'icon' => 'wifi.slash'],
                ['title' => 'Customer signature', 'subtitle' => 'Native modal for sign-off', 'meta' => 'Pending', 'icon' => 'signature'],
            ],
            'proof' => ['Offline UI', 'Device plugins', 'B2B workflows'],
        ],
    ];

    /** @var array<string, mixed> */
    public array $example = [];

    public bool $isSaved = false;

    public function mount(): void
    {
        $slug = (string) $this->param('slug');
        $this->example = $this->examples[$slug] ?? $this->examples['biteclub'];
    }

    public function navTitle(): string
    {
        return (string) ($this->example['title'] ?? 'Real app demo');
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->displayMode('large')
            ->scrollBehavior('collapse')
            ->subtitle((string) ($this->example['shortTitle'] ?? 'Real-world SuperNative'));
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
