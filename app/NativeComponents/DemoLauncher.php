<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

/**
 * Top-level launcher screen — lists every demo app in the project.
 * Tapping a row pushes that demo onto the navigation stack; the framework
 * TopBar (via StackLayout) provides a back chevron to return here.
 */
class DemoLauncher extends NativeComponent
{
    /**
     * Immutable master list of every demo, organised into logical sections.
     * Never mutated — searching filters a copy of this into [$groups], so
     * clearing the query restores the full set. Each group is
     * `['title' => string, 'demos' => array<int, array<string, string>>]`
     * and renders as a `<list-section>` in the view.
     *
     * @var array<int, array{title: string, demos: array<int, array<string, string>>}>
     */
    private array $allGroups = [
        [
            'title' => 'Fundamentals',
            'demos' => [
                ['id' => 'counter', 'title' => 'Counter', 'subtitle' => 'Minimal Livewire-style counter', 'icon' => 'add', 'color' => '#10B981', 'url' => '/counter'],
                ['id' => 'typography', 'title' => 'Typography & Colors', 'subtitle' => 'Sizes, theme tokens, tailwind palette', 'icon' => 'textformat.alt', 'color' => '#A855F7', 'url' => '/explore/typography'],
                ['id' => 'buttons', 'title' => 'Buttons', 'subtitle' => 'Variants, sizes, icons, states, pressable', 'icon' => 'square.and.pencil', 'color' => '#0EA5E9', 'url' => '/explore/buttons'],
                ['id' => 'buttonsform', 'title' => 'Buttons (Form)', 'subtitle' => 'Variants, sizes, extras in a NavigationStack + grouped form', 'icon' => 'list.bullet.rectangle', 'color' => '#0EA5E9', 'url' => '/buttons-form'],
                ['id' => 'icons', 'title' => 'Icons', 'subtitle' => 'IconHelper catalog + direct SF Symbols', 'icon' => 'star.fill', 'color' => '#EC4899', 'url' => '/explore/icons'],
                ['id' => 'layout', 'title' => 'Layout & Canvas', 'subtitle' => 'Flex, stack, canvas shapes, activity indicator', 'icon' => 'rectangle.3.group', 'color' => '#6366F1', 'url' => '/explore/layout'],
            ],
        ],
        [
            'title' => 'Components & Patterns',
            'demos' => [
                ['id' => 'cards', 'title' => 'Cards & Chips', 'subtitle' => 'Card variants, chips, badges, list items', 'icon' => 'rectangle.stack.fill', 'color' => '#F59E0B', 'url' => '/explore/cards'],
                ['id' => 'forms', 'title' => 'Slider', 'subtitle' => 'Text input, slider, toggle, checkbox, select, radio', 'icon' => 'square.text.square', 'color' => '#10B981', 'url' => '/explore/forms'],
                ['id' => 'sheets', 'title' => 'Sheets & Modals', 'subtitle' => 'Bottom-sheet detents, dismissible + blocking modals', 'icon' => 'square.on.square', 'color' => '#A855F7', 'url' => '/explore/sheets'],
                ['id' => 'menus', 'title' => 'Menus', 'subtitle' => 'Tap-to-open dropdowns on Pressable, Button, ListItem.trailing', 'icon' => 'ellipsis.circle', 'color' => '#0891B2', 'url' => '/explore/menus'],
                ['id' => 'mail', 'title' => 'Mail Inbox', 'subtitle' => 'Pull-to-refresh + leading/trailing swipe actions', 'icon' => 'envelope.fill', 'color' => '#0EA5E9', 'url' => '/mail-demo'],
                ['id' => 'refresh', 'title' => 'Pull to refresh', 'subtitle' => 'Native pull-to-refresh on custom card content', 'icon' => 'arrow.clockwise', 'color' => '#10B981', 'url' => '/refreshable-demo'],
                ['id' => 'reactivity', 'title' => 'Reactivity', 'subtitle' => '#[Computed], #[Poll] and #[Lazy] placeholder in one screen', 'icon' => 'bolt.fill', 'color' => '#8B5CF6', 'url' => '/reactivity'],
                //                ['id' => 'eventchannel', 'title' => 'Event Channel Test', 'subtitle' => 'Native → PHP payload > 4KB (growable event buffer)', 'icon' => 'arrow.up.arrow.down', 'color' => '#EF4444', 'url' => '/event-channel-test'],
                //                ['id' => 'vibe', 'title' => 'Vibe — Live Events', 'subtitle' => 'Websocket broadcast events (Vask/Reverb) into a component', 'icon' => 'antenna.radiowaves.left.and.right', 'color' => '#22C55E', 'url' => '/vibe'],
                //                ['id' => 'vibe-private', 'title' => 'Vibe — Private Channel', 'subtitle' => 'Authenticated private-channel subscription (bearer + /broadcasting/auth)', 'icon' => 'lock.fill', 'color' => '#16A34A', 'url' => '/vibe-private'],
                //                ['id' => 'vibe-presence', 'title' => 'Vibe — Presence', 'subtitle' => 'Who\'s online + live join/leave (here/joining/leaving)', 'icon' => 'person.2.fill', 'color' => '#15803D', 'url' => '/vibe-presence'],
//                                ['id' => 'geo-watch', 'title' => 'Geo — Watch Position', 'subtitle' => 'Streaming GPS fixes (watchPosition/clearWatch)', 'icon' => 'location.fill', 'color' => '#F97316', 'url' => '/geo-watch'],
            ],
        ],
        [
            'title' => 'Motion & Chrome',
            'demos' => [
                ['id' => 'gestures', 'title' => 'Gestures', 'subtitle' => 'Double-tap (@doubleTap) ', 'icon' => 'hand.tap.fill', 'color' => '#6366F1', 'url' => '/gestures'],
                ['id' => 'transitions', 'title' => 'Page Transitions', 'subtitle' => 'Fade, slide, scale - every @navigate animation', 'icon' => 'arrow.left.arrow.right', 'color' => '#14B8A6', 'url' => '/transitions'],
                ['id' => 'animate', 'title' => 'Animations', 'subtitle' => 'Awesome native animations', 'icon' => 'sparkles', 'color' => '#F59E0B', 'url' => '/animate'],
                ['id' => 'glass', 'title' => 'Glass', 'subtitle' => 'Liquid Glass Demo', 'icon' => 'drop.fill', 'color' => '#0EA5E9', 'url' => '/glass'],
                ['id' => 'nativetabs', 'title' => 'Native Tabs', 'subtitle' => 'TabView-rendered bottom bar; Liquid Glass on iOS 26+', 'icon' => 'rectangle.split.3x1', 'color' => '#A855F7', 'url' => '/native-tabs'],
                ['id' => 'drawer', 'title' => 'Side Drawer', 'subtitle' => 'X-style slide-out nav — modal + reveal, declared once on the layout', 'icon' => 'line.3.horizontal', 'color' => '#6366F1', 'url' => '/drawer'],
                ['id' => 'syncupnative', 'title' => 'SyncUp Messaging', 'subtitle' => 'Login, chat threads, friends, profile (5 screens) — custom chrome', 'icon' => 'bubble.left.fill', 'color' => '#0891b2', 'url' => '/syncup-native/login'],
            ],
        ],
        [
            'title' => 'Mini Apps',
            'demos' => [
                ['id' => 'tabs', 'title' => 'Search Demo', 'subtitle' => 'TabsLayout + StackLayout (Home / Browse / Profile + push detail)', 'icon' => 'dashboard', 'color' => '#6366F1', 'url' => '/tabs'],
                ['id' => 'twitter', 'title' => 'Twitter / X', 'subtitle' => 'Feed, tweet detail, profile, compose', 'icon' => 'bubble.left.and.bubble.right.fill', 'color' => '#1D9BF0', 'url' => '/twitter'],
                ['id' => 'ikea', 'title' => 'IKEA', 'subtitle' => 'Home, product detail, cart, search', 'icon' => 'bed.double.fill', 'color' => '#0058A3', 'url' => '/ikea'],
                ['id' => 'facebook', 'title' => 'Facebook', 'subtitle' => 'Feed, post, profile, create', 'icon' => 'person.2.fill', 'color' => '#1877F2', 'url' => '/facebook'],
                ['id' => 'instagram', 'title' => 'Instagram', 'subtitle' => 'Feed, post, profile, search', 'icon' => 'camera', 'color' => '#E1306C', 'url' => '/instagram'],
                ['id' => 'spotify', 'title' => 'Spotify', 'subtitle' => 'Home, playlist, artist, search', 'icon' => 'music.note', 'color' => '#1DB954', 'url' => '/spotify'],
                ['id' => 'youtube', 'title' => 'YouTube', 'subtitle' => 'Home, video, channel, search', 'icon' => 'play.rectangle.fill', 'color' => '#FF0000', 'url' => '/youtube'],
            ],
        ],
        [
            'title' => 'Real App Concepts',
            'demos' => [
                ['id' => 'biteclub', 'title' => 'BiteClub', 'subtitle' => 'Food delivery: restaurant cards, dish detail, cart state', 'icon' => 'fork.knife', 'color' => '#FF6B35', 'url' => '/real-world/biteclub'],
                ['id' => 'syncup-concept', 'title' => 'SyncUp', 'subtitle' => 'Messaging: chat threads, presence, native tabs', 'icon' => 'bubble.left.and.bubble.right.fill', 'color' => '#0891B2', 'url' => '/real-world/syncup'],
                ['id' => 'vibepass', 'title' => 'VibePass', 'subtitle' => 'Events: RSVP, ticket detail, QR pass flow', 'icon' => 'ticket.fill', 'color' => '#7C3AED', 'url' => '/real-world/vibepass'],
                ['id' => 'frame', 'title' => 'Frame', 'subtitle' => 'Photo feed: stories, post detail, profile grid', 'icon' => 'camera.fill', 'color' => '#E1306C', 'url' => '/real-world/frame'],
                ['id' => 'pulse', 'title' => 'Pulse', 'subtitle' => 'Microblog: timeline, profile, composer', 'icon' => 'quote.bubble.fill', 'color' => '#1D9BF0', 'url' => '/real-world/pulse'],
                ['id' => 'marketnest', 'title' => 'MarketNest', 'subtitle' => 'Marketplace: listings, filters, favourites, seller cards', 'icon' => 'tag.fill', 'color' => '#F97316', 'url' => '/real-world/marketnest'],
                ['id' => 'stayflow', 'title' => 'StayFlow', 'subtitle' => 'Travel booking: search, stay detail, reserve sheet', 'icon' => 'house.fill', 'color' => '#FF385C', 'url' => '/real-world/stayflow'],
                ['id' => 'tunedeck', 'title' => 'TuneDeck', 'subtitle' => 'Music: playlists, artist pages, mini-player', 'icon' => 'music.note', 'color' => '#1DB954', 'url' => '/real-world/tunedeck'],
                ['id' => 'shoproom', 'title' => 'ShopRoom', 'subtitle' => 'E-commerce: product cards, cart, checkout progress', 'icon' => 'bag.fill', 'color' => '#0058A3', 'url' => '/real-world/shoproom'],
                ['id' => 'fieldkit', 'title' => 'FieldKit', 'subtitle' => 'Offline field service: jobs, checklist, sync state', 'icon' => 'checklist', 'color' => '#0F766E', 'url' => '/real-world/fieldkit'],
            ],
        ],
    ];

