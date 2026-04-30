@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-medium text-[#1a3a6b]">Επεξεργασία Ομάδας</h1>
        <a href="{{ route('admin.teams') }}" class="text-sm text-[#2563eb] hover:underline">← Πίσω</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Team Info -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
        <h2 class="font-medium text-[#1a3a6b] mb-4">Στοιχεία Ομάδας</h2>
        <form action="{{ route('admin.teams.update', $team) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Όνομα Ομάδας</label>
                <input type="text" name="name" value="{{ $team->name }}"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Όμιλος</label>
                <select name="group" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
                    <option value="">— Χωρίς όμιλο —</option>
                    @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
                    <option value="{{ $key }}" {{ $team->group === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Logo Ομάδας</label>
                @if($team->logo)
                <img src="{{ asset('storage/' . $team->logo) }}" alt="Logo" class="w-16 h-16 rounded-full object-cover mb-2 border-2 border-[#d4a017]">
                @endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                <p class="text-xs text-gray-400 mt-1">Max 2MB. Προτιμήστε τετράγωνη εικόνα.</p>
            </div>

            <!-- Photo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Φωτογραφία Ομάδας</label>
                @if($team->photo)
                <img src="{{ asset('storage/' . $team->photo) }}" alt="Photo" class="w-full h-32 object-cover rounded-lg mb-2 border border-gray-200">
                @endif
                <input type="file" name="photo" accept="image/*"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                <p class="text-xs text-gray-400 mt-1">Max 4MB.</p>
            </div>

            <button type="submit" class="bg-[#1a3a6b] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#2563eb] transition">
                Αποθήκευση
            </button>
        </form>
    </div>

    <!-- Players -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden mb-6">
        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
            <h2 class="font-medium text-[#1a3a6b]">Παίκτες ({{ $team->players->count() }})</h2>
        </div>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-[#1a3a6b] text-white">
                    <th class="px-4 py-2 text-center font-medium w-16">#</th>
                    <th class="px-4 py-2 text-left font-medium">Ονοματεπώνυμο</th>
                    <th class="px-4 py-2 text-center font-medium">Φύλο</th>
                    <th class="px-4 py-2 text-center font-medium">Ενέργεια</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team->players->sortBy('number') as $i => $player)
                <tr class="border-b border-gray-100 last:border-0 {{ $i % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} player-row-{{ $player->id }}" id="display-{{ $player->id }}">
                    <td class="px-4 py-2 text-center font-bold text-[#2563eb]">{{ $player->number }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $player->name }}</td>
                    <td class="px-4 py-2 text-center">
                        @if($player->gender === 'Α')
                        <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">Άνδρας</span>
                        @else
                        <span class="bg-pink-100 text-pink-700 text-xs px-2 py-1 rounded-full">Γυναίκα</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center space-x-1">
                        <button type="button" onclick="editPlayer('{{ $player->id }}')" class="text-[#2563eb] hover:text-[#1a3a6b] text-xs font-medium">Επεξεργασία</button>
                        <form action="{{ route('admin.players.destroy', $player) }}" method="POST"
                            class="inline" onsubmit="return confirm('Διαγραφή παίκτη;')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs">Διαγραφή</button>
                        </form>
                    </td>
                </tr>
                <!-- Edit Player Form (Hidden) -->
                <tr class="hidden edit-row-{{ $player->id }}" id="edit-{{ $player->id }}">
                    <td colspan="4" class="px-4 py-3 bg-blue-50">
                        <form action="{{ route('admin.players.update', $player) }}" method="POST" class="space-y-2">
                            @csrf
                            @method('PATCH')
                            <div class="grid grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Ονοματεπώνυμο</label>
                                    <input type="text" name="name" value="{{ $player->name }}"
                                        class="w-full border border-gray-200 rounded px-2 py-1 text-xs focus:outline-none focus:border-[#2563eb]">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Αριθμός</label>
                                    <input type="number" name="number" value="{{ $player->number }}" min="1" max="99"
                                        class="w-full border border-gray-200 rounded px-2 py-1 text-xs focus:outline-none focus:border-[#2563eb]">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Φύλο</label>
                                    <select name="gender" class="w-full border border-gray-200 rounded px-2 py-1 text-xs focus:outline-none focus:border-[#2563eb]">
                                        <option value="Α" {{ $player->gender === 'Α' ? 'selected' : '' }}>Άνδρας</option>
                                        <option value="Γ" {{ $player->gender === 'Γ' ? 'selected' : '' }}>Γυναίκα</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button type="submit" class="bg-[#2563eb] text-white px-3 py-1 rounded text-xs hover:bg-[#1a3a6b] transition">Αποθήκευση</button>
                                <button type="button" onclick="cancelEdit('{{ $player->id }}')" class="bg-gray-300 text-gray-700 px-3 py-1 rounded text-xs hover:bg-gray-400 transition">Ακύρωση</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Player -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="font-medium text-[#1a3a6b] mb-4">Προσθήκη Παίκτη</h2>
        <form action="{{ route('admin.teams.players.store', $team) }}" method="POST" class="space-y-3">
            @csrf
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ονοματεπώνυμο</label>
                    <input type="text" name="name"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Αριθμός Φανέλας</label>
                    <input type="number" name="number" min="1" max="99"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Φύλο</label>
                <select name="gender" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
                    <option value="Α">Άνδρας</option>
                    <option value="Γ">Γυναίκα</option>
                </select>
            </div>
            <button type="submit" class="bg-[#1a3a6b] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#2563eb] transition">
                Προσθήκη
            </button>
        </form>
    </div>

</div>

<script>
function editPlayer(playerId) {
    document.getElementById('display-' + playerId).classList.add('hidden');
    document.getElementById('edit-' + playerId).classList.remove('hidden');
}

function cancelEdit(playerId) {
    document.getElementById('display-' + playerId).classList.remove('hidden');
    document.getElementById('edit-' + playerId).classList.add('hidden');
}
</script>
@endsection