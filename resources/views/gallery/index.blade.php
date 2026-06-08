@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8 pb-24">
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 text-sm text-blue-800">
        <p class="font-medium mb-1">📌 Σημαντική ενημέρωση για τη χρήση των φωτογραφιών</p>
        <ul class="space-y-1 text-blue-700">
            <li>• Απαγορεύεται η δημοσίευση φωτογραφιών που απεικονίζουν <strong>ανήλικα άτομα</strong> σε social media. Ζητήστε άδεια από τον γονέα ή κηδεμόνα.</li>
            <li>• Εάν δημοσιεύσετε φωτογραφίες, παρακαλούμε να <strong>κάνετε tag</strong>:</li>
            <li class="pl-4">📸 Instagram: <strong>@all_star_vintage2026</strong></li>
            <li class="pl-4">📸 Instagram: <strong>@dimosmarkopoulou</strong></li>
            <li class="pl-4">👍 Facebook: <strong>All Star Vintage</strong></li>
            <li class="pl-4">👍 Facebook: <strong>Δήμος Μαρκοπούλου Μεσογαίας</strong></li>
            <li class="pl-4"> Οι φωτογραφίες σας μπορεί να εμφανιστούν στις επίσημες σελίδες μας!</li>
            <li class="pl-4"> Οι φωγραφιες θα παραμεινουν διαθέσιμες για λήψη για <strong>2 μήνες</strong> μετά το τέλος του τουρνουά.</li>
            <li class="pl-4">Ενδέχεται ορισμένες φωτογραφίες να έχουν τοποθετηθεί σε λάθος ομάδα. Ζητούμε την κατανόησή σας και συγγνώμη για τυχόν λάθη.</li>
        </ul>

        </ul>
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