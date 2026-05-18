<div class="px-4 py-4 border-b border-gray-100 last:border-0">

    <!-- Teams & Score -->
    <div class="flex items-center justify-between gap-3 mb-3">
        <div class="flex-1 text-right">
         <span class="font-medium text-gray-800 text-sm">{{ $match->teamHome->name ?? 'Αναμένεται' }}</span>
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
            <span class="font-medium text-gray-800 text-sm">{{ $match->teamAway->name ?? 'Αναμένεται' }}</span>
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

   

</div>