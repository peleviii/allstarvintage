@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="/" class="inline-flex items-center gap-2 bg-[#1f3464] hover:bg-[#1a3a6b] text-white px-4 py-2 rounded-lg transition font-medium text-sm">
            ← Πίσω στην Αρχική
        </a>
    </div>
    
    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-6">Χορηγοί & Υποστηρικτές</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex flex-col items-center text-center">
            <img src="{{ asset('images/agkalia.png') }}" alt="Αγκαλιά Αττικής" class="h-20 object-contain mb-4">
            <h2 class="font-medium text-[#1a3a6b]">Αγκαλιά της Αττικής</h2>
            <p class="text-xs text-gray-500 mt-1">Πολιτισμός - Αθλητισμός στις γειτονιές μας</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-6 flex flex-col items-center text-center">
            <img src="{{ asset('images/periferia.png') }}" alt="Περιφέρεια Αττικής" class="h-20 object-contain mb-4">
            <h2 class="font-medium text-[#1a3a6b]">Περιφέρεια Αττικής</h2>
            <p class="text-xs text-gray-500 mt-1">Υπό την αιγίδα της Περιφέρειας Αττικής</p>
        </div>
    </div>
</div>
@endsection
