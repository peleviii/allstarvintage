@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="/" class="inline-flex items-center gap-2 bg-[#1f3464] hover:bg-[#1a3a6b] text-white px-4 py-2 rounded-lg transition font-medium text-sm">
            ← Πίσω στην Αρχική
        </a>
    </div>

    <h1 class="text-2xl font-medium text-[#1a3a6b] mb-2">Επικοινωνία & Δήλωση Συμμετοχής</h1>
    <p class="text-sm text-gray-500 mb-8">Συμπλήρωσε τη φόρμα και θα επικοινωνήσουμε μαζί σου σύντομα.</p>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-xl mb-6 text-sm flex items-start gap-3">
        <span class="text-xl">🎉</span>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
        @foreach($errors->all() as $error)
        <p>⚠️ {{ $error }}</p>
        @endforeach
    </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Όνομα Ομάδας <span class="text-red-500">*</span>
                </label>
                <input type="text" name="team_name" value="{{ old('team_name') }}"
                    placeholder="π.χ. Βόλεϊ Μαρκοπούλου"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb] @error('team_name') border-red-300 @enderror">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Υπεύθυνος Ομάδας <span class="text-red-500">*</span>
                </label>
                <input type="text" name="responsible" value="{{ old('responsible') }}"
                    placeholder="Ονοματεπώνυμο υπευθύνου"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb] @error('responsible') border-red-300 @enderror">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="email@example.com"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb] @error('email') border-red-300 @enderror">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Τηλέφωνο <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" name="phone" value="{{ old('phone') }}"
                        placeholder="69XXXXXXXX"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb] @error('phone') border-red-300 @enderror">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Μήνυμα</label>
                <textarea name="message" rows="4"
                    placeholder="Οποιαδήποτε επιπλέον πληροφορία ή ερώτηση..."
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#2563eb]">{{ old('message') }}</textarea>
            </div>

            <p class="text-xs text-gray-400"><span class="text-red-500">*</span> Υποχρεωτικά πεδία</p>

            <button type="submit"
                class="w-full bg-[#1a3a6b] text-white py-3 rounded-xl text-sm font-medium hover:bg-[#2563eb] transition">
                🏐 Αποστολή Δήλωσης
            </button>
        </form>
    </div>

    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4 text-sm text-blue-800">
        <p class="font-medium mb-1">📞 Επικοινωνία</p>
        <p>Email: <a href="mailto:info@allstarvintage.gr" class="underline">info@allstarvintage.gr</a></p>
        <p>Τηλέφωνο: <a href="tel:+306989489777" class="underline">698 948 9777</a></p>
    </div>

</div>
@endsection