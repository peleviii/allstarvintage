<div class="px-4 py-4 border-b border-gray-100 last:border-0">

    <!-- Teams & Score -->
    <div class="flex items-center justify-between gap-3 mb-3">
        <div class="flex-1 text-right">
            <span class="font-medium text-gray-800 text-sm">{{ $match->teamHome->name }}</span>
        </div>
        <div class="min-w-[80px] text-center">
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
            <span class="font-medium text-gray-800 text-sm">{{ $match->teamAway->name }}</span>
        </div>
    </div>

    <!-- Score Form -->
    <form action="{{ route('admin.matches.update', $match) }}" method="POST"
        class="flex items-center gap-2 justify-center mb-2">
        @csrf
        @method('PATCH')
        <select name="sets_home" class="border border-gray-200 rounded px-2 py-1 text-sm w-16 text-center">
            @for($i = 0; $i <= 2; $i++)
                <option value="{{ $i }}" {{ $match->sets_home == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
        </select>
        <span class="text-gray-400 text-sm">—</span>
        <select name="sets_away" class="border border-gray-200 rounded px-2 py-1 text-sm w-16 text-center">
            @for($i = 0; $i <= 2; $i++)
                <option value="{{ $i }}" {{ $match->sets_away == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
        </select>
        <button type="submit" class="bg-[#1a3a6b] text-white text-xs px-3 py-1 rounded hover:bg-[#2563eb] transition">
            Αποθήκευση
        </button>
    </form>

    <!-- Teams Form (μόνο για knockout) -->
    @if(in_array($match->round, ['semifinal', 'third_place', 'final']))
    <form action="{{ route('admin.matches.updateTeams', $match) }}" method="POST"
        class="flex items-center gap-2 justify-center pt-2 border-t border-gray-100">
        @csrf
        @method('PATCH')
        <select name="team_home_id" class="border border-gray-200 rounded px-2 py-1 text-xs flex-1">
            @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ $match->team_home_id == $team->id ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
            @endforeach
        </select>
        <span class="text-gray-400 text-xs">VS</span>
        <select name="team_away_id" class="border border-gray-200 rounded px-2 py-1 text-xs flex-1">
            @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ $match->team_away_id == $team->id ? 'selected' : '' }}>
                {{ $team->name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="bg-[#d4a017] text-white text-xs px-3 py-1 rounded hover:bg-yellow-600 transition">
            Ομάδες
        </button>
    </form>
    @endif

</div>