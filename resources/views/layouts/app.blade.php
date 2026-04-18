<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>All Star Vintage Tournament</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Open Graph -->

    <meta property="og:title" content="All Star Vintage Tournament">

    <meta property="og:description" content="Το καλύτερο τουρνουά vintage volleyball στο Μαρκόπουλο. 5-7 Ιουνίου 2026!">

    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:type" content="website">

    <meta property="og:locale" content="el_GR">

    <!-- Twitter Card -->

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="All Star Vintage Tournament">

    <meta name="twitter:description" content="Το καλύτερο τουρνουά vintage volleyball στο Μαρκόπουλο. 5-7 Ιουνίου 2026!">

    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
</head>

<body class="bg-gray-50 font-sans flex flex-col min-h-screen">

    <!-- HEADER -->
    <header class="bg-[#6dcaf3] sticky top-0 z-50 shadow-md">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <div>
                    <div class="text-white font-medium text-sm">All Star Vintage</div>
                    <div class="text-[#11095b] text-xs">5-7 Ιουνίου 2026</div>
                </div>
            </a>

            <!-- Desktop nav -->
            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a href="/" class="text-white hover:text-[#1f3464] transition">Αρχική</a>
                <a href="/kanones" class="text-white hover:text-[#1f3464] transition">Κανόνες</a>
                <a href="/programa" class="text-white hover:text-[#1f3464] transition">Πρόγραμμα</a>
                <a href="/omades" class="text-white hover:text-[#1f3464] transition">Ομάδες</a>
                <a href="/vathmologia" class="text-white hover:text-[#1f3464] transition">Βαθμολογία</a>
                <a href="/epikoinonia" class="text-white hover:text-[#1f3464] transition">Επικοινωνία</a>

            </nav>

            <!-- Mobile hamburger -->
            <button id="menu-btn" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#122d57] border-t border-[#d4a017]">
            <a href="/" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Αρχική</a>
            <a href="/kanones" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Κανόνες</a>
            <a href="/programa" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Πρόγραμμα</a>
            <a href="/omades" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Ομάδες</a>
            <a href="/vathmologia" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Βαθμολογία</a>
            <a href="/epikoinonia" class="block px-4 py-3 text-gray-300 hover:text-[#d4a017] text-sm border-b border-white/10">Επικοινωνία</a>

        </div>
    </header>

    <!-- CONTENT -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#6dcaf3] w-full sticky bottom-0">
        <div class="max-full mx-auto px-4 py-3 md:py-8">
            <div class="flex flex-col md:flex-row items-center justify-center gap-3 md:gap-4">
                <!-- Left Logo -->
                <div class="flex-1 flex justify-center">
                    <a href="https://www.patt.gov.gr/">
                        <img src="{{ asset('images/periferia.png') }}" alt="Περιφέρεια Αττικής" class="h-12 md:h-20 object-contain hover:opacity-80 transition">
                    </a>
                </div>

                <!-- Center Text -->
                <div class="flex-1 flex justify-center">
                    <p class="text-center text-xs md:text-sm text-gray-800 font-medium">
                        Συνδιοργάνωση: Περιφέρεια Αττικής & Δήμος Μαρκοπούλου Μεσογαίας
                    </p>
                </div>

                <!-- Right Logo -->
                <div class="flex-1 flex justify-center">
                    <a href="https://www.markopoulo.gr/">
                        <img src="{{ asset('images/dimos.png') }}" alt="Μαρκόπουλο" class="h-12 md:h-20 object-contain hover:opacity-80 transition">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>