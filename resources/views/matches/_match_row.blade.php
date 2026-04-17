<div class="px-4 py-4 border-b border-gray-100 last:border-0">
    <div class="flex items-center justify-between gap-3">
        <div class="flex-1 text-right">
            <span class="font-medium text-gray-800 text-sm">
                @if($match->teamHome && str_starts_with($match->teamHome->name, 'Ομάδα '))
                    <span class="text-gray-400 italic text-xs">{{ $match->teamHome->name }}</span>
                @elseif(!$match->teamHome)
                    <span class="text-gray-400 italic text-xs">Αναμένεται</span>
                @else
                    {{ $match->teamHome->name }}
                @endif
            </span>
        </div>
        <div class="flex items-center gap-2 min-w-[100px] justify-center">
            @if($match->played)
                <span class="bg-[#1a3a6b] text-white font-bold text-lg px-3 py-1 rounded-lg">
                    {{ $match->sets_home }} - {{ $match->sets_away }}
                </span>
            @else
                <span class="text-gray-500 text-xs font-medium px-3 py-1 border border-gray-200 rounded-lg">
                    {{ $match->match_time }}
                </span>
            @endif
        </div>
        <div class="flex-1 text-left">
            <span class="font-medium text-gray-800 text-sm">
                @if($match->teamAway && str_starts_with($match->teamAway->name, 'Ομάδα '))
                    <span class="text-gray-400 italic text-xs">{{ $match->teamAway->name }}</span>
                @elseif(!$match->teamAway)
                    <span class="text-gray-400 italic text-xs">Αναμένεται</span>
                @else
                    {{ $match->teamAway->name }}
                @endif
            </span>
        </div>
    </div>
</div>