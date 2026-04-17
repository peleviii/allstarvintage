@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-2">Ομάδες</h1>
    <p class="text-sm text-gray-500 mb-6">All Star Vintage Tournament — Μαρκόπουλο, 5-7 Ιουνίου 2026</p>

    <!-- Μήνυμα -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-6 text-center">
        <div class="text-3xl mb-2">🏐</div>
        <p class="font-medium text-[#1a3a6b]">Οι ομάδες συμπληρώνονται με τις δηλώσεις συμμετοχής!</p>
        <p class="text-sm text-gray-500 mt-1">Κάθε ομάδα που δηλώνει συμμετοχή εμφανίζεται εδώ μετά την επιβεβαίωση.</p>
    </div>

    <!-- Ομάδες -->
<!-- Ομάδες -->
@php $allTeams = $teams->flatten()->filter(fn($t) => !str_starts_with($t->name, 'Ομάδα ')); @endphp

@if($allTeams->count() > 0)
    @foreach($allTeams as $team)
    <a href="{{ route('teams.show', $team) }}"
       class="bg-white rounded-xl border border-gray-200 p-4 flex items-center gap-4 mb-3 hover:border-[#2563eb] hover:shadow-sm transition">
        @if($team->logo)
            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-[#d4a017]">
        @else
            <div class="w-12 h-12 rounded-full bg-[#1a3a6b] flex items-center justify-center border-2 border-[#d4a017]">
                <span class="text-white font-bold">{{ substr($team->name, 0, 1) }}</span>
            </div>
        @endif
        <div>
            <div class="font-medium text-gray-800">{{ $team->name }}</div>
            <div class="text-xs text-gray-400">{{ $team->players->count() }} παίκτες</div>
        </div>
        <div class="ml-auto flex items-center gap-2">
            @if($team->group)
                <span class="text-xs bg-[#1a3a6b] text-white px-2 py-1 rounded-full">Όμιλος {{ $team->group }}</span>
            @else
                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Αναμένει κλήρωση</span>
            @endif
            <span class="text-gray-400 text-sm">→</span>
        </div>
    </a>
    @endforeach
@endif

    <!-- Κουμπί δήλωσης -->
    <div class="mt-8 text-center">
        <a href="/epikoinonia"
            class="inline-block bg-[#1a3a6b] text-white px-8 py-3 rounded-xl font-medium text-sm hover:bg-[#2563eb] transition">
            🏐 Δήλωσε την ομάδα σου!
        </a>
    </div>

</div>
@endsection