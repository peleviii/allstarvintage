@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="/" class="inline-flex items-center gap-2 bg-[#1f3464] hover:bg-[#1a3a6b] text-white px-4 py-2 rounded-lg transition font-medium text-sm">
            ← Πίσω στην Αρχική
        </a>
    </div>

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-6">Πρόγραμμα Αγώνων</h1>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- ΠΑΡΑΣΚΕΥΗ -->
    @if(isset($groupMatches[1]))
    <div class="mb-8">
        <h2 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl">
            🏐 Ημέρα 1 — Παρασκευή 5/6/2026 — Φάση Ομίλων
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">
            @foreach($groupMatches[1] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach
        </div>
    </div>
    @endif

    <!-- ΣΑΒΒΑΤΟ — Όμιλοι -->
    @if(isset($groupMatches[2]))
    <div class="mb-6">
        <h2 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl">
            🏐 Ημέρα 2 — Σάββατο 6/6/2026 — Φάση Ομίλων (συνέχεια)
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">
            @foreach($groupMatches[2] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach
        </div>
    </div>

    @endif

    <!-- ΣΑΒΒΑΤΟ — Προημιτελικοί -->
    @if(isset($knockoutMatches['quarterfinal']))
    <div class="mb-8">
        <h2 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl">
            🏐 Σάββατο 6/6/2026 — Προημιτελικοί
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">
            @foreach($knockoutMatches['quarterfinal'] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach
        </div>
    </div>
    @endif

    <!-- ΚΥΡΙΑΚΗ -->
    <div class="mb-4">
        <h2 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl">
            🏆 Ημέρα 3 — Κυριακή 7/6/2026 — Κατάταξη, Ημιτελικοί & Τελικός
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">

            <!-- Κατάταξη -->
            <div class="px-4 py-2 bg-gray-50 border-b border-gray-200">
                <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Κατάταξη</span>
            </div>
            @foreach($knockoutMatches['seventh_place'] ?? [] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach
            @foreach($knockoutMatches['fifth_place'] ?? [] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach

            <!-- Τουρνουά Ακαδημιών -->
            @foreach($knockoutMatches['event'] ?? [] as $match)
            @if($match->match_label === 'Τουρνουά Ακαδημιών')
            <div class="px-4 py-3 border-b border-gray-100 flex items-center gap-3 bg-blue-50">
                <span class="text-[#1a3a6b] font-medium text-sm min-w-[50px]">{{ $match->match_time }}</span>
                <span class="text-[#1a3a6b] font-medium text-sm">{{ $match->match_label }}</span>
            </div>
            @endif
            @endforeach

            <!-- Ημιτελικοί -->
            <div class="px-4 py-2 bg-gray-50 border-b border-gray-200 border-t border-gray-200">
                <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Ημιτελικοί</span>
            </div>
            @foreach($knockoutMatches['semifinal'] ?? [] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach

            <!-- Μικρός Τελικός -->
            <div class="px-4 py-2 bg-gray-50 border-b border-gray-200 border-t border-gray-200">
                <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Μικρός Τελικός</span>
            </div>
            @foreach($knockoutMatches['third_place'] ?? [] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach

            <!-- Αγώνας Επιλέκτων & Music Show -->
            @foreach($knockoutMatches['event'] ?? [] as $match)
            @if($match->match_label !== 'Τουρνουά Ακαδημιών')
            <div class="px-4 py-3 border-b border-gray-100 flex items-center gap-3 bg-blue-50">
                <span class="text-[#1a3a6b] font-medium text-sm min-w-[50px]">{{ $match->match_time }}</span>
                <span class="text-[#1a3a6b] font-medium text-sm">{{ $match->match_label }}</span>
            </div>
            @endif
            @endforeach

            <!-- Μεγάλος Τελικός -->
            <div class="px-4 py-2 bg-[#d4a017] border-t-2 border-[#d4a017]">
                <span class="text-xs font-medium text-white uppercase tracking-wide">🥇 Μεγάλος Τελικός</span>
            </div>
            @foreach($knockoutMatches['final'] ?? [] as $match)
            @include('matches._match_row', ['match' => $match])
            @endforeach

        </div>
    </div>
</div>
@endsection