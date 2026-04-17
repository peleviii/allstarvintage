@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-2">Admin Panel</h1>
    <p class="text-sm text-gray-500 mb-8">Καλώς ήρθες, {{ auth()->user()->name }}!</p>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
        {{ session('error') }}
    </div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
            <div class="text-3xl font-medium text-[#1a3a6b]">{{ $teams }}</div>
            <div class="text-xs text-gray-500 mt-1">Ομάδες</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
            <div class="text-3xl font-medium text-[#1a3a6b]">{{ $playedMatches }}</div>
            <div class="text-xs text-gray-500 mt-1">Παιχτήκαν</div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
            <div class="text-3xl font-medium text-[#1a3a6b]">{{ $totalMatches - $playedMatches }}</div>
            <div class="text-xs text-gray-500 mt-1">Εκκρεμούν</div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 gap-4">
        <a href="{{ route('admin.matches') }}" class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4 hover:border-[#2563eb] transition">
            <div class="w-10 h-10 bg-[#1a3a6b] rounded-lg flex items-center justify-center text-white text-lg">🏐</div>
            <div>
                <div class="font-medium text-gray-800">Διαχείριση Αγώνων</div>
                <div class="text-xs text-gray-500">Βάλε αποτελέσματα και ενημέρωσε ομάδες</div>
            </div>
            <span class="ml-auto text-gray-400">→</span>
        </a>

        <a href="{{ route('admin.teams') }}" class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4 hover:border-[#2563eb] transition">
            <div class="w-10 h-10 bg-[#1a3a6b] rounded-lg flex items-center justify-center text-white text-lg">👥</div>
            <div>
                <div class="font-medium text-gray-800">Διαχείριση Ομάδων</div>
                <div class="text-xs text-gray-500">Επεξεργασία ομάδων και παικτών</div>
            </div>
            <span class="ml-auto text-gray-400">→</span>
        </a>
        <a href="{{ route('admin.draw') }}" class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4 hover:border-[#2563eb] transition">
            <div class="w-10 h-10 bg-[#d4a017] rounded-lg flex items-center justify-center text-white text-lg">🎲</div>
            <div>
                <div class="font-medium text-gray-800">Κλήρωση Ομίλων</div>
                <div class="text-xs text-gray-500">Βάλε κάθε ομάδα στον όμιλό της</div>
            </div>
            <span class="ml-auto text-gray-400">→</span>
        </a>
        <a href="{{ route('standings.index') }}" class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4 hover:border-[#2563eb] transition">
            <div class="w-10 h-10 bg-[#1a3a6b] rounded-lg flex items-center justify-center text-white text-lg">🏆</div>
            <div>
                <div class="font-medium text-gray-800">Βαθμολογία</div>
                <div class="text-xs text-gray-500">Δες την τρέχουσα κατάσταση</div>
            </div>
            <span class="ml-auto text-gray-400">→</span>
        </a>

        <form action="{{ route('admin.tournament.generate') }}" method="POST"
            onsubmit="return confirm('Θα διαγραφούν όλοι οι υπάρχοντες αγώνες! Συνέχεια;')">
            @csrf
            <button type="submit" class="w-full bg-white rounded-xl border border-[#d4a017] p-5 flex items-center gap-4 hover:bg-yellow-50 transition">
                <div class="w-10 h-10 bg-[#d4a017] rounded-lg flex items-center justify-center text-white text-lg">⚡</div>
                <div class="text-left">
                    <div class="font-medium text-gray-800">Δημιουργία Αγώνων</div>
                    <div class="text-xs text-gray-500">Τρέξε μετά την κλήρωση με 12 ομάδες</div>
                </div>
                <span class="ml-auto text-gray-400">→</span>
            </button>
        </form>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="bg-white rounded-xl border border-red-100 p-5 flex items-center gap-4 hover:border-red-300 transition">
            <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center text-red-500 text-lg">🚪</div>
            <div>
                <div class="font-medium text-red-600">Αποσύνδεση</div>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>

</div>

@endsection