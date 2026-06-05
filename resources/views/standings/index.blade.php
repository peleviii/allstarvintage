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

    <!-- Group Tabs -->
    <div class="flex gap-2 mb-6 border-b-2 border-[#d4a017]">
        <button onclick="showGroup('A')" id="tab-A" class="group-tab px-5 py-2 text-sm font-medium rounded-t-lg transition bg-[#1a3a6b] text-[#d4a017]">Όμιλος Α</button>
        <button onclick="showGroup('B')" id="tab-B" class="group-tab px-5 py-2 text-sm font-medium rounded-t-lg transition text-gray-500 hover:text-[#d4a017]">Όμιλος Β</button>
        <button onclick="showGroup('C')" id="tab-C" class="group-tab px-5 py-2 text-sm font-medium rounded-t-lg transition text-gray-500 hover:text-[#d4a017]">Όμιλος Γ</button>
        <button onclick="showGroup('D')" id="tab-D" class="group-tab px-5 py-2 text-sm font-medium rounded-t-lg transition text-gray-500 hover:text-[#d4a017]">Όμιλος Δ</button>
    </div>

    <!-- Group A -->
    <div id="group-A" class="group-panel">
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
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">1</span>
                            Α.Ο. Μαρκόπουλο 1
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">3</td>
                    </tr>
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">2</span>
                                  Όμιλος Φιλάθλων Γέρακα
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">3</span>
                            Τιτάνες
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-blue-50 border-l-2 border-[#2563eb]"></span>
            Προκρίνεται στην επόμενη φάση
        </p>
    </div>


    <!-- Group B  -->
    <div id="group-B" class="group-panel hidden">
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
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">1</span>
                            Ένωση Γαλατσίου
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">2</td>
                    </tr>
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">2</span>
                           Volley Maniacs
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">1</td>
                    </tr>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">3</span>
                            Α.ΚΕ.Ζωγράφου
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-blue-50 border-l-2 border-[#2563eb]"></span>
            Προκρίνεται στην επόμενη φάση
        </p>
    </div>

    <!-- Group C -->
    <div id="group-C" class="group-panel  hidden">
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
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">1</span>
                            Α.Ο. Μαρκόπουλο 2
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">3</td>
                    </tr>
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">2</span>
                            Φαληρέας
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">1</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">2</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">3</span>
                            Α.Σ. Ιτέας
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-blue-50 border-l-2 border-[#2563eb]"></span>
            Προκρίνεται στην επόμενη φάση
        </p>
    </div>

    <!-- Group D -->
    <div id="group-D" class="group-panel hidden">
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
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">1</span>
                            ΕΑΟ Σπάτων
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                    <tr class="bg-blue-50 border-l-2 border-[#2563eb] ">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">2</span>
                            Α Α Σ Κερατσινιού Δραπετσώνας - Κότινος
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <td class="px-4 py-3 font-medium text-gray-800">
                            <span class="text-xs text-gray-400 mr-2">3</span>
                            Α.Στε.Γοι.
                        </td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center text-gray-600">0</td>
                        <td class="px-3 py-3 text-center font-bold text-[#1a3a6b]">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 mt-2 flex items-center gap-2">
            <span class="inline-block w-3 h-3 bg-blue-50 border-l-2 border-[#2563eb]"></span>
            Προκρίνεται στην επόμενη φάση
        </p>
    </div>

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