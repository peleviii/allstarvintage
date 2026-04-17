@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-medium text-[#1a3a6b]">Διαχείριση Αγώνων</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-[#2563eb] hover:underline">← Dashboard</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- ΦΑΣΗ ΟΜΙΛΩΝ -->
    <h2 class="text-lg font-medium text-[#1a3a6b] mb-4">🏐 Φάση Ομίλων</h2>

    @foreach([1 => 'Παρασκευή', 2 => 'Σάββατο'] as $day => $label)
    @if(isset($groupMatches[$day]))
    <div class="mb-6">
        <h3 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-2 rounded-t-xl">
            Ημέρα {{ $day }} — {{ $label }}
        </h3>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">
            @foreach($groupMatches[$day] as $match)
                @include('admin._match_admin_row', ['match' => $match, 'teams' => $teams])
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

    <!-- ΦΑΣΗ ΝΟΚ ΑΟΥΤ -->
    <h2 class="text-lg font-medium text-[#1a3a6b] mt-8 mb-4">🏆 Φάση Νοκ Άουτ</h2>

    @foreach([
        'quarterfinal' => 'Προημιτελικοί',
        'semifinal'    => 'Ημιτελικοί',
        'third_place'  => 'Μικρός Τελικός',
        'final'        => '🥇 Τελικός'
    ] as $round => $label)
    @if(isset($knockoutMatches[$round]))
    <div class="mb-6">
        <h3 class="text-sm font-medium text-white bg-[#1a3a6b] px-4 py-2 rounded-t-xl">
            {{ $label }}
        </h3>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden">
            @foreach($knockoutMatches[$round] as $match)
                @include('admin._match_admin_row', ['match' => $match, 'teams' => $teams])
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

</div>
@endsection