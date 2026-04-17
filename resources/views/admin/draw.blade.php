@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-medium text-[#1a3a6b]">Κλήρωση Ομίλων</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-[#2563eb] hover:underline">← Dashboard</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 text-sm text-blue-800">
        <p>Βάλε κάθε ομάδα στον όμιλό της. Μετά πάτα <strong>Αποθήκευση</strong> και τρέξε <strong>Δημιουργία Αγώνων ⚡</strong> από το dashboard.</p>
    </div>

    <form action="{{ route('admin.draw.update') }}" method="POST">
        @csrf

        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mb-6">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#1a3a6b] text-white">
                        <th class="text-left px-4 py-3 font-medium">Ομάδα</th>
                        <th class="px-4 py-3 font-medium text-center">Όμιλος</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $i => $team)
                    <tr class="border-b border-gray-100 last:border-0 {{ $i % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <div class="flex items-center gap-3">
                                @if($team->logo)
                                    <img src="{{ asset('storage/' . $team->logo) }}" class="w-8 h-8 rounded-full object-cover border border-[#d4a017]">
                                @else
                                    <div class="w-8 h-8 rounded-full bg-[#1a3a6b] flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ substr($team->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                {{ $team->name }}
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <select name="groups[{{ $team->id }}]"
                                    class="border border-gray-200 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-[#2563eb]">
                                <option value="">— Χωρίς όμιλο —</option>
                                @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
                                    <option value="{{ $key }}" {{ $team->group === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="w-full bg-[#1a3a6b] text-white py-3 rounded-xl font-medium text-sm hover:bg-[#2563eb] transition">
            🎲 Αποθήκευση Κλήρωσης
        </button>
    </form>

</div>
<button type="button" onclick="randomDraw()"
    class="w-full mt-3 bg-gray-100 text-gray-700 py-3 rounded-xl font-medium text-sm hover:bg-gray-200 transition">
    🎲 Τυχαία Κλήρωση
</button>

<script>
function randomDraw() {
    if (!confirm('Θα αναμείξει τυχαία τις ομάδες στους ομίλους. Συνέχεια;')) return;

    const selects = document.querySelectorAll('select[name^="groups"]');
    const groups = ['A', 'A', 'A', 'B', 'B', 'B', 'C', 'C', 'C', 'D', 'D', 'D'];

    // Ανακάτεμα
    for (let i = groups.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [groups[i], groups[j]] = [groups[j], groups[i]];
    }

    selects.forEach((select, i) => {
        if (i < groups.length) {
            select.value = groups[i];
        }
    });
}
</script>
@endsection