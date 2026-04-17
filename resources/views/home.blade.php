@extends('layouts.app')

@section('content')
<div class="bg-[#1f3464] min-h-[calc(100vh-280px)] md:min-h-[calc(100vh-200px)] px-4 flex flex-col md:flex-row items-center md:items-center justify-center gap-4 md:gap-8 pb-4">
    <!-- Left: Large Logo -->
    <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-64 h-64 md:w-80 md:h-80 mx-auto rounded-full ">
    </div>

    <!-- Right: Content -->
    <div class="flex-1 text-center">
        <h1 class="text-white text-3xl font-medium mb-3">All Star Vintage</h1>
        <p class="text-gray-300 text-base mb-3">
            Το μεγαλύτερο τουρνουά volley στο Μαρκόπουλο.
            Τρεις μέρες αγώνων, εκδηλώσεων και αθλητισμού.
        </p>
        <p class="text-gray-400 text-sm mb-6">5-7 Ιουνίου 2026</p>

    </div>

    <!-- Small Logo -->
    <div class="flex-1 flex justify-center">
        <img src="{{ asset('images/1agkalia.png') }}" alt="Agkalia Logo" class="w-40 h-40 md:w-80 md:h-80 mx-auto rounded-full ">
    </div>
</div>

<div class="max-w-3xl mx-auto px-4 pt-10 text-center">
    <p class="text-[#1a3a6b] text-lg font-medium mb-3">Καλώς ήρθατε στο πιο εντυπωσιακό τουρνουά volleyball της Αττικής.</p>

    <p class="text-gray-600 text-sm leading-relaxed mb-4">
        Το <strong>All Star Vintage Tournament</strong> δεν είναι απλώς ένα τουρνουά — είναι μια εμπειρία.
        Επαγγελματική οργάνωση, υψηλές προδιαγραφές και ατμόσφαιρα που θυμίζει τις μεγάλες διοργανώσεις της Α1 κατηγορίας,
        σε ένα τουρνουά που απευθύνεται σε όλους όσους αγαπούν το βόλεϊ.
    </p>

    <p class="text-gray-600 text-sm leading-relaxed mb-6">
        Τρεις μέρες αγώνων υψηλού επιπέδου, με <strong>12 ομάδες</strong> από όλη την Αττική,
        live αποτελέσματα, βαθμολογίες σε πραγματικό χρόνο και μια απονομή που δεν θα ξεχάσετε.
        Έλα να αγωνιστείς, έλα να δεις, έλα να νιώσεις τη διαφορά.
    </p>

    <div class="inline-block bg-[#d4a017] text-white text-xs font-medium px-4 py-2 rounded-full mb-2">
        🏐 5, 6 & 7 Ιουνίου 2026 — Μαρκόπουλο Αττικής
    </div>
    <div class="border-t border-[#d4a017]/30 pt-2  text-center">
        <a href="/epikoinonia" class="inline-block bg-[#1a3a6b] text-white px-8 py-3 rounded-xl font-medium text-sm hover:bg-[#2563eb] transition mb-8">
            🏐 Δήλωσε την ομάδα σου!
        </a>
    </div>
</div>
<div class="max-w-3xl mx-auto px-4 pb-2 grid grid-cols-2 sm:grid-cols-4 gap-3 text-center">
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <div class="text-2xl mb-1">📺</div>
        <div class="text-xs font-medium text-[#1a3a6b]">Live Streaming</div>
        <div class="text-xs text-gray-400 mt-1">Youtube</div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <div class="text-2xl mb-1">⭐</div>
        <div class="text-xs font-medium text-[#1a3a6b]">Αγώνας Επιλέκτων</div>
        <div class="text-xs text-gray-400 mt-1">Κυριακή βράδυ</div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <div class="text-2xl mb-1">🎵</div>
        <div class="text-xs font-medium text-[#1a3a6b]">Music Show</div>
        <div class="text-xs text-gray-400 mt-1">Live μουσική</div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-4">
        <div class="text-2xl mb-1">🎁</div>
        <div class="text-xs font-medium text-[#1a3a6b]">Εκπλήξεις</div>
        <div class="text-xs text-gray-400 mt-1">Μείνετε συντονισμένοι!</div>
    </div>
</div>
<div class="max-w-5xl mx-auto px-4 pb-10 grid grid-cols-2 md:grid-cols-4 gap-4">
    <a href="/programa" class="bg-white rounded-xl border border-gray-200 p-5 text-center hover:border-[#2563eb] hover:shadow-sm transition">
        <div class="text-2xl mb-2">📅</div>
        <div class="text-sm font-medium text-[#1a3a6b]">Πρόγραμμα</div>
    </a>
    <a href="/omades" class="bg-white rounded-xl border border-gray-200 p-5 text-center hover:border-[#2563eb] hover:shadow-sm transition">
        <div class="text-2xl mb-2">🏐</div>
        <div class="text-sm font-medium text-[#1a3a6b]">Ομάδες</div>
    </a>
    <a href="/vathmologia" class="bg-white rounded-xl border border-gray-200 p-5 text-center hover:border-[#2563eb] hover:shadow-sm transition">
        <div class="text-2xl mb-2">🏆</div>
        <div class="text-sm font-medium text-[#1a3a6b]">Βαθμολογία</div>
    </a>
    <a href="/kanones" class="bg-white rounded-xl border border-gray-200 p-5 text-center hover:border-[#2563eb] hover:shadow-sm transition">
        <div class="text-2xl mb-2">📋</div>
        <div class="text-sm font-medium text-[#1a3a6b]">Κανόνες</div>
    </a>
</div>



@endsection