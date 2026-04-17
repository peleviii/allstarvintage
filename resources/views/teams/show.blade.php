@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <!-- Team Header -->
    <div class="bg-gradient-to-r from-[#1a3a6b] to-[#0f2347] rounded-xl p-6 mb-6 flex items-center gap-5">
        @if($team->logo)
            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" class="w-20 h-20 rounded-full border-3 border-[#d4a017] object-cover">
        @else
            <div class="w-20 h-20 rounded-full bg-[#2563eb] border-3 border-[#d4a017] flex items-center justify-center">
                <span class="text-white font-bold text-2xl">{{ substr($team->name, 0, 1) }}</span>
            </div>
        @endif
        <div>
            <h1 class="text-white text-2xl font-medium">{{ $team->name }}</h1>
            <p class="text-[#d4a017] text-sm mt-1">Όμιλος {{ $team->group }}</p>
            <p class="text-gray-400 text-sm">{{ $team->players->count() }} παίκτες</p>
        </div>
    </div>

    <!-- Players Table -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
            <h2 class="font-medium text-[#1a3a6b]">Κατάλογος Παικτών</h2>
        </div>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-[#1a3a6b] text-white">
                    <th class="px-4 py-3 text-center font-medium w-16">#</th>
                    <th class="px-4 py-3 text-left font-medium">Ονοματεπώνυμο</th>
                    <th class="px-4 py-3 text-center font-medium">Φύλο</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team->players->sortBy('number') as $i => $player)
                <tr class="border-b border-gray-100 {{ $i % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                    <td class="px-4 py-3 text-center font-bold text-[#2563eb]">{{ $player->number }}</td>
                    <td class="px-4 py-3 text-gray-800">{{ $player->name }}</td>
                    <td class="px-4 py-3 text-center">
                        @if($player->gender === 'Α')
                            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">Άνδρας</span>
                        @else
                            <span class="bg-pink-100 text-pink-700 text-xs px-2 py-1 rounded-full">Γυναίκα</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('teams.index') }}" class="inline-block mt-4 text-sm text-[#2563eb] hover:underline">← Πίσω στις ομάδες</a>

</div>
@endsection