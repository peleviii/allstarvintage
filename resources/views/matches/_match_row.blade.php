<div class="px-4 py-4 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition">
    <div class="flex items-center gap-3">
        <!-- Home -->
        <div class="flex-1 flex items-center justify-end gap-2">
            <span class="font-medium text-gray-800 text-sm text-right">
                @if($match->teamHome)
                    {{ $match->teamHome->name }}
                @elseif($match->match_label)
                    <span class="text-gray-400 italic text-xs">{{ explode(' vs ', $match->match_label)[0] ?? 'Αναμένεται' }}</span>
                @else
                    <span class="text-gray-400 italic text-xs">Αναμένεται</span>
                @endif
            </span>
        </div>

        <!-- Score or Time -->
        <div class="flex items-center justify-center min-w-[80px]">
            @if($match->played)
                <div class="flex items-center gap-1">
                    <span class="bg-[#1a3a6b] text-white font-bold text-base w-8 h-8 flex items-center justify-center rounded">{{ $match->sets_home }}</span>
                    <span class="text-gray-400 text-xs">—</span>
                    <span class="bg-[#1a3a6b] text-white font-bold text-base w-8 h-8 flex items-center justify-center rounded">{{ $match->sets_away }}</span>
                </div>
            @else
                <span class="text-gray-500 text-xs font-medium px-3 py-1 border border-gray-200 rounded-lg">{{ $match->match_time }}</span>
            @endif
        </div>

        <!-- Away -->
        <div class="flex-1 flex items-center justify-start gap-2">
            <span class="font-medium text-gray-800 text-sm text-left">
                @if($match->teamAway)
                    {{ $match->teamAway->name }}
                @elseif($match->match_label)
                    <span class="text-gray-400 italic text-xs">{{ explode(' vs ', $match->match_label)[1] ?? 'Αναμένεται' }}</span>
                @else
                    <span class="text-gray-400 italic text-xs">Αναμένεται</span>
                @endif
            </span>
        </div>
    </div>
</div>