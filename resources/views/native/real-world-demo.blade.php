@php
    $layout = $example['layout'];
    $c = $example['color'];
    $accent = $example['accent'];
    $dark = $example['dark'];
    $darkBg = in_array($layout, ['music', 'field'], true);
@endphp

<scroll-view class="w-full h-full" style="background-color: {{ $darkBg ? $dark : '#FFFFFF' }}">
    <column class="w-full gap-0">

    {{-- ══════════════════════════════════════════════════════════════════
         BiteClub — food delivery home
         ══════════════════════════════════════════════════════════════════ --}}
    @if ($layout === 'food')
        {{-- Location bar --}}
        <row class="w-full px-4 pt-3 pb-3 items-center justify-between bg-white">
            <column class="flex-1">
                <text class="text-[11] font-semibold" style="color: {{ $c }}">DELIVER TO ▾</text>
                <row class="items-center gap-1">
                    <icon name="location_on" :size="15" color="{{ $c }}" />
                    <text class="text-[14] font-bold text-[#1A0E08]" :maxLines="1">{{ $example['address'] }}</text>
                </row>
            </column>
            <image src="{{ $example['featured'][0]['image'] }}" class="w-[38] h-[38] rounded-full" :fit="2" />
        </row>

        {{-- Hero with search overlay --}}
        <stack class="w-full">
            <image src="{{ $example['hero'] }}" class="w-full h-[210]" :fit="2" />
            <column class="w-full h-[210] justify-end p-4 gap-3">
                <column class="gap-0">
                    <text class="text-[26] font-bold text-white">Dinner in 22 min</text>
                    <text class="text-[13] text-white">42 places open near you right now</text>
                </column>
                <row class="w-full items-center gap-2 bg-white rounded-2xl px-4 py-3">
                    <icon name="search" :size="20" color="#9A5B22" />
                    <text class="flex-1 text-[14] text-[#9A5B22]">Search restaurants or dishes</text>
                    <column class="w-[30] h-[30] rounded-full items-center justify-center" style="background-color: {{ $accent }}">
                        <icon name="tune" :size="16" color="{{ $c }}" />
                    </column>
                </row>
            </column>
        </stack>

        {{-- Category rail --}}
        <scroll-view horizontal>
            <row class="gap-4 px-4 py-4">
                @foreach ($example['categories'] as $i => $cat)
                    <column class="items-center gap-2 w-[62]">
                        <column class="w-[58] h-[58] rounded-2xl items-center justify-center" style="background-color: {{ $i === 0 ? $c : $accent }}">
                            <icon name="{{ $cat['icon'] }}" :size="26" color="{{ $i === 0 ? '#FFFFFF' : $c }}" />
                        </column>
                        <text class="text-[12] font-semibold text-[#1A0E08]">{{ $cat['label'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Featured horizontal cards --}}
        <row class="px-4 items-center justify-between">
            <text class="text-[19] font-bold text-[#1A0E08]">Featured tonight</text>
            <text class="text-[13] font-semibold" style="color: {{ $c }}">See all</text>
        </row>
        <scroll-view horizontal>
            <row class="gap-3 px-4 py-3">
                @foreach ($example['featured'] as $f)
                    <column class="w-[260] rounded-3xl bg-white gap-0" style="border-width:1;border-color: #F0E4DA">
                        <stack class="w-full">
                            <image src="{{ $f['image'] }}" class="w-[260] h-[150] rounded-t-3xl" :fit="2" />
                            <row class="p-3 justify-between">
                                <row class="items-center gap-1 rounded-full px-2 py-1" style="background-color: {{ $c }}">
                                    <icon name="bolt" :size="13" color="#FFFFFF" />
                                    <text class="text-[11] font-bold text-white">{{ $f['promo'] }}</text>
                                </row>
                            </row>
                        </stack>
                        <column class="px-3 pb-3 pt-1 gap-1">
                            <text class="text-[17] font-bold text-[#1A0E08]">{{ $f['name'] }}</text>
                            <text class="text-[13] text-[#8A6A56]">{{ $f['tag'] }}</text>
                            <row class="items-center gap-3 pt-1">
                                <row class="items-center gap-1">
                                    <icon name="star" :size="14" color="#F5A623" />
                                    <text class="text-[13] font-bold text-[#1A0E08]">{{ $f['rating'] }}</text>
                                </row>
                                <row class="items-center gap-1">
                                    <icon name="schedule" :size="14" color="#8A6A56" />
                                    <text class="text-[13] text-[#8A6A56]">{{ $f['eta'] }}</text>
                                </row>
                            </row>
                        </column>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Restaurant list --}}
        <column class="px-4 pt-2 pb-1">
            <text class="text-[19] font-bold text-[#1A0E08]">All restaurants</text>
        </column>
        <column class="px-4 gap-3">
            @foreach ($example['restaurants'] as $r)
                <row class="w-full rounded-3xl bg-white p-3 gap-3 items-center" style="border-width:1;border-color: #F0E4DA">
                    <image src="{{ $r['image'] }}" class="w-[92] h-[92] rounded-2xl" :fit="2" />
                    <column class="flex-1 gap-1">
                        <row class="items-center justify-between">
                            <text class="text-[16] font-bold text-[#1A0E08]" :maxLines="1">{{ $r['name'] }}</text>
                            @if ($r['promo'])
                                <row class="items-center gap-1 rounded-full px-2 py-0.5" style="background-color: {{ $accent }}">
                                    <icon name="local_fire_department" :size="12" color="{{ $c }}" />
                                    <text class="text-[10] font-bold" style="color: {{ $c }}">{{ $r['promo'] }}</text>
                                </row>
                            @endif
                        </row>
                        <text class="text-[13] text-[#8A6A56]">{{ $r['cuisine'] }}</text>
                        <row class="items-center gap-3 pt-1">
                            <row class="items-center gap-1">
                                <icon name="star" :size="13" color="#F5A623" />
                                <text class="text-[12] font-bold text-[#1A0E08]">{{ $r['rating'] }}</text>
                                <text class="text-[12] text-[#B29A8B]">({{ $r['reviews'] }})</text>
                            </row>
                            <text class="text-[12] text-[#8A6A56]">· {{ $r['eta'] }}</text>
                            <row class="items-center gap-1">
                                <icon name="delivery_dining" :size="15" color="#8A6A56" />
                                <text class="text-[12] font-semibold" style="color: {{ $r['fee'] === 'Free' ? '#0A8A00' : '#8A6A56' }}">{{ $r['fee'] }}</text>
                            </row>
                        </row>
                    </column>
                </row>
            @endforeach
        </column>

        {{-- Basket bar --}}
        <row class="mx-4 mt-4 mb-5 rounded-2xl px-5 py-4 items-center justify-between" style="background-color: {{ $c }}">
            <row class="items-center gap-3">
                <column class="w-[30] h-[30] rounded-full bg-white items-center justify-center">
                    <text class="text-[14] font-bold" style="color: {{ $c }}">{{ $example['basketCount'] }}</text>
                </column>
                <text class="text-[15] font-bold text-white">View basket</text>
            </row>
            <row class="items-center gap-2">
                <text class="text-[16] font-bold text-white">{{ $example['basketTotal'] }}</text>
                <icon name="arrow_forward" :size="18" color="#FFFFFF" />
            </row>
        </row>

    {{-- ══════════════════════════════════════════════════════════════════
         SyncUp — messaging inbox
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'chat')
        <column class="w-full px-4 pt-4 pb-3 gap-4" style="background-color: {{ $dark }}">
            <row class="items-center justify-between">
                <column>
                    <text class="text-[30] font-bold text-white">Messages</text>
                    <text class="text-[13] font-bold text-[#1E3A8A]">7 online now</text>
                </column>
                <row class="items-center gap-3">
                    <column class="w-[40] h-[40] rounded-full items-center justify-center" style="background-color: #1C2740">
                        <icon name="edit" :size="20" color="#FFFFFF" />
                    </column>
                    <image src="{{ $example['me'] }}" class="w-[40] h-[40] rounded-full" :fit="2" />
                </row>
            </row>
            <row class="items-center gap-2 rounded-full px-4 py-3" style="background-color: #FFFFFF;border-width:1;border-color: #D7E4F8">
                <icon name="search" :size="20" color="#0F172A" />
                <text class="text-[15] font-bold text-[#0F172A]">Search messages</text>
            </row>
        </column>

        {{-- Active now rail --}}
        <column class="w-full pt-4 pb-2" style="background-color: {{ $dark }}">
            <scroll-view horizontal>
                <row class="gap-4 px-4 pb-2">
                    @foreach ($example['activeNow'] as $a)
                        <column class="items-center gap-1 w-[64]">
                            <stack class="w-[64] h-[64]">
                                <image src="{{ $a['avatar'] }}" class="w-[64] h-[64] rounded-full" :fit="2" />
                                <column class="w-[64] h-[64] items-end justify-end">
                                    <column class="w-[16] h-[16] rounded-full bg-[#22C55E]" style="border-width:2;border-color: {{ $dark }}" />
                                </column>
                            </stack>
                            <text class="text-[12] font-bold text-[#0F172A]" :maxLines="1">{{ $a['name'] }}</text>
                        </column>
                    @endforeach
                </row>
            </scroll-view>
        </column>

        {{-- Thread list --}}
        <column class="w-full rounded-t-3xl bg-white pt-3 gap-0">
            @foreach ($example['threads'] as $i => $t)
                <row class="w-full px-4 py-3 gap-3 items-center">
                    <stack class="w-[56] h-[56]">
                        <image src="{{ $t['avatar'] }}" class="w-[56] h-[56] rounded-full" :fit="2" />
                        @if ($t['online'])
                            <column class="w-[56] h-[56] items-end justify-end">
                                <column class="w-[15] h-[15] rounded-full bg-[#22C55E]" style="border-width:2;border-color: #FFFFFF" />
                            </column>
                        @endif
                    </stack>
                    <column class="flex-1 gap-1">
                        <row class="items-center justify-between">
                            <row class="items-center gap-1 flex-1">
                                @if ($t['pinned'])
                                    <icon name="push_pin" :size="13" color="#94A3B8" />
                                @endif
                                <text class="text-[16] font-bold text-[#0F172A]" :maxLines="1">{{ $t['name'] }}</text>
                            </row>
                            <text class="text-[12] {{ $t['unread'] > 0 ? 'font-bold' : 'font-medium' }}" style="color: {{ $t['unread'] > 0 ? $c : '#64748B' }}">{{ $t['time'] }}</text>
                        </row>
                        <row class="items-center justify-between">
                            <text class="flex-1 text-[14] {{ $t['unread'] > 0 ? 'font-semibold text-[#1E293B]' : 'text-[#64748B]' }}" :maxLines="1">
                                @if ($t['typing'])<text class="italic" style="color: {{ $c }}">typing…</text>@else{{ $t['preview'] }}@endif
                            </text>
                            @if ($t['unread'] > 0)
                                <column class="min-w-[22] h-[22] px-1.5 rounded-full items-center justify-center" style="background-color: {{ $c }}">
                                    <text class="text-[12] font-bold text-white">{{ $t['unread'] }}</text>
                                </column>
                            @endif
                        </row>
                    </column>
                </row>
                @if (! $loop->last)
                    <row class="pl-[76]"><divider class="w-full" /></row>
                @endif
            @endforeach
            <spacer class="h-[24]" />
        </column>

    {{-- ══════════════════════════════════════════════════════════════════
         VibePass — event ticket / pass
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'ticket')
        <column class="w-full" style="background-color: {{ $dark }}">
            <stack class="w-full">
                <image src="{{ $example['hero'] }}" class="w-full h-[300]" :fit="2" />
                <column class="w-full h-[300] justify-end p-4 gap-2">
                    <row class="items-center gap-2">
                        <row class="items-center gap-1 rounded-full px-3 py-1" style="background-color: {{ $c }}">
                            <icon name="whatshot" :size="13" color="#FFFFFF" />
                            <text class="text-[11] font-bold text-white">TONIGHT</text>
                        </row>
                        <row class="items-center gap-1 rounded-full px-3 py-1 bg-black/40">
                            <icon name="location_on" :size="13" color="#FFFFFF" />
                            <text class="text-[11] font-semibold text-white">{{ $example['city'] }}</text>
                        </row>
                    </row>
                    <text class="text-[30] font-bold text-white" :maxLines="2">{{ $example['event'] }}</text>
                    <text class="text-[14] text-white">{{ $example['tagline'] }}</text>
                </column>
            </stack>

            <column class="px-4 pt-4 gap-4">
                {{-- Meta row --}}
                <row class="gap-2">
                    @foreach ([['event', 'Date', $example['date']], ['schedule', 'Doors', $example['time']], ['place', 'Venue', $example['venue']]] as $m)
                        <column class="flex-1 rounded-2xl px-3 py-3 gap-1 bg-white" style="border-width:1;border-color: #DDD0FA">
                            <icon name="{{ $m[0] }}" :size="18" color="#6D28D9" />
                            <text class="text-[11] font-bold text-[#6D28D9]">{{ $m[1] }}</text>
                            <text class="text-[16] font-bold text-[#160C2E]" :maxLines="1">{{ $m[2] }}</text>
                        </column>
                    @endforeach
                </row>

                {{-- The pass / ticket --}}
                <column class="w-full rounded-3xl bg-white gap-0">
                    <row class="px-5 pt-5 pb-4 items-center justify-between">
                        <column>
                            <text class="text-[12] font-semibold text-[#8B77B8]">ADMIT ONE · {{ $example['pass']['section'] }}</text>
                            <text class="text-[20] font-bold text-[#160C2E]">{{ $example['pass']['holder'] }}</text>
                        </column>
                        <column class="w-[52] h-[52] rounded-2xl items-center justify-center" style="background-color: {{ $accent }}">
                            <icon name="confirmation_number" :size="26" color="{{ $c }}" />
                        </column>
                    </row>

                    {{-- Perforation --}}
                    <row class="items-center px-0">
                        <column class="w-[22] h-[22] rounded-full -ml-[11]" style="background-color: {{ $dark }}" />
                        <row class="flex-1 justify-between px-2">
                            @for ($i = 0; $i < 16; $i++)
                                <column class="w-[8] h-[2] bg-[#E2D9F0]" />
                            @endfor
                        </row>
                        <column class="w-[22] h-[22] rounded-full -mr-[11]" style="background-color: {{ $dark }}" />
                    </row>

                    <row class="px-5 py-4 items-center justify-between">
                        <column class="gap-2">
                            <row class="gap-4">
                                <column><text class="text-[11] text-[#8B77B8]">SEAT</text><text class="text-[16] font-bold text-[#160C2E]">{{ $example['pass']['seat'] }}</text></column>
                                <column><text class="text-[11] text-[#8B77B8]">GATE</text><text class="text-[16] font-bold text-[#160C2E]">{{ $example['pass']['gate'] }}</text></column>
                            </row>
                            <text class="text-[11] text-[#B4A6D0]">Order {{ $example['pass']['order'] }}</text>
                        </column>
                        {{-- QR block --}}
                        <column class="w-[84] h-[84] rounded-xl bg-white items-center justify-center" style="border-width:1;border-color: #E2D9F0">
                            <icon name="qr_code_2" :size="72" color="#160C2E" />
                        </column>
                    </row>
                </column>

                {{-- Attendees --}}
                <row class="items-center justify-between rounded-2xl px-4 py-3" style="background-color: #241542;border-width:1;border-color: #3B2566">
                    <row class="items-center">
                        @foreach ($example['attendees'] as $i => $av)
                            <image src="{{ $av }}" class="w-[34] h-[34] rounded-full {{ $i > 0 ? '-ml-[12]' : '' }}" style="border-width:2;border-color: {{ $dark }}" :fit="2" />
                        @endforeach
                        <text class="text-[13] font-semibold text-white ml-2">+{{ $example['goingCount'] }} going</text>
                    </row>
                    <icon name="chevron_right" :size="20" color="#9A86C4" />
                </row>

                <row class="w-full rounded-2xl px-5 py-4 items-center justify-center gap-2 mb-5" style="background-color: {{ $c }}">
                    <icon name="account_balance_wallet" :size="20" color="#FFFFFF" />
                    <text class="text-[16] font-bold text-white">Add to Wallet</text>
                </row>
            </column>
        </column>

    {{-- ══════════════════════════════════════════════════════════════════
         Frame — photo feed
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'photo')
        <row class="w-full px-4 py-3 items-center justify-between bg-white">
            <text class="text-[26] font-bold text-[#1A1A1A]">Frame</text>
            <row class="items-center gap-5">
                <icon name="favorite_border" :size="24" color="#1A1A1A" />
                <stack>
                    <icon name="send" :size="24" color="#1A1A1A" />
                </stack>
            </row>
        </row>

        {{-- Stories --}}
        <scroll-view horizontal>
            <row class="gap-4 px-4 pb-3 pt-1">
                @foreach ($example['stories'] as $s)
                    <column class="items-center gap-1 w-[70]">
                        @if ($s['me'])
                            <stack class="w-[68] h-[68]">
                                <image src="{{ $s['avatar'] }}" class="w-[68] h-[68] rounded-full" :fit="2" />
                                <column class="w-[68] h-[68] items-end justify-end">
                                    <column class="w-[22] h-[22] rounded-full items-center justify-center" style="background-color: {{ $c }};border-width:2;border-color: #FFFFFF">
                                        <icon name="add" :size="14" color="#FFFFFF" />
                                    </column>
                                </column>
                            </stack>
                        @else
                            <column class="w-[68] h-[68] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                                <column class="w-[62] h-[62] rounded-full bg-white items-center justify-center">
                                    <image src="{{ $s['avatar'] }}" class="w-[58] h-[58] rounded-full" :fit="2" />
                                </column>
                            </column>
                        @endif
                        <text class="text-[11] text-[#1A1A1A]" :maxLines="1">{{ $s['me'] ? 'Your story' : $s['name'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>
        <divider class="w-full" />

        {{-- Post --}}
        @php $p = $example['post']; @endphp
        <row class="w-full px-4 py-2 items-center gap-2">
            <column class="w-[38] h-[38] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                <column class="w-[34] h-[34] rounded-full bg-white items-center justify-center">
                    <image src="{{ $p['avatar'] }}" class="w-[30] h-[30] rounded-full" :fit="2" />
                </column>
            </column>
            <column class="flex-1">
                <row class="items-center gap-1">
                    <text class="text-[14] font-bold text-[#1A1A1A]">{{ $p['user'] }}</text>
                    @if ($p['verified'])<icon name="verified" :size="14" color="{{ $c }}" />@endif
                </row>
                <text class="text-[12] text-[#6B7280]">{{ $p['location'] }}</text>
            </column>
            <icon name="more_horiz" :size="22" color="#1A1A1A" />
        </row>
        <image src="{{ $p['image'] }}" class="w-full h-[420]" :fit="2" />
        <row class="w-full px-4 pt-3 items-center justify-between">
            <row class="items-center gap-5">
                <icon name="favorite" :size="26" color="{{ $c }}" />
                <icon name="chat_bubble_outline" :size="24" color="#1A1A1A" />
                <icon name="send" :size="24" color="#1A1A1A" />
            </row>
            <icon name="bookmark_border" :size="26" color="#1A1A1A" />
        </row>
        <column class="w-full px-4 pt-2 gap-1">
            <text class="text-[14] font-bold text-[#1A1A1A]">{{ $p['likes'] }} likes</text>
            <text class="text-[14] text-[#1A1A1A]"><text class="font-bold">{{ $p['user'] }}</text> {{ $p['caption'] }}</text>
            <text class="text-[13] text-[#8E8E8E]">View all {{ $p['comments'] }} comments</text>
            <text class="text-[11] text-[#8E8E8E] uppercase">{{ $p['time'] }} ago</text>
        </column>

        {{-- Peek of next post --}}
        @php $pk = $example['peek']; @endphp
        <divider class="w-full mt-3" />
        <row class="w-full px-4 py-2 items-center gap-2">
            <column class="w-[38] h-[38] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                <column class="w-[34] h-[34] rounded-full bg-white items-center justify-center">
                    <image src="{{ $pk['avatar'] }}" class="w-[30] h-[30] rounded-full" :fit="2" />
                </column>
            </column>
            <text class="flex-1 text-[14] font-bold text-[#1A1A1A]">{{ $pk['user'] }}</text>
            <icon name="more_horiz" :size="22" color="#1A1A1A" />
        </row>
        <image src="{{ $pk['image'] }}" class="w-full h-[180]" :fit="2" />
        <spacer class="h-[24]" />

    {{-- ══════════════════════════════════════════════════════════════════
         Pulse — microblog timeline
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'timeline')
        {{-- Composer --}}
        <column class="w-full px-4 pt-4 pb-3 bg-white">
            <row class="gap-3 items-center">
                <image src="{{ $example['me'] }}" class="w-[44] h-[44] rounded-full" :fit="2" />
                <text class="flex-1 text-[16] text-[#8B98A5]">What's happening?</text>
                <row class="items-center gap-1 rounded-full px-4 py-2" style="background-color: {{ $c }}">
                    <text class="text-[14] font-bold text-white">Post</text>
                </row>
            </row>
            <row class="items-center gap-2 pt-3 pl-[56]">
                <text class="text-[13] font-semibold" style="color: {{ $c }}">Trending:</text>
                @foreach ($example['trends'] as $tr)
                    <text class="text-[13] font-semibold" style="color: {{ $c }}">{{ $tr }}</text>
                @endforeach
            </row>
        </column>
        <divider class="w-full" />

        {{-- Posts --}}
        @foreach ($example['posts'] as $post)
            <column class="w-full px-4 pt-3 pb-2 bg-white gap-2">
                @if ($post['pinned'])
                    <row class="items-center gap-2 pl-[52]">
                        <icon name="push_pin" :size="13" color="#8B98A5" />
                        <text class="text-[12] font-semibold text-[#8B98A5]">Pinned</text>
                    </row>
                @endif
                <row class="gap-3">
                    <image src="{{ $post['avatar'] }}" class="w-[44] h-[44] rounded-full" :fit="2" />
                    <column class="flex-1 gap-1">
                        <row class="items-center gap-1">
                            <text class="text-[15] font-bold text-[#0F1419]">{{ $post['name'] }}</text>
                            @if ($post['verified'])<icon name="verified" :size="15" color="{{ $c }}" />@endif
                            <text class="text-[14] text-[#8B98A5]">{{ '@'.$post['handle'] }} · {{ $post['time'] }}</text>
                            <spacer />
                            <icon name="more_horiz" :size="18" color="#8B98A5" />
                        </row>
                        <text class="text-[15] text-[#0F1419]" :maxLines="6">{{ $post['text'] }}</text>
                        @if ($post['image'])
                            <image src="{{ $post['image'] }}" class="w-full h-[180] rounded-2xl mt-1" style="border-width:1;border-color: #EFF3F4" :fit="2" />
                        @endif
                        <row class="items-center justify-between pt-2 pr-4">
                            <row class="items-center gap-1"><icon name="chat_bubble_outline" :size="17" color="#8B98A5" /><text class="text-[13] text-[#8B98A5]">{{ $post['replies'] }}</text></row>
                            <row class="items-center gap-1"><icon name="repeat" :size="17" color="#8B98A5" /><text class="text-[13] text-[#8B98A5]">{{ $post['reposts'] }}</text></row>
                            <row class="items-center gap-1"><icon name="favorite_border" :size="17" color="#8B98A5" /><text class="text-[13] text-[#8B98A5]">{{ $post['likes'] }}</text></row>
                            <row class="items-center gap-1"><icon name="bar_chart" :size="17" color="#8B98A5" /><text class="text-[13] text-[#8B98A5]">{{ $post['views'] }}</text></row>
                            <icon name="bookmark_border" :size="17" color="#8B98A5" />
                        </row>
                    </column>
                </row>
            </column>
            <divider class="w-full" />
        @endforeach
        <spacer class="h-[24]" />

    {{-- ══════════════════════════════════════════════════════════════════
         MarketNest — marketplace grid
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'market')
        <column class="w-full px-4 pt-4 pb-3 gap-3" style="background-color: {{ $accent }}">
            <row class="items-center justify-between">
                <column>
                    <text class="text-[26] font-bold text-[#231404]">MarketNest</text>
                    <row class="items-center gap-1">
                        <icon name="location_on" :size="14" color="{{ $c }}" />
                        <text class="text-[13] text-[#9A5B22]">Verified deals near Rouen</text>
                    </row>
                </column>
                <column class="w-[44] h-[44] rounded-full bg-white items-center justify-center" style="border-width:1;border-color: #F0DEC8">
                    <stack><icon name="notifications_none" :size="22" color="{{ $c }}" /></stack>
                </column>
            </row>
            <row class="items-center gap-2 bg-white rounded-2xl px-4 py-3" style="border-width:1;border-color: #F0DEC8">
                <icon name="search" :size="20" color="#9A5B22" />
                <text class="flex-1 text-[14] text-[#9A5B22]">Search AI workstations, mini PCs…</text>
                <column class="w-[30] h-[30] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                    <icon name="tune" :size="16" color="#FFFFFF" />
                </column>
            </row>
            <scroll-view horizontal>
                <row class="gap-2 pt-1">
                    @foreach ($example['categories'] as $i => $cat)
                        <column class="rounded-full px-4 py-2" style="background-color: {{ $i === 0 ? $c : '#FFFFFF' }};border-width:1;border-color: #F0DEC8">
                            <text class="text-[13] font-semibold" style="color: {{ $i === 0 ? '#FFFFFF' : '#9A5B22' }}">{{ $cat }}</text>
                        </column>
                    @endforeach
                </row>
            </scroll-view>
        </column>

        {{-- Price-watch banner (compact) --}}
        <row class="mx-4 mt-3 mb-1 rounded-2xl px-4 py-3 items-center justify-between" style="background-color: {{ $example['dark'] }}">
            <row class="items-center gap-3 flex-1">
                <column class="w-[40] h-[40] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                    <icon name="trending_down" :size="20" color="#FFFFFF" />
                </column>
                <column class="flex-1">
                    <text class="text-[14] font-bold text-white" :maxLines="1">{{ $example['watch']['title'] }} · price drop</text>
                    <text class="text-[12] font-medium text-[#E8C9A8]" :maxLines="1">{{ $example['watch']['sub'] }}</text>
                </column>
            </row>
            <column class="items-end pl-2">
                <text class="text-[18] font-bold" style="color: {{ $c }}">-12%</text>
                <text class="text-[11] text-[#E8C9A8]">this week</text>
            </column>
        </row>

        {{-- Listing grid --}}
        <column class="px-4 pt-4 gap-3 pb-6">
            @foreach (array_chunk($example['listings'], 2) as $pair)
                <row class="gap-3">
                    @foreach ($pair as $l)
                        <column class="flex-1 rounded-3xl bg-white gap-0" style="border-width:1;border-color: #F0DEC8">
                            <stack class="w-full">
                                <image src="{{ $l['image'] }}" class="w-full h-[130] rounded-t-3xl" :fit="2" />
                                <row class="w-full p-2 justify-between">
                                    @if ($l['drop'])
                                        <row class="items-center gap-1 rounded-full px-2 py-1" style="background-color: {{ $c }}">
                                            <icon name="south" :size="11" color="#FFFFFF" />
                                            <text class="text-[10] font-bold text-white">Price drop</text>
                                        </row>
                                    @else
                                        <spacer />
                                    @endif
                                    <column class="w-[28] h-[28] rounded-full bg-white items-center justify-center">
                                        <icon name="{{ $l['saved'] ? 'favorite' : 'favorite_border' }}" :size="15" color="{{ $l['saved'] ? $c : '#9A5B22' }}" />
                                    </column>
                                </row>
                            </stack>
                            <column class="p-3 gap-1">
                                <text class="text-[14] font-bold text-[#231404]" :maxLines="2">{{ $l['title'] }}</text>
                                <row class="items-center gap-2">
                                    <text class="text-[17] font-bold" style="color: {{ $c }}">{{ $l['price'] }}</text>
                                    @if ($l['was'])<text class="text-[12] text-[#B29A8B] line-through">{{ $l['was'] }}</text>@endif
                                </row>
                                <row class="items-center gap-1 pt-0.5">
                                    @if ($l['verified'])
                                        <icon name="verified" :size="13" color="#0A8A00" />
                                        <text class="text-[11] text-[#0A8A00] font-semibold">Verified</text>
                                    @endif
                                    <text class="text-[11] text-[#9A5B22]">· {{ $l['place'] }}</text>
                                </row>
                            </column>
                        </column>
                    @endforeach
                </row>
            @endforeach
        </column>

    {{-- ══════════════════════════════════════════════════════════════════
         StayFlow — travel booking
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'travel')
        <stack class="w-full">
            <image src="{{ $example['hero'] }}" class="w-full h-[340]" :fit="2" />
            <column class="w-full h-[340] p-4 justify-between">
                <row class="items-center justify-between">
                    <column class="w-[40] h-[40] rounded-full bg-white/90 items-center justify-center">
                        <icon name="travel_explore" :size="21" color="#2A0710" />
                    </column>
                    <row class="items-center gap-2">
                        <column class="w-[40] h-[40] rounded-full bg-white/90 items-center justify-center">
                            <icon name="share" :size="20" color="#2A0710" />
                        </column>
                        <column class="w-[40] h-[40] rounded-full bg-white/90 items-center justify-center">
                            <icon name="favorite" :size="20" color="{{ $c }}" />
                        </column>
                    </row>
                </row>
                @if ($example['superhost'])
                    <row>
                        <row class="items-center gap-1 rounded-full px-3 py-1.5 bg-white">
                            <icon name="workspace_premium" :size="15" color="{{ $c }}" />
                            <text class="text-[12] font-bold text-[#2A0710]">Superhost</text>
                        </row>
                    </row>
                @endif
            </column>
        </stack>

        {{-- Overlapping content card --}}
        <column class="w-full rounded-t-3xl bg-white -mt-[24] px-4 pt-5 gap-4">
            <column class="gap-1">
                <row class="items-center justify-between">
                    <text class="flex-1 text-[23] font-bold text-[#2A0710]" :maxLines="1">{{ $example['name'] }}</text>
                    <row class="items-center gap-1">
                        <icon name="star" :size="16" color="#2A0710" />
                        <text class="text-[14] font-bold text-[#2A0710]">{{ $example['rating'] }}</text>
                        <text class="text-[13] text-[#9C7681]">({{ $example['reviews'] }})</text>
                    </row>
                </row>
                <row class="items-center gap-1">
                    <icon name="location_on" :size="15" color="#9C7681" />
                    <text class="text-[14] text-[#9C7681]">{{ $example['place'] }}</text>
                </row>
                <text class="text-[13] text-[#9C7681] pt-1">{{ $example['specs'] }}</text>
            </column>

            {{-- Amenities --}}
            <scroll-view horizontal>
                <row class="gap-2">
                    @foreach ($example['amenities'] as $am)
                        <row class="items-center gap-1.5 rounded-full px-3 py-2" style="background-color: {{ $accent }}">
                            <icon name="{{ $am['icon'] }}" :size="16" color="{{ $c }}" />
                            <text class="text-[13] font-semibold text-[#2A0710]">{{ $am['label'] }}</text>
                        </row>
                    @endforeach
                </row>
            </scroll-view>

            <divider class="w-full" />

            {{-- Host --}}
            <row class="items-center gap-3">
                <image src="{{ $example['host']['avatar'] }}" class="w-[48] h-[48] rounded-full" :fit="2" />
                <column class="flex-1">
                    <text class="text-[16] font-bold text-[#2A0710]">{{ $example['host']['name'] }}</text>
                    <text class="text-[13] text-[#9C7681]">{{ $example['host']['sub'] }}</text>
                </column>
                <column class="w-[40] h-[40] rounded-full items-center justify-center" style="background-color: {{ $accent }}">
                    <icon name="chat_bubble_outline" :size="18" color="{{ $c }}" />
                </column>
            </row>

            {{-- Date / guest selector --}}
            <row class="rounded-2xl gap-0" style="border-width:1;border-color: #F3D5DC">
                <column class="flex-1 px-4 py-3 gap-0.5">
                    <text class="text-[11] font-bold text-[#9C7681]">CHECK-IN</text>
                    <text class="text-[15] font-bold text-[#2A0710]">{{ $example['checkIn'] }}</text>
                </column>
                <column class="w-[1] h-full" style="background-color: #F3D5DC" />
                <column class="flex-1 px-4 py-3 gap-0.5">
                    <text class="text-[11] font-bold text-[#9C7681]">CHECKOUT</text>
                    <text class="text-[15] font-bold text-[#2A0710]">{{ $example['checkOut'] }}</text>
                </column>
                <column class="w-[1] h-full" style="background-color: #F3D5DC" />
                <column class="flex-1 px-4 py-3 gap-0.5">
                    <text class="text-[11] font-bold text-[#9C7681]">GUESTS</text>
                    <text class="text-[15] font-bold text-[#2A0710]">{{ $example['guests'] }}</text>
                </column>
            </row>

            {{-- Reserve --}}
            <row class="items-center justify-between rounded-2xl px-5 py-4 mb-5" style="background-color: {{ $c }}">
                <column>
                    <row class="items-baseline gap-1">
                        <text class="text-[20] font-bold text-white">{{ $example['nightly'] }}</text>
                        <text class="text-[13] text-white">/ night · {{ $example['total'] }} total</text>
                    </row>
                    <text class="text-[12] text-white">Free cancellation until 22 Jul</text>
                </column>
                <row class="items-center gap-1 rounded-xl px-4 py-2 bg-white">
                    <text class="text-[15] font-bold" style="color: {{ $c }}">Reserve</text>
                </row>
            </row>
        </column>

    {{-- ══════════════════════════════════════════════════════════════════
         TuneDeck — music now-playing (dark)
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'music')
        <column class="w-full px-5 pt-4 gap-5 bg-black">
            <row class="items-center justify-between">
                <icon name="keyboard_arrow_down" :size="28" color="#FFFFFF" />
                <column class="items-center">
                    <text class="text-[10] font-bold text-[#B3B3B3]">PLAYING FROM PLAYLIST</text>
                    <text class="text-[13] font-bold text-white" :maxLines="1">{{ $example['album'] }}</text>
                </column>
                <icon name="more_vert" :size="24" color="#FFFFFF" />
            </row>

            {{-- Album art --}}
            <column class="w-full items-center pt-1">
                <image src="{{ $example['cover'] }}" class="w-[320] h-[320] rounded-2xl" :fit="2" />
            </column>

            {{-- Track meta --}}
            <row class="items-center justify-between">
                <column class="flex-1">
                    <text class="text-[26] font-bold text-white" :maxLines="1">{{ $example['track'] }}</text>
                    <text class="text-[15] font-medium text-[#B3B3B3]" :maxLines="1">{{ $example['artist'] }}</text>
                </column>
                <icon name="favorite" :size="28" color="{{ $c }}" />
            </row>

            {{-- Scrubber --}}
            <column class="w-full gap-2">
                <stack class="w-full h-[6]">
                    <column class="w-full h-[6] rounded-full" style="background-color: #404040" />
                    <column class="h-[6] rounded-full" style="width: {{ $example['progress'] }}%; background-color: {{ $c }}" />
                </stack>
                <row class="items-center justify-between">
                    <text class="text-[12] font-medium text-[#B3B3B3]">{{ $example['elapsed'] }}</text>
                    <text class="text-[12] font-medium text-[#B3B3B3]">{{ $example['duration'] }}</text>
                </row>
            </column>

            {{-- Controls --}}
            <row class="items-center justify-between px-2">
                <icon name="shuffle" :size="22" color="{{ $c }}" />
                <icon name="skip_previous" :size="36" color="#FFFFFF" />
                <column class="w-[72] h-[72] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                    <icon name="pause" :size="34" color="#000000" />
                </column>
                <icon name="skip_next" :size="36" color="#FFFFFF" />
                <icon name="repeat" :size="22" color="#FFFFFF" />
            </row>

            {{-- Up next --}}
            <column class="w-full rounded-2xl p-4 gap-3 mt-1" style="background-color: #181818">
                <row class="items-center justify-between">
                    <text class="text-[16] font-bold text-white">Up next</text>
                    <text class="text-[13] font-bold" style="color: {{ $c }}">Queue</text>
                </row>
                @foreach ($example['queue'] as $q)
                    <row class="items-center gap-3">
                        <image src="{{ $q['cover'] }}" class="w-[48] h-[48] rounded-lg" :fit="2" />
                        <column class="flex-1">
                            <text class="text-[15] font-semibold text-white" :maxLines="1">{{ $q['title'] }}</text>
                            <text class="text-[13] font-medium text-[#B3B3B3]" :maxLines="1">{{ $q['artist'] }}</text>
                        </column>
                        <text class="text-[12] font-medium text-[#B3B3B3]">{{ $q['len'] }}</text>
                        <icon name="more_vert" :size="18" color="#B3B3B3" />
                    </row>
                @endforeach
            </column>
            <spacer class="h-[24]" />
        </column>

    {{-- ══════════════════════════════════════════════════════════════════
         ShopRoom — product detail
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'shop')
        {{-- Hero image with chrome --}}
        <stack class="w-full">
            <column class="w-full items-center py-4" style="background-color: {{ $accent }}">
                <image src="{{ $example['hero'] }}" class="w-[300] h-[300] rounded-3xl" :fit="2" />
            </column>
            <row class="w-full p-4 justify-between">
                <column class="w-[40] h-[40] rounded-full bg-white items-center justify-center shadow">
                    <icon name="storefront" :size="21" color="#0B1633" />
                </column>
                <row class="items-center gap-2">
                    <column class="w-[40] h-[40] rounded-full bg-white items-center justify-center shadow">
                        <icon name="favorite_border" :size="20" color="#0B1633" />
                    </column>
                    <stack class="w-[40] h-[40] rounded-full bg-white items-center justify-center shadow">
                        <icon name="shopping_bag" :size="20" color="#0B1633" />
                    </stack>
                </row>
            </row>
        </stack>

        {{-- Thumbnails --}}
        <row class="px-4 pt-4 gap-2">
            @foreach ($example['thumbs'] as $ti => $th)
                <image src="{{ $th }}" class="w-[64] h-[64] rounded-xl" style="border-width:2;border-color: {{ $ti === 0 ? $c : '#E5E9F2' }}" :fit="2" />
            @endforeach
        </row>

        <column class="px-4 pt-4 gap-3">
            <column class="gap-1">
                <text class="text-[12] font-bold tracking-wide" style="color: {{ $c }}">{{ $example['brand'] }}</text>
                <text class="text-[24] font-bold text-[#0B1633]">{{ $example['name'] }}</text>
                <row class="items-center gap-2 pt-1">
                    <text class="text-[26] font-bold text-[#0B1633]">{{ $example['price'] }}</text>
                    <text class="text-[16] text-[#94A3B8] line-through">{{ $example['was'] }}</text>
                    <row class="items-center gap-1 rounded-full px-2 py-0.5" style="background-color: {{ $accent }}">
                        <icon name="sell" :size="12" color="{{ $c }}" />
                        <text class="text-[11] font-bold" style="color: {{ $c }}">Save €100</text>
                    </row>
                </row>
                <row class="items-center gap-2 pt-1">
                    <row class="items-center gap-0.5">
                        @for ($i = 0; $i < 5; $i++)<icon name="{{ $i < 4 ? 'star' : 'star_half' }}" :size="15" color="#F5A623" />@endfor
                    </row>
                    <text class="text-[13] text-[#64748B]">{{ $example['rating'] }} · {{ $example['reviews'] }} reviews</text>
                </row>
            </column>

            <divider class="w-full" />

            {{-- Colour variants --}}
            <column class="gap-2">
                <text class="text-[15] font-bold text-[#0B1633]">Colour — Natural</text>
                <row class="gap-3">
                    @foreach ($example['colors'] as $ci => $col)
                        <column class="w-[46] h-[46] rounded-full items-center justify-center" style="border-width:2;border-color: {{ $ci === 0 ? $c : '#E5E9F2' }}">
                            <column class="w-[34] h-[34] rounded-full" style="background-color: {{ $col['hex'] }}" />
                        </column>
                    @endforeach
                </row>
            </column>

            {{-- Sizes --}}
            <column class="gap-2">
                <text class="text-[15] font-bold text-[#0B1633]">Configuration</text>
                <row class="gap-2">
                    @foreach ($example['sizes'] as $si => $sz)
                        <column class="rounded-xl px-4 py-2.5" style="background-color: {{ $si === 0 ? $c : '#F1F5FB' }}">
                            <text class="text-[14] font-semibold" style="color: {{ $si === 0 ? '#FFFFFF' : '#334155' }}">{{ $sz }}</text>
                        </column>
                    @endforeach
                </row>
            </column>

            {{-- Features --}}
            <column class="gap-2 pt-1">
                @foreach ($example['features'] as $feat)
                    <row class="items-center gap-2">
                        <icon name="check_circle" :size="18" color="{{ $c }}" />
                        <text class="text-[14] text-[#334155]">{{ $feat }}</text>
                    </row>
                @endforeach
            </column>
        </column>

        {{-- Sticky add-to-cart --}}
        <row class="mx-4 mt-4 mb-6 rounded-2xl p-2 items-center gap-2" style="background-color: #F1F5FB">
            <row class="items-center gap-3 px-3">
                <column class="w-[34] h-[34] rounded-full bg-white items-center justify-center"><icon name="remove" :size="18" color="#0B1633" /></column>
                <text class="text-[17] font-bold text-[#0B1633]">{{ $example['cartCount'] }}</text>
                <column class="w-[34] h-[34] rounded-full bg-white items-center justify-center"><icon name="add" :size="18" color="#0B1633" /></column>
            </row>
            <row class="flex-1 items-center justify-center gap-2 rounded-xl py-3.5" style="background-color: {{ $c }}">
                <icon name="add_shopping_cart" :size="20" color="#FFFFFF" />
                <text class="text-[16] font-bold text-white">Add to cart · {{ $example['price'] }}</text>
            </row>
        </row>

    {{-- ══════════════════════════════════════════════════════════════════
         FieldKit — offline field service (dark)
         ══════════════════════════════════════════════════════════════════ --}}
    @elseif ($layout === 'field')
        @php
            $done = collect($example['checklist'])->where('done', true)->count();
            $total = count($example['checklist']);
            $pct = (int) round($done / $total * 100);
        @endphp
        <column class="w-full px-4 pt-4 gap-4 bg-black">
            {{-- Header --}}
            <row class="items-center justify-between">
                <column>
                    <text class="text-[24] font-bold text-white">Work orders</text>
                    <text class="text-[13] text-[#04766D]">{{ $example['tech'] }}</text>
                </column>
                <row class="items-center gap-1.5 rounded-full px-3 py-2" style="background-color: #7F1D1D">
                    <icon name="cloud_off" :size="16" color="#FCA5A5" />
                    <text class="text-[12] font-bold text-[#FCA5A5]">OFFLINE</text>
                </row>
            </row>

            {{-- Sync status --}}
            <column class="rounded-2xl p-4 gap-3" style="background-color: #12312D;border-width:1;border-color: #1F5A54">
                <row class="items-center justify-between">
                    <row class="items-center gap-2">
                        <icon name="sync" :size="18" color="{{ $c }}" />
                        <text class="text-[14] font-bold text-white">{{ $example['syncPending'] }} changes queued</text>
                    </row>
                    <text class="text-[13] font-bold" style="color: {{ $c }}">{{ $example['syncPercent'] }}%</text>
                </row>
                <stack class="w-full h-[8]">
                    <column class="w-full h-[8] rounded-full bg-white/10" />
                    <column class="h-[8] rounded-full" style="width: {{ $example['syncPercent'] }}%; background-color: {{ $c }}" />
                </stack>
                <text class="text-[12] text-[#04766D]">Will upload automatically when back online</text>
            </column>

            {{-- Work order card --}}
            <column class="rounded-3xl bg-white p-4 gap-3">
                <row class="items-start justify-between">
                    <column class="flex-1 gap-0.5">
                        <row class="items-center gap-2">
                            <text class="text-[12] font-bold" style="color: {{ $c }}">{{ $example['order']['id'] }}</text>
                            <row class="items-center gap-1 rounded-full px-2 py-0.5 bg-[#FEE2E2]">
                                <icon name="priority_high" :size="11" color="#DC2626" />
                                <text class="text-[10] font-bold text-[#DC2626]">{{ $example['order']['priority'] }}</text>
                            </row>
                        </row>
                        <text class="text-[18] font-bold text-[#0B1F1E]">{{ $example['order']['title'] }}</text>
                        <row class="items-center gap-1">
                            <icon name="location_on" :size="14" color="#64748B" />
                            <text class="text-[13] text-[#64748B]" :maxLines="1">{{ $example['order']['address'] }}</text>
                        </row>
                    </column>
                    <column class="items-center rounded-xl px-3 py-2" style="background-color: {{ $example['accent'] }}">
                        <icon name="schedule" :size="16" color="{{ $c }}" />
                        <text class="text-[11] font-bold text-[#0B1F1E] pt-0.5">14:00</text>
                    </column>
                </row>

                <divider class="w-full" />

                {{-- Checklist header --}}
                <row class="items-center justify-between">
                    <text class="text-[15] font-bold text-[#0B1F1E]">Checklist</text>
                    <text class="text-[13] font-bold" style="color: {{ $c }}">{{ $done }}/{{ $total }} · {{ $pct }}%</text>
                </row>
                <stack class="w-full h-[7]">
                    <column class="w-full h-[7] rounded-full bg-[#E2E8F0]" />
                    <column class="h-[7] rounded-full" style="width: {{ $pct }}%; background-color: {{ $c }}" />
                </stack>

                {{-- Checklist items --}}
                <column class="gap-0">
                    @foreach ($example['checklist'] as $item)
                        <row class="items-center gap-3 py-2">
                            @if ($item['done'])
                                <column class="w-[24] h-[24] rounded-full items-center justify-center" style="background-color: {{ $c }}">
                                    <icon name="check" :size="15" color="#FFFFFF" />
                                </column>
                            @else
                                <column class="w-[24] h-[24] rounded-full" style="border-width:2;border-color: #CBD5E1" />
                            @endif
                            <text class="flex-1 text-[14] {{ $item['done'] ? 'text-[#94A3B8] line-through' : 'font-semibold text-[#0B1F1E]' }}">{{ $item['label'] }}</text>
                        </row>
                    @endforeach
                </column>
            </column>

            {{-- Photo evidence --}}
            <column class="gap-2">
                <row class="items-center gap-2">
                    <icon name="photo_camera" :size="18" color="#04766D" />
                    <text class="text-[15] font-bold text-white">Photo evidence</text>
                </row>
                <row class="gap-2">
                    @foreach ($example['photos'] as $ph)
                        <image src="{{ $ph }}" class="w-[100] h-[100] rounded-2xl" :fit="2" />
                    @endforeach
                    <column class="w-[100] h-[100] rounded-2xl items-center justify-center gap-1" style="border-width:2;border-color: #2A6A63">
                        <icon name="add_a_photo" :size="24" color="{{ $c }}" />
                        <text class="text-[11] text-[#04766D]">Add</text>
                    </column>
                </row>
            </column>

            {{-- Sync queue --}}
            <column class="rounded-2xl gap-0" style="background-color: #12312D;border-width:1;border-color: #1F5A54">
                @foreach ($example['queue'] as $q)
                    @php
                        $map = ['saved' => ['done', '#93E0D6', 'Saved locally'], 'pending' => ['schedule', '#FBBF24', 'Pending upload'], 'synced' => ['cloud_done', '#22C55E', 'Synced']];
                        [$ic, $col, $lbl] = $map[$q['state']];
                    @endphp
                    <row class="items-center gap-3 px-4 py-3">
                        <icon name="{{ $ic }}" :size="18" color="{{ $col }}" />
                        <text class="flex-1 text-[14] text-white">{{ $q['label'] }}</text>
                        <text class="text-[12] font-semibold" style="color: {{ $col }}">{{ $lbl }}</text>
                    </row>
                    @if (! $loop->last)<divider class="w-full" />@endif
                @endforeach
            </column>
            <spacer class="h-[24]" />
        </column>
    @endif

    </column>
</scroll-view>
