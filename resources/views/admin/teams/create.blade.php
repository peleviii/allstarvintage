@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-medium text-[#1a3a6b]">Προσθήκη Ομάδας</h1>
        <a href="{{ route('admin.teams') }}" class="text-sm text-[#2563eb] hover:underline">← Πίσω</a>
    </div>

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
        @foreach($errors->all() as $error)
        <p>⚠️ {{ $error }}</p>
        @endforeach
    </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form action="{{ route('admin.teams.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Όνομα Ομάδας <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}"
                    placeholder="π.χ. Βόλεϊ Μαρκοπούλου"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Όμιλος</label>
                <select name="group" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">
                    <option value="">— Χωρίς όμιλο (αναμένει κλήρωση) —</option>
                    @foreach(['A' => 'Όμιλος Α', 'B' => 'Όμιλος Β', 'C' => 'Όμιλος Γ', 'D' => 'Όμιλος Δ'] as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-[#1a3a6b] text-white py-3 rounded-xl text-sm font-medium hover:bg-[#2563eb] transition">
                ➕ Προσθήκη Ομάδας
            </button>
        </form>
    </div>

</div>
@endsection