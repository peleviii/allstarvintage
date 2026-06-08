@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8 pb-24">

    <!-- Info box -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8 space-y-4">

        <div class="border-l-4 border-[#1a3a6b] pl-4">
            <p class="font-medium text-[#1a3a6b] text-sm mb-2">📌 Σημαντική ενημέρωση</p>
            <ul class="text-sm text-gray-700 space-y-1">
                <li>• Απαγορεύεται η δημοσίευση φωτογραφιών που απεικονίζουν <strong>ανήλικα άτομα</strong> χωρίς άδεια γονέα ή κηδεμόνα.</li>
                <li>• Ενδέχεται ορισμένες φωτογραφίες να έχουν τοποθετηθεί σε λάθος κατηγορία. Ζητούμε την κατανόησή σας.</li>
                <li>• Οι φωτογραφίες θα παραμείνουν διαθέσιμες για <strong>2 μήνες</strong> μετά το τέλος του τουρνουά.</li>
            </ul>
        </div>

        <div class="border-l-4 border-[#6dcaf3] pl-4">
            <p class="font-medium text-[#1a3a6b] text-sm mb-2">📲 Tag μας αν δημοσιεύσεις!</p>
            <ul class="text-sm text-gray-700 space-y-1">
                <li>📸 Instagram: <strong>@all_star_vintage2026</strong> · <strong>@dimosmarkopoulou</strong></li>
                <li>👍 Facebook: <strong>All Star Vintage</strong> · <strong>Δήμος Μαρκοπούλου Μεσογαίας</strong></li>
                <li class="text-gray-500 text-xs">Οι φωτογραφίες σας μπορεί να εμφανιστούν στις επίσημες σελίδες μας!</li>
            </ul>
        </div>

        <div class="border-l-4 border-gray-200 pl-4">
            <p class="font-medium text-[#1a3a6b] text-sm mb-2">💡 Οδηγίες χρήσης</p>
            <ul class="text-sm text-gray-600 space-y-1">
                <li>• Πάτα μια φωτογραφία για μεγέθυνση · Χρησιμοποίησε βελάκια ή Swipe για πλοήγηση</li>
                <li>• Πάτα έξω από τη φωτογραφία για να βγεις</li>
                <li>• Σε ευχαριστούμε για τη συμμετοχή σου! 🏐</li>
            </ul>
        </div>

    </div>

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-6">📸 Φωτογραφίες</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($folders as $folder)
        <a href="{{ route('gallery.show', urlencode($folder)) }}"
            class="bg-white rounded-xl border border-gray-200 p-4 hover:border-[#1a3a6b] hover:shadow-sm transition text-center">
            <div class="text-4xl mb-2">📁</div>
            <div class="font-medium text-gray-800 text-sm">{{ $folder }}</div>
        </a>
        @endforeach
    </div>
</div>
@endsection