@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="/" class="inline-flex items-center gap-2 bg-[#1f3464] hover:bg-[#1a3a6b] text-white px-4 py-2 rounded-lg transition font-medium text-sm">
            ← Πίσω στην Αρχική
        </a>
    </div>

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-2">Βαθμολογία</h1>
    <p class="text-sm text-gray-500 mb-6">Νίκη 2-0 → +3β / 0β &nbsp;|&nbsp; Νίκη 2-1 → +2β / +1β</p>

@php $drawDate = \Carbon\Carbon::create(2026, 6, 1, 12, 0, 0); @endphp

@if(now()->lt($drawDate))
<div class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-6 text-center">
    <div class="text-3xl mb-2">🎲</div>
    <p class="font-medium text-[#1a3a6b]">Η κλήρωση των ομίλων δεν έχει πραγματοποιηθεί ακόμα.</p>
    <p class="text-sm text-gray-500 mt-1">Δευτέρα <strong>1 Ιουνίου 2026</strong> στις <strong>12:00</strong></p>
</div>
@endif

    <!-- Group Tabs -->
    <div class="flex gap-2 mb-6 border-b-2 border-[#d4a017]">
        @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
        <button
            onclick="showGroup('{{ $key }}')"
            id="tab-{{ $key }}"
            class="group-tab px-5 py-2 text-sm font-medium rounded-t-lg transition
                   {{ $key === 'A' ? 'bg-[#1a3a6b] text-[#d4a017]' : 'text-gray-500 hover:text-[#1a3a6b]' }}">
            {{ $label }}
        </button>
        @endforeach
    </div>

    <!-- Group Tables -->
    @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
    <div id="group-{{ $key }}" class="group-panel {{ $key !== 'A' ? 'hidden' : '' }}">
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#1a3a6b] text-white">
                        <th class="text-left px-4 py-3 font-medium">Ομάδα</th>
                        <th class="px-3 py-3 font-medium">Α</th>
                        <th class="px-3 py-3 font-medium">Ν</th>
                        <th class="px-3 py-3 font-medium">Η</th>
                        <th class="px-3 py-3 font-medium">S+</th>
                        <th class="px-3 py-3 font-medium">S-</th>
                        <th class="px-3 py-3 font-medium">Β</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standings[$key] as $i => $row)
                    <tr class="{{ $i < 2 ? 'bg-blue-50 border-l-4 border-[#2563eb]' : '' }} {{ $i % 2 === 0 && $i >= 2 ? 'bg-gray-50' : '' }} border-b border-gray-100">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">{{ $i + 1 }}</span>
                            {{ $row['team']->name }}
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">{{ $row['played'] }}</td>
                        <td class="px-3 py-3 text-center text-gray-600">{{ $row['wins'] }}</td>
                        <td class="px-3 py-3 text-center text-gray-600">{{ $row['losses'] }}</td>
                        <td class="px-3 py-3 text-center text-gray-600">{{ $row['sets_for'] }}</td>
                        <td class="px-3 py-3 text-center text-gray-600">{{ $row['sets_against'] }}</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">{{ $row['points'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-blue-50 border-l-2 border-[#2563eb]"></span>
            Προκρίνεται στην επόμενη φάση
        </p>
    </div>
    @endforeach

</div>

<script>
function showGroup(key) {
    document.querySelectorAll('.group-panel').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.group-tab').forEach(t => {
        t.classList.remove('bg-[#1a3a6b]', 'text-[#d4a017]');
        t.classList.add('text-gray-500');
    });
    document.getElementById('group-' + key).classList.remove('hidden');
    document.getElementById('tab-' + key).classList.add('bg-[#1a3a6b]', 'text-[#d4a017]');
    document.getElementById('tab-' + key).classList.remove('text-gray-500');
}
</script>
@endsection