    /**
     * Displayed groups — what the view renders. Starts as the full master set
     * and is narrowed by [findADemo] (empty groups are dropped).
     *
     * @var array<int, array{title: string, demos: array<int, array<string, string>>}>
     */
    public array $groups = [];

    public function mount(): void
    {
        $this->groups = $this->allGroups;
    }

    /**
     * Returning from a pushed demo resets the native search field to empty, so
     * clear the filter to keep the list in sync with the (now blank) search bar.
     */
    public function onResume(): void
    {
        $this->groups = $this->allGroups;
    }

    public function navTitle(): string
    {
        return 'SuperNative Demo';
    }

    /** Root screen — nothing to pop back to, hide the chevron. */
    public function showsNavBack(): bool
    {
        return false;
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->displayMode('large')
            ->searchBar('Find a demo...', 'findADemo')
            ->scrollBehavior('collapse')
            ->subtitle('Tap a demo to launch');
    }

    public function findADemo($query): void
    {
        $needle = trim($query);

        if ($needle === '') {
            $this->groups = $this->allGroups;

            return;
        }

        $lower = str($needle)->lower();

        $this->groups = collect($this->allGroups)
            ->map(function ($group) use ($lower) {
                $group['demos'] = collect($group['demos'])
                    ->filter(fn ($demo) => str($demo['title'])->lower()->contains($lower))
                    ->values()
                    ->toArray();

                return $group;
            })
            ->filter(fn ($group) => count($group['demos']) > 0)
            ->values()
            ->toArray();
    }

    public function render(): View
    {
        return view('native.demo-launcher');
    }
}
