<div class="px-4 py-3 hover:bg-gray-50 transition">
    <div class="flex items-center gap-2 mb-1">
        <span class="text-xs text-gray-400 font-medium">{{ $m['label'] }}</span>
    </div>
    <div class="flex items-center gap-3">
        {{-- Home --}}
        <div class="flex-1 text-right">
            <span class="font-medium text-gray-800 text-sm">
                @if(isset($match) && $match && $match->teamHome)
                {{ $match->teamHome->name }}
                @else
                <span class="text-gray-500 text-sm">{{ $m['home'] }}</span>
                @endif
            </span>
        </div>

        {{-- Score or Time --}}
       <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
    @if(isset($match) && $match && $match->played)
        <div class="flex bg-[#1a3a6b] items-center gap-1   px-1  text-white font-bold text-sm justify-center rounded">
            <span>{{ $match->sets_home }}</span>
            <span class="text-gray-400 text-xs">-</span>
            <span>{{ $match->sets_away }}</span>
        </div>
    @else <span class="text-gray-400 text-xs">{{ $m['time'] }}</span>
    @endif
</div>

        {{-- VS Separator for non-played matches --}}

        {{-- Away --}}
        <div class="flex-1 text-left">
            <span class="font-medium text-gray-800 text-sm">
                @if(isset($match) && $match && $match->teamAway)
                {{ $match->teamAway->name }}
                @else
                <span class="text-gray-500 text-sm">{{ $m['away'] }}</span>
                @endif
            </span>
        </div>
    </div>
</div>