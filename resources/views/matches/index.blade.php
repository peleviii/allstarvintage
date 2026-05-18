@extends('layouts.app')

@section('content')

@php
$groupA = $teamsByGroup['A'] ?? collect();
$groupB = $teamsByGroup['B'] ?? collect();
$groupC = $teamsByGroup['C'] ?? collect();
$groupD = $teamsByGroup['D'] ?? collect();

$A1 = $groupA[0]->name ?? 'Α1 Όμιλος Α';
$A2 = $groupA[1]->name ?? 'Α2 Όμιλος Α';
$A3 = $groupA[2]->name ?? 'Α3 Όμιλος Α';

$B1 = $groupB[0]->name ?? 'Α1 Όμιλος Β';
$B2 = $groupB[1]->name ?? 'Α2 Όμιλος Β';
$B3 = $groupB[2]->name ?? 'Α3 Όμιλος Β';

$C1 = $groupC[0]->name ?? 'Α1 Όμιλος Γ';
$C2 = $groupC[1]->name ?? 'Α2 Όμιλος Γ';
$C3 = $groupC[2]->name ?? 'Α3 Όμιλος Γ';

$D1 = $groupD[0]->name ?? 'Α1 Όμιλος Δ';
$D2 = $groupD[1]->name ?? 'Α2 Όμιλος Δ';
$D3 = $groupD[2]->name ?? 'Α3 Όμιλος Δ';
@endphp
<div class="max-w-3xl mx-auto px-4 py-8 pb-24">

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-6">Πρόγραμμα Αγώνων</h1>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
    @endif

    {{-- ===== ΠΑΡΑΣΚΕΥΗ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            🏐 Ημέρα 1 — Παρασκευή 5/6/2026 — Φάση Ομίλων
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            @php
            $day1 = [
            ['time'=>'18:00','home'=>$A1,'away'=>$A2,'label'=>'Όμιλος Α'],
            ['time'=>'19:15','home'=>$B1,'away'=>$B2,'label'=>'Όμιλος Β'],
            ['time'=>'20:30','home'=>$C1,'away'=>$C2,'label'=>'Όμιλος Γ'],
            ['time'=>'21:45','home'=>$D1,'away'=>$D2,'label'=>'Όμιλος Δ'],
            ];
            @endphp
            @foreach($day1 as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->first(fn($x)=>$x->match_time==$m['time'] && $x->day==1)])
            @endforeach
        </div>
    </div>

    {{-- ===== ΣΑΒΒΑΤΟ ΟΜΙΛΟΙ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            🏐 Ημέρα 2 — Σάββατο 6/6/2026 — Φάση Ομίλων (συνέχεια)
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            @php
            $day2groups = [
            ['time'=>'08:30','home'=>$A1,'away'=>$A3,'label'=>'Όμιλος Α'],
            ['time'=>'09:45','home'=>$B1,'away'=>$B3,'label'=>'Όμιλος Β'],
            ['time'=>'11:00','home'=>$C1,'away'=>$C3,'label'=>'Όμιλος Γ'],
            ['time'=>'12:15','home'=>$D1,'away'=>$D3,'label'=>'Όμιλος Δ'],
            ['time'=>'13:30','home'=>$A2,'away'=>$A3,'label'=>'Όμιλος Α'],
            ['time'=>'14:45','home'=>$B2,'away'=>$B3,'label'=>'Όμιλος Β'],
            ['time'=>'16:00','home'=>$C2,'away'=>$C3,'label'=>'Όμιλος Γ'],
            ['time'=>'17:15','home'=>$D2,'away'=>$D3,'label'=>'Όμιλος Δ'],
            ];
            @endphp
            @foreach($day2groups as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->first(fn($x)=>$x->match_time==$m['time'] && $x->day==2)])
            @endforeach
        </div>
    </div>

    {{-- ===== ΣΑΒΒΑΤΟ ΠΡΟΗΜΙΤΕΛΙΚΟΙ ===== --}}
    <div class="mb-6">
        <h2 class="text-sm font-bold text-white bg-[#1a3a6b] px-4 py-3 rounded-t-xl flex items-center gap-2">
            ⚡ Σάββατο 6/6/2026 — Προημιτελικοί
        </h2>
        <div class="bg-white border border-gray-200 border-t-0 rounded-b-xl overflow-hidden divide-y divide-gray-100">
            @php
            $quarters = [
            ['time'=>'18:30','home'=>'Αναμένεται','away'=>'Αναμένεται','label'=>'Προημιτελικός 1'],
            ['time'=>'19:45','home'=>'Αναμένεται','away'=>'Αναμένεται','label'=>'Προημιτελικός 2'],
            ['time'=>'21:00','home'=>'Αναμένεται','away'=>'Αναμένεται','label'=>'Προημιτελικός 3'],
            ['time'=>'22:15','home'=>'Αναμένεται','away'=>'Αναμένεται','label'=>'Προημιτελικός 4'],
            ];
            @endphp
            @foreach($quarters as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->first(fn($x)=>$x->match_time==$m['time'] && $x->day==2)])
            @endforeach
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
            @php
            $day3 = [
            ['time'=>'09:00','home'=>'3ος Ομίλου Α','away'=>'3ος Ομίλου Β','label'=>'Κατάταξη 7η-8η'],
            ['time'=>'10:15','home'=>'3ος Ομίλου Γ','away'=>'3ος Ομίλου Δ','label'=>'Κατάταξη 5η-6η'],
            ];
            @endphp
            @foreach($day3 as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->first(fn($x)=>$x->match_time==$m['time'] && $x->day==3)])
            @endforeach

            {{-- Ημιτελικοί --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ημιτελικοί</span>
            </div>
            @php
            $semis = [
            ['time'=>'11:30','home'=>'Νικητής ΠΗΤ1','away'=>'Νικητής ΠΗΤ2','label'=>'Ημιτελικός 1'],
            ['time'=>'12:45','home'=>'Νικητής ΠΗΤ3','away'=>'Νικητής ΠΗΤ4','label'=>'Ημιτελικός 2'],
            ];
            @endphp
            @foreach($semis as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->firstWhere(fn($x)=>$x->match_time==$m['time'] && $x->day==3)])
            @endforeach

            {{-- Αγώνες Αποκλεισμένων --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Αγώνες Αποκλεισμένων</span>
            </div>
            @php
            $losers = [
            ['time'=>'14:00','home'=>'Ηττημ. Ομίλου Α','away'=>'Ηττημ. Ομίλου Β','label'=>'Αποκλεισμένοι 1'],
            ['time'=>'15:15','home'=>'Ηττημ. Ομίλου Γ','away'=>'Ηττημ. Ομίλου Δ','label'=>'Αποκλεισμένοι 2'],
            ['time'=>'16:30','home'=>'Νικητής','away'=>'Νικητής','label'=>'Τελικός Αποκλεισμένων'],
            ];
            @endphp
            @foreach($losers as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->firstWhere(fn($x)=>$x->match_time==$m['time'] && $x->day==3)])
            @endforeach

            {{-- Μικρός Τελικός --}}
            <div class="px-4 py-2 bg-gray-50 border-t border-gray-200">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Μικρός Τελικός</span>
            </div>
            @php
            $third = [['time'=>'17:45','home'=>'Ηττημ. ΗΤ1','away'=>'Ηττημ. ΗΤ2','label'=>'Μικρός Τελικός (3η-4η)']];
            @endphp
            @foreach($third as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->firstWhere(fn($x)=>$x->match_time==$m['time'] && $x->day==3)])
            @endforeach

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
            @php
            $final = [['time'=>'19:30','home'=>'Νικητής ΗΤ1','away'=>'Νικητής ΗΤ2','label'=>'ΜΕΓΑΛΟΣ ΤΕΛΙΚΟΣ']];
            @endphp
            @foreach($final as $m)
            @include('matches._schedule_row', ['m'=>$m, 'match'=>$matches->firstWhere(fn($x)=>$x->match_time==$m['time'] && $x->day==3)])
            @endforeach

        </div>
    </div>

</div>
@endsection