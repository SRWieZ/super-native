@php
    $layout = $example['layout'];
@endphp

<scroll-view class="w-full h-full" style="background-color: {{ $layout === 'music' || $layout === 'field' ? $example['dark'] : '#F6F7FB' }}">
    <column class="w-full gap-0">
        @if ($layout === 'food')
            <column class="w-full pb-5" style="background-color: {{ $example['dark'] }}">
                <column class="w-full h-[310]">
                    <image src="{{ $example['cover'] }}" class="w-full h-[310]" :fit="2" />
                </column>
                <column class="px-4 mt-[-64] gap-3">
                    <column class="rounded-3xl bg-white px-4 py-4 gap-3">
                        <row class="items-center justify-between">
                            <column class="gap-1">
                                <text class="text-[27] font-bold text-[#1F130F]" :maxLines="1">{{ $example['hero'] }}</text>
                                <text class="text-[13] text-[#7B6258]">22 restaurants open near you</text>
                            </column>
                            <column class="w-[54] h-[54] rounded-2xl items-center justify-center" style="background-color: {{ $example['accent'] }}">
                                <icon name="fork.knife" :size="26" color="{{ $example['color'] }}" />
                            </column>
                        </row>
                        <row class="gap-2">
                            @foreach ($example['stats'] as $stat)
                                <column class="flex-1 rounded-2xl px-3 py-3" style="background-color: {{ $example['accent'] }}">
                                    <text class="text-[11] text-[#806459]">{{ $stat[0] }}</text>
                                    <text class="text-[17] font-bold" style="color: {{ $example['dark'] }}">{{ $stat[1] }}</text>
                                </column>
                            @endforeach
                        </row>
                    </column>
                    <scroll-view horizontal><row class="gap-2">@foreach ($example['chips'] as $chip)<chip label="{{ $chip }}" />@endforeach</row></scroll-view>
                    @foreach ($example['items'] as $item)
                        <row class="rounded-3xl bg-white p-3 gap-3 items-center">
                            <image src="{{ $item['image'] }}" class="w-[104] h-[104] rounded-2xl" :fit="2" />
                            <column class="flex-1 gap-1"><text class="text-[18] font-bold text-[#1F130F]">{{ $item['title'] }}</text><text class="text-[13] text-[#715B52]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[12] font-semibold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column>
                        </row>
                    @endforeach
                    <row class="rounded-full px-4 py-3 items-center justify-between" style="background-color: {{ $example['color'] }}"><text class="text-[15] font-bold text-white">View basket · €34.80</text><icon name="arrow.right" :size="18" color="#FFFFFF" /></row>
                </column>
            </column>
        @elseif ($layout === 'chat')
            <column class="w-full px-4 pt-4 pb-5 gap-4" style="background-color: {{ $example['dark'] }}">
                <row class="items-center justify-between"><column><text class="text-[31] font-bold text-white">Messages</text><text class="text-[14] text-white/70">{{ $example['hero'] }}</text></column><image src="{{ $example['items'][0]['image'] }}" class="w-[52] h-[52] rounded-full" :fit="2" /></row>
                <scroll-view horizontal><row class="gap-3">@foreach ($example['items'] as $item)<column class="items-center gap-1"><image src="{{ $item['image'] }}" class="w-[68] h-[68] rounded-full" :fit="2" /><text class="text-[11] text-white" :maxLines="1">{{ $item['title'] }}</text></column>@endforeach</row></scroll-view>
                <column class="rounded-3xl bg-white px-4 py-4 gap-2"><row class="items-center gap-2"><icon name="magnifyingglass" :size="18" color="#64748B" /><text class="text-[15] text-[#64748B]">Search conversations</text></row></column>
                @foreach ($example['items'] as $item)
                    <row class="rounded-3xl bg-white p-4 gap-3 items-center"><image src="{{ $item['image'] }}" class="w-[58] h-[58] rounded-full" :fit="2" /><column class="flex-1"><row class="justify-between"><text class="text-[17] font-bold text-[#0F172A]">{{ $item['title'] }}</text><text class="text-[12]" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></row><text class="text-[14] text-[#64748B]" :maxLines="1">{{ $item['subtitle'] }}</text></column></row>
                @endforeach
                <row class="rounded-full bg-white/10 px-4 py-3 items-center gap-2"><text class="flex-1 text-[14] text-white/70">Message Emma…</text><column class="w-[38] h-[38] rounded-full items-center justify-center" style="background-color: {{ $example['color'] }}"><icon name="arrow.up" :size="16" color="#FFFFFF" /></column></row>
            </column>
        @elseif ($layout === 'ticket')
            <column class="w-full gap-0" style="background-color: {{ $example['accent'] }}">
                <image src="{{ $example['cover'] }}" class="w-full h-[260]" :fit="2" />
                <column class="px-4 mt-[-36] gap-4">
                    <column class="rounded-3xl bg-white px-5 py-5 gap-3">
                        <row class="items-center justify-between"><column><text class="text-[27] font-bold text-[#1E103B]">{{ $example['hero'] }}</text><text class="text-[14] text-[#6D5B8C]">Rouen · Thu 19:30</text></column><icon name="ticket.fill" :size="34" color="{{ $example['color'] }}" /></row>
                        <row class="gap-2">@foreach ($example['stats'] as $stat)<column class="flex-1 rounded-2xl px-3 py-3" style="background-color: {{ $example['accent'] }}"><text class="text-[11] text-[#6D5B8C]">{{ $stat[0] }}</text><text class="text-[17] font-bold text-[#1E103B]">{{ $stat[1] }}</text></column>@endforeach</row>
                        <column class="rounded-3xl bg-[#120A25] p-4 gap-2"><row class="justify-between"><text class="text-[15] font-bold text-white">VIP PASS</text><text class="text-[13] text-white/60">#SN-042</text></row><row class="gap-2">@for ($i = 0; $i < 9; $i++)<column class="flex-1 h-[22] rounded" style="background-color: {{ $i % 2 === 0 ? '#FFFFFF' : '#7C3AED' }}" />@endfor</row></column>
                    </column>
                    @foreach ($example['items'] as $item)<row class="rounded-3xl bg-white p-3 gap-3"><image src="{{ $item['image'] }}" class="w-[96] h-[96] rounded-2xl" :fit="2" /><column class="flex-1 gap-1"><text class="text-[17] font-bold text-[#1E103B]">{{ $item['title'] }}</text><text class="text-[13] text-[#6D5B8C]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[12] font-semibold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column></row>@endforeach
                    <button label="RSVP and add to Wallet" color="{{ $example['color'] }}" labelColor="#FFFFFF" />
                </column>
            </column>
        @elseif ($layout === 'photo')
            <column class="w-full bg-white gap-0">
                <row class="px-4 py-3 items-center justify-between"><text class="text-[28] font-bold text-[#111827]">Frame</text><row class="gap-4"><icon name="heart" :size="24" color="#111827" /><icon name="paperplane" :size="24" color="#111827" /></row></row>
                <scroll-view horizontal><row class="gap-3 px-4 pb-3">@foreach ($example['items'] as $item)<column class="items-center gap-1"><image src="{{ $item['image'] }}" class="w-[68] h-[68] rounded-full" :fit="2" /><text class="text-[11] text-[#111827]">{{ str_replace('@', '', $item['title']) }}</text></column>@endforeach</row></scroll-view>
                <image src="{{ $example['cover'] }}" class="w-full h-[430]" :fit="2" />
                <column class="px-4 py-3 gap-2"><row class="justify-between"><row class="gap-4"><icon name="heart.fill" :size="27" color="{{ $example['color'] }}" /><icon name="message" :size="26" color="#111827" /><icon name="paperplane" :size="25" color="#111827" /></row><icon name="bookmark" :size="25" color="#111827" /></row><text class="text-[14] font-bold text-[#111827]">8,421 likes</text><text class="text-[14] text-[#111827]"><text class="font-bold">@native.camp</text> Dordogne sunset captured inside a native image feed.</text></column>
                <column class="mx-4 rounded-3xl p-4 gap-2" style="background-color: {{ $example['accent'] }}"><text class="text-[16] font-bold text-[#111827]">Built from PHP state</text><text class="text-[13] text-[#6B7280]">Stories, feed image, likes and saved state are all screen data.</text></column>
            </column>
        @elseif ($layout === 'timeline')
            <column class="w-full bg-white px-4 pt-4 gap-4">
                <row class="items-center justify-between"><text class="text-[30] font-bold text-[#0F172A]">Pulse</text><button label="Compose" color="{{ $example['color'] }}" labelColor="#FFFFFF" :fontSize="13" /></row>
                <column class="rounded-3xl p-4 gap-3" style="background-color: {{ $example['accent'] }}">
                    <row class="gap-3"><image src="{{ $example['items'][1]['image'] }}" class="w-[52] h-[52] rounded-full" :fit="2" /><column class="flex-1"><text class="text-[17] font-bold text-[#0F172A]">What are you building?</text><text class="text-[14] text-[#64748B]">Draft saved locally from PHP state</text></column></row>
                    <row class="gap-2"><chip label="PHP" /><chip label="Native" /><chip label="Laravel" /></row>
                </column>
                @foreach ($example['items'] as $item)
                    <column class="rounded-3xl bg-white p-4 gap-3" style="border-color:#E5E7EB;border-width:1">
                        <row class="gap-3"><image src="{{ $item['image'] }}" class="w-[54] h-[54] rounded-full" :fit="2" /><column class="flex-1"><row class="justify-between"><text class="text-[17] font-bold text-[#0F172A]">{{ $item['title'] }}</text><text class="text-[12] text-[#64748B]">{{ $item['meta'] }}</text></row><text class="text-[15] text-[#1F2937]" :maxLines="3">{{ $item['subtitle'] }}</text></column></row>
                        <row class="justify-between px-8"><icon name="message" :size="20" color="#64748B" /><icon name="arrow.2.squarepath" :size="20" color="#64748B" /><icon name="heart" :size="20" color="#64748B" /><icon name="bookmark" :size="20" color="#64748B" /></row>
                    </column>
                @endforeach
                <image src="{{ $example['cover'] }}" class="w-full h-[210] rounded-3xl" :fit="2" />
            </column>
        @elseif ($layout === 'market')
            <column class="w-full px-4 pt-4 gap-4" style="background-color:#FFF7ED">
                <row class="items-center justify-between"><column><text class="text-[29] font-bold text-[#2A1200]">MarketNest</text><text class="text-[14] text-[#9A5B22]">Verified local deals around Rouen</text></column><column class="rounded-full px-3 py-2 bg-white"><text class="text-[12] font-bold" style="color: {{ $example['color'] }}">3 alerts</text></column></row>
                <column class="rounded-3xl bg-white p-4 gap-2"><row class="gap-2"><icon name="magnifyingglass" :size="19" color="#9A5B22" /><text class="text-[15] text-[#9A5B22]">Search AI workstations, mini PCs…</text></row><row class="gap-2">@foreach ($example['chips'] as $chip)<chip label="{{ $chip }}" />@endforeach</row></column>
                <row class="gap-3">@foreach ($example['items'] as $item)<column class="flex-1 rounded-3xl bg-white p-3 gap-2"><image src="{{ $item['image'] }}" class="w-full h-[150] rounded-2xl" :fit="2" /><text class="text-[16] font-bold text-[#2A1200]" :maxLines="2">{{ $item['title'] }}</text><text class="text-[12] text-[#9A5B22]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[18] font-bold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column>@endforeach</row>
                <column class="rounded-3xl p-4 gap-3" style="background-color: {{ $example['dark'] }}"><row class="justify-between"><text class="text-[17] font-bold text-white">Price watch</text><text class="text-[13] text-white/65">-12% this week</text></row><row class="items-end gap-2">@foreach ([34,58,42,82,64,92,74] as $h)<column class="flex-1 rounded-t-xl" style="height: {{ $h }}; background-color: {{ $example['color'] }}" />@endforeach</row></column>
            </column>
        @elseif ($layout === 'travel')
            <column class="w-full gap-0 bg-white">
                <image src="{{ $example['cover'] }}" class="w-full h-[390]" :fit="2" />
                <column class="px-4 mt-[-80] gap-4">
                    <column class="rounded-3xl bg-white p-4 gap-3"><text class="text-[28] font-bold text-[#3A0712]">{{ $example['hero'] }}</text><row class="gap-2">@foreach ($example['stats'] as $stat)<column class="flex-1 rounded-2xl px-3 py-3" style="background-color: {{ $example['accent'] }}"><text class="text-[11] text-[#8C4251]">{{ $stat[0] }}</text><text class="text-[17] font-bold text-[#3A0712]">{{ $stat[1] }}</text></column>@endforeach</row><button label="Reserve this stay" color="{{ $example['color'] }}" labelColor="#FFFFFF" /></column>
                    @foreach ($example['items'] as $item)<row class="rounded-3xl bg-white p-3 gap-3" style="border-color:#F3D5DC;border-width:1"><image src="{{ $item['image'] }}" class="w-[110] h-[110] rounded-2xl" :fit="2" /><column class="flex-1"><text class="text-[17] font-bold text-[#3A0712]">{{ $item['title'] }}</text><text class="text-[13] text-[#8C4251]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[15] font-bold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column></row>@endforeach
                </column>
            </column>
        @elseif ($layout === 'shop')
            <column class="w-full bg-white gap-0">
                <column class="w-full items-center py-5" style="background-color: {{ $example['accent'] }}"><image src="{{ $example['cover'] }}" class="w-[340] h-[250] rounded-3xl" :fit="2" /></column>
                <column class="px-4 py-4 gap-4"><row class="justify-between"><column class="flex-1"><text class="text-[28] font-bold text-[#071B33]">Oak lounge collection</text><text class="text-[14] text-[#64748B]">A shippable storefront from Laravel data</text></column><text class="text-[24] font-bold" style="color: {{ $example['color'] }}">€482</text></row>
                <row class="gap-2"><column class="w-[34] h-[34] rounded-full bg-[#0F172A]" /><column class="w-[34] h-[34] rounded-full bg-[#9CA3AF]" /><column class="w-[34] h-[34] rounded-full bg-[#D6B98C]" /><chip label="In stock" /></row>
                <row class="gap-3">@foreach ($example['items'] as $item)<column class="flex-1 rounded-3xl p-3 gap-2" style="background-color:#F8FAFC"><image src="{{ $item['image'] }}" class="w-full h-[160] rounded-2xl" :fit="2" /><text class="text-[15] font-bold text-[#071B33]" :maxLines="2">{{ $item['title'] }}</text><text class="text-[17] font-bold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column>@endforeach</row>
                <button label="Add 4 items to cart" color="{{ $example['color'] }}" labelColor="#FFFFFF" /></column>
            </column>
        @elseif ($layout === 'music')
            <column class="w-full px-4 pt-5 gap-4" style="background-color: {{ $example['dark'] }}">
                <row class="items-center justify-between"><text class="text-[30] font-bold text-white">TuneDeck</text><icon name="gearshape" :size="24" color="#FFFFFF" /></row>
                <image src="{{ $example['cover'] }}" class="w-full h-[260] rounded-3xl" :fit="2" />
                <column class="gap-1"><text class="text-[28] font-bold text-white">{{ $example['hero'] }}</text><text class="text-[14] text-white/65">{{ $example['subtitle'] }}</text></column>
                <scroll-view horizontal><row class="gap-2">@foreach ($example['chips'] as $chip)<column class="rounded-full bg-white/10 px-4 py-2"><text class="text-[13] font-semibold text-white">{{ $chip }}</text></column>@endforeach</row></scroll-view>
                <row class="gap-3">@foreach ($example['items'] as $item)<column class="flex-1 gap-2"><image src="{{ $item['image'] }}" class="w-full h-[150] rounded-2xl" :fit="2" /><text class="text-[15] font-bold text-white" :maxLines="1">{{ $item['title'] }}</text><text class="text-[12] text-white/55" :maxLines="2">{{ $item['subtitle'] }}</text></column>@endforeach</row>
                <row class="rounded-3xl px-4 py-3 items-center gap-3" style="background-color: {{ $example['color'] }}"><image src="{{ $example['items'][0]['image'] }}" class="w-[52] h-[52] rounded-xl" :fit="2" /><column class="flex-1"><text class="text-[15] font-bold text-white">Code Focus</text><text class="text-[12] text-white/75">Native mini-player pinned above tabs</text></column><icon name="pause.fill" :size="20" color="#FFFFFF" /></row>
            </column>
        @elseif ($layout === 'field')
            <column class="w-full px-4 pt-5 gap-4" style="background-color: {{ $example['dark'] }}">
                <row class="items-center justify-between"><column><text class="text-[30] font-bold text-white">FieldKit</text><text class="text-[14] text-white/65">Offline sync queue · 92%</text></column><column class="rounded-full px-3 py-2" style="background-color: {{ $example['color'] }}"><text class="text-[12] font-bold text-white">OFFLINE READY</text></column></row>
                <image src="{{ $example['cover'] }}" class="w-full h-[230] rounded-3xl" :fit="2" />
                <row class="gap-2">@foreach ($example['stats'] as $stat)<column class="flex-1 rounded-2xl bg-white/10 px-3 py-3"><text class="text-[11] text-white/55">{{ $stat[0] }}</text><text class="text-[17] font-bold text-white">{{ $stat[1] }}</text></column>@endforeach</row>
                @foreach ($example['items'] as $item)<column class="rounded-3xl bg-white px-4 py-4 gap-3"><row class="gap-3"><image src="{{ $item['image'] }}" class="w-[86] h-[86] rounded-2xl" :fit="2" /><column class="flex-1"><text class="text-[17] font-bold text-[#052E2B]">{{ $item['title'] }}</text><text class="text-[13] text-[#64748B]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[12] font-semibold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column></row><row class="gap-2"><column class="flex-1 h-[8] rounded-full" style="background-color: {{ $example['color'] }}" /><column class="w-[80] h-[8] rounded-full bg-[#D1FAE5]" /></row></column>@endforeach
                <row class="rounded-full bg-white px-4 py-3 items-center justify-between"><text class="text-[15] font-bold text-[#052E2B]">Sync when online</text><icon name="arrow.triangle.2.circlepath" :size="20" color="{{ $example['color'] }}" /></row>
            </column>
        @else
            <column class="w-full px-4 py-4 gap-4">
                <image src="{{ $example['cover'] }}" class="w-full h-[300] rounded-3xl" :fit="2" />
                <column class="rounded-3xl bg-white p-4 gap-3"><text class="text-[29] font-bold" style="color: {{ $example['dark'] }}">{{ $example['hero'] }}</text><text class="text-[14] text-[#64748B]">{{ $example['subtitle'] }}</text><row class="gap-2">@foreach ($example['stats'] as $stat)<column class="flex-1 rounded-2xl px-3 py-3" style="background-color: {{ $example['accent'] }}"><text class="text-[11] text-[#64748B]">{{ $stat[0] }}</text><text class="text-[17] font-bold" style="color: {{ $example['color'] }}">{{ $stat[1] }}</text></column>@endforeach</row></column>
                <scroll-view horizontal><row class="gap-2">@foreach ($example['chips'] as $chip)<chip label="{{ $chip }}" />@endforeach</row></scroll-view>
                <row class="gap-3">@foreach ($example['items'] as $item)<column class="flex-1 rounded-3xl bg-white p-3 gap-2"><image src="{{ $item['image'] }}" class="w-full h-[150] rounded-2xl" :fit="2" /><text class="text-[16] font-bold text-[#111827]" :maxLines="1">{{ $item['title'] }}</text><text class="text-[12] text-[#64748B]" :maxLines="2">{{ $item['subtitle'] }}</text><text class="text-[12] font-semibold" style="color: {{ $example['color'] }}">{{ $item['meta'] }}</text></column>@endforeach</row>
                <button label="{{ $example['proof'][0] }}" color="{{ $example['color'] }}" labelColor="#FFFFFF" />
            </column>
        @endif
    </column>
</scroll-view>
