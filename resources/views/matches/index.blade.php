@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8 pb-24">

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-6">Πρόγραμμα Αγώνων</h1>

    {{-- ===== ΠΑΡΑΣΚΕΥΗ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            🏐 Ημέρα 1 — Παρασκευή 5/6/2026 — Φάση Ομίλων
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Α</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="stext-gray-400  text-xs">2-0 (21-9,21-16)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Όμιλος Φιλάθλων Γέρακα</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Β</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Volley Maniacs</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">1-2 (21-12,12-21,11-15)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Ένωση Γαλατσίου</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Γ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 2</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-10, 21-19)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Φαληρέας</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Δ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">ΕΑΟ Σπάτων</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-10, 21-12)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α Α Σ Κερατσινιού Δραπετσώνας - Κότινος</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== ΣΑΒΒΑΤΟ ΟΜΙΛΟΙ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            🏐 Ημέρα 2 — Σάββατο 6/6/2026 — Φάση Ομίλων (συνέχεια)
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Α</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (23-21, 21-11)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Τιτάνες</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Β</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Volley Maniacs</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">0-2 (19-21, 18-21)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.ΚΕ.Ζωγράφου</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Γ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 2</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-1 (21-16, 15-21, 16-14)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Σ. Ιτέας</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Δ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">ΕΑΟ Σπάτων</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-12, 22-20)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Στε.Γοι.</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Α</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Όμιλος Φιλάθλων Γέρακα</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">0-2 (17-21, 11-21)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Τιτάνες</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Β</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Ένωση Γαλατσίου</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">0-2 (19-21, 9-21)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.ΚΕ.Ζωγράφου</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Γ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Φαληρέας</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">1-2 (17-21, 24-22, 12-15)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Σ. Ιτέας</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Όμιλος Δ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α Α Σ Κερατσινιού Δραπετσώνας - Κότινος</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">0-2 (6-21, 7-21)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Στε.Γοι.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== ΣΑΒΒΑΤΟ ΠΡΟΗΜΙΤΕΛΙΚΟΙ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            ⚡ Σάββατο 6/6/2026 — Προημιτελικοί
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Προημιτελικός 1</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">ΕΑΟ Σπάτων</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-10, 21-14)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Σ. Ιτέας</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Προημιτελικός 2</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Τιτάνες</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">0-2 (21-23, 12-21)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.ΚΕ.Ζωγράφου</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Προημιτελικός 3</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 2</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-1 (21-16, 8-21, 15-13)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Στε.Γοι.</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Προημιτελικός 4</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-14, 21-6)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Ένωση Γαλατσίου</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== ΚΥΡΙΑΚΗ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            🏆 Ημέρα 3 — Κυριακή 7/6/2026 — Κατάταξη, Ημιτελικοί & Τελικός
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">

            {{-- Κατάταξη --}}
            <div class="px-4 py-2 bg-gray-50">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Κατάταξη</span>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Κατάταξη 1</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Τιτάνες</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-19, 21-19)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Ένωση Γαλατσίου</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Κατάταξη 2</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Στε.Γοι.</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">2-0 (21-15, 21-18)</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Σ. Ιτέας</span>
                    </div>
                </div>
            </div>

            {{-- Ημιτελικοί --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ημιτελικοί</span>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Ημιτελικός 1</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο  1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">11:30</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Α.Ο. Μαρκόπουλο 2</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Ημιτελικός 2</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α.ΚΕ.Ζωγράφου</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">12:45</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">ΕΑΟ Σπάτων</span>
                    </div>
                </div>
            </div>

            {{-- Αγώνες Αποκλεισμένων --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Αγώνες Αποκλεισμένων</span>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Αποκλεισμένοι 1</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Όμιλος Φιλάθλων Γέρακα</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">14:00</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Volley Maniacs</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Αποκλεισμένοι 2</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Α Α Σ Κερατσινιού Δραπετσώνας - Κότινος</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">15:15</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Φαληρέας</span>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Τελικός Αποκλεισμένων</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Νικητής</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">16:30</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Νικητής</span>
                    </div>
                </div>
            </div>

            {{-- Μικρός Τελικός --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Μικρός Τελικός</span>
            </div>

            <div class="px-4 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">Μικρός Τελικός (3η-4η)</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Ηττημ. ΗΤ1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">17:45</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Ηττημ. ΗΤ2</span>
                    </div>
                </div>
            </div>

            {{-- Events --}}
            <div class="px-4 py-3 bg-blue-50 border-t border-gray-200 flex items-center gap-4">
                <span class="text-[#1a3a6b] font-bold text-sm min-w-[60px]">19:00</span>
                <span class="text-[#1a3a6b] font-medium text-sm">🏐 Αγώνας Επιλέκτων</span>
            </div>
            <div class="px-4 py-3 bg-blue-50 border-t border-gray-200 flex items-center gap-4">
                <span class="text-[#1a3a6b] font-bold text-sm min-w-[60px]">19:15</span>
                <span class="text-[#1a3a6b] font-medium text-sm">🎵 Music Show</span>
            </div>

            {{-- Μεγάλος Τελικός --}}
            <div class="px-4 py-3 bg-[#d4a017] border-t-2 border-[#d4a017]">
                <span class="text-white font-bold text-sm uppercase tracking-wider">🥇 Μεγάλος Τελικός</span>
            </div>

            <div class="px-4 py-3 hover:bg-yellow-50 transition">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-gray-400 font-medium">ΜΕΓΑΛΟΣ ΤΕΛΙΚΟΣ</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1 text-right">
                        <span class="font-medium text-gray-800 text-sm">Νικητής ΗΤ1</span>
                    </div>
                    <div class="flex flex-col items-center justify-center min-w-[90px] gap-1">
                        <span class="text-gray-400 text-xs">19:30</span>
                    </div>
                    <div class="flex-1 text-left">
                        <span class="font-medium text-gray-800 text-sm">Νικητής ΗΤ2</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection