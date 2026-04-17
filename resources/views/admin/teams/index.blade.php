@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-medium text-[#1a3a6b]">Διαχείριση Ομάδων</h1>
        <div class="flex gap-2">
            <a href="{{ route('admin.teams.create') }}" class="bg-[#1a3a6b] text-white text-sm px-4 py-2 rounded-lg hover:bg-[#2563eb] transition">
                ➕ Νέα Ομάδα
            </a>
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-[#2563eb] hover:underline">← Dashboard</a>
        </div>
    </div>
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Ομάδες χωρίς όμιλο -->
    @if(isset($teams['']) && $teams['']->count() > 0)
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-500 border-b-2 border-gray-200 pb-2 mb-3">⏳ Αναμένουν κλήρωση</h2>
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left px-4 py-3 font-medium text-gray-600">Ομάδα</th>
                        <th class="px-4 py-3 font-medium text-gray-600 text-center">Παίκτες</th>
                        <th class="px-4 py-3 font-medium text-gray-600 text-right">Ενέργειες</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams[''] as $team)
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $team->name }}</td>
                        <td class="px-4 py-3 text-center text-gray-500">{{ $team->players_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.teams.edit', $team) }}"
                                class="bg-[#1a3a6b] text-white text-xs px-3 py-1 rounded hover:bg-[#2563eb] transition">
                                Επεξεργασία
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Ομάδες με όμιλο -->
    @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
    @if(isset($teams[$key]) && $teams[$key]->count() > 0)
    <div class="mb-6">
        <h2 class="text-lg font-medium text-[#1a3a6b] border-b-2 border-[#d4a017] pb-2 mb-3">{{ $label }}</h2>
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left px-4 py-3 font-medium text-gray-600">Ομάδα</th>
                        <th class="px-4 py-3 font-medium text-gray-600 text-center">Παίκτες</th>
                        <th class="px-4 py-3 font-medium text-gray-600 text-right">Ενέργειες</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams[$key] as $team)
                    <tr class="border-b border-gray-100 last:border-0">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $team->name }}</td>
                        <td class="px-4 py-3 text-center text-gray-500">{{ $team->players_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.teams.edit', $team) }}"
                                class="bg-[#1a3a6b] text-white text-xs px-3 py-1 rounded hover:bg-[#2563eb] transition">
                                Επεξεργασία
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @endforeach

</div>
@endsection