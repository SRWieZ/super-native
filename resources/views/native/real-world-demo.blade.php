<scroll-view class="w-full h-full bg-theme-background">
    <column class="w-full gap-0">
        <column class="w-full px-4 pt-4 pb-5" style="background-color: {{ $example['color'] }}">
            <row class="w-full items-center justify-between">
                <column class="w-[54] h-[54] rounded-2xl items-center justify-center" style="background-color: {{ $example['accent'] }}">
                    <icon name="{{ $example['icon'] }}" :size="28" color="{{ $example['color'] }}" />
                </column>
                <column @press="toggleSaved" class="w-[42] h-[42] rounded-full bg-white/20 items-center justify-center">
                    <icon name="{{ $isSaved ? 'bookmark.fill' : 'bookmark' }}" :size="22" color="#FFFFFF" />
                </column>
            </row>

            <spacer class="h-[18]" />

            <text class="text-[13] font-semibold text-white/80">Inspired by {{ $example['inspiration'] }}</text>
            <text class="text-[32] font-bold text-white" :maxLines="2">{{ $example['hero'] }}</text>
            <spacer class="h-[8]" />
            <text class="text-[15] text-white/90" :maxLines="3">{{ $example['subtitle'] }}</text>

            <spacer class="h-[16]" />

            <row class="gap-2">
                @foreach ($example['stats'] as $stat)
                    <column class="flex-1 rounded-2xl bg-white/20 px-3 py-3">
                        <text class="text-[11] text-white/75">{{ $stat['label'] }}</text>
                        <text class="text-[18] font-bold text-white">{{ $stat['value'] }}</text>
                    </column>
                @endforeach
            </row>
        </column>

        <column class="w-full px-4 py-4 bg-theme-surface gap-3">
            <row class="items-center justify-between">
                <column>
                    <text class="text-[22] font-bold text-theme-on-surface">{{ $example['title'] }}</text>
                    <text class="text-[13] text-theme-on-surface/60">{{ $example['shortTitle'] }} prototype</text>
                </column>
                <button label="{{ $example['cta'] }}" color="{{ $example['color'] }}" labelColor="#FFFFFF" :fontSize="12" />
            </row>

            <scroll-view horizontal>
                <row class="gap-2">
                    @foreach ($example['chips'] as $chip)
                        <chip label="{{ $chip }}" />
                    @endforeach
                </row>
            </scroll-view>
        </column>

        <column class="w-full px-4 py-4 gap-3">
            <column class="rounded-3xl px-4 py-4 gap-2" style="background-color: {{ $example['accent'] }}">
                <row class="items-center gap-2">
                    <icon name="sparkles" :size="18" color="{{ $example['color'] }}" />
                    <text class="text-[16] font-bold text-theme-on-surface">Liquid Glass-ready chrome</text>
                </row>
                <text class="text-[13] text-theme-on-surface/70" :maxLines="3">
                    This fake app is deliberately built from familiar mobile patterns: native navigation, native lists, sheets, cards and state changes from PHP.
                </text>
            </column>

            @foreach ($example['cards'] as $card)
                <column class="w-full rounded-3xl bg-theme-surface px-4 py-4 gap-3">
                    <row class="w-full items-center gap-3">
                        <column class="w-[48] h-[48] rounded-2xl items-center justify-center" style="background-color: {{ $example['accent'] }}">
                            <icon name="{{ $card['icon'] }}" :size="23" color="{{ $example['color'] }}" />
                        </column>
                        <column class="flex-1 gap-1">
                            <text class="text-[16] font-bold text-theme-on-surface" :maxLines="1">{{ $card['title'] }}</text>
                            <text class="text-[13] text-theme-on-surface/70" :maxLines="2">{{ $card['subtitle'] }}</text>
                        </column>
                        <text class="text-[12] font-semibold" style="color: {{ $example['color'] }}">{{ $card['meta'] }}</text>
                    </row>
                </column>
            @endforeach

            <column class="rounded-3xl bg-theme-surface px-4 py-4 gap-3">
                <text class="text-[17] font-bold text-theme-on-surface">What this proves for a tweet</text>
                @foreach ($example['proof'] as $proof)
                    <row class="items-center gap-2">
                        <column class="w-[22] h-[22] rounded-full items-center justify-center" style="background-color: {{ $example['color'] }}">
                            <icon name="checkmark" :size="13" color="#FFFFFF" />
                        </column>
                        <text class="text-[14] text-theme-on-surface">{{ $proof }}</text>
                    </row>
                @endforeach
            </column>
        </column>
    </column>
</scroll-view>
