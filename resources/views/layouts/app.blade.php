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
    <meta property="og:title" content="All Star Vintage">
    <meta property="og:description" content="Το καλύτερο τουρνουά vintage volley στο Μαρκόπουλο. 5-7 Ιουνίου 2026!">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="el_GR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="All Star Vintage">
    <meta name="twitter:description" content="Το καλύτερο τουρνουά vintage volley στο Μαρκόπουλο. 5-7 Ιουνίου 2026!">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <style>
        .sponsor-slide {
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
            pointer-events: none;
        }

        .sponsor-slide.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans flex flex-col min-h-screen pb-20">

    <!-- HEADER -->
    <header class="bg-[#6dcaf3] sticky top-0 z-50 shadow-md">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <div>
                    <div class="text-white font-medium text-sm">All Star Vintage</div>
                    <div class="text-[#11095b] text-xs">5-7 Ιουνίου 2026</div>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a href="/" class="text-white hover:text-[#1f3464] transition">Αρχική</a>
                <a href="/kanones" class="text-white hover:text-[#1f3464] transition">Κανόνες</a>
                <a href="/programa" class="text-white hover:text-[#1f3464] transition">Πρόγραμμα</a>
                <a href="/omades" class="text-white hover:text-[#1f3464] transition">Ομάδες</a>
                <a href="/vathmologia" class="text-white hover:text-[#1f3464] transition">Βαθμολογία</a>
                <a href="/epikoinonia" class="text-white hover:text-[#1f3464] transition">Επικοινωνία</a>
            </nav>
            <button id="menu-btn" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
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
    <div class="bg-[#6dcaf3] text-center py-4 h-40">
        <p class="text-sm text-white">© 2026 All Star Vintage Tournament. All rights reserved.</p>
    </div>

    <!-- SPONSORS TICKER -->
    <div class="fixed bottom-0 left-0 right-0 z-[9999] bg-white border-t-2 border-[#6dcaf3] flex items-center justify-center h-20">
        <div class="relative flex items-center justify-center w-64 h-16">
            <a href="https://xarisezoi.gr" target="_blank" class="sponsor-slide absolute">
                <img src="{{ asset('images/xarise_zoi.jpg') }}" alt="Χάρισε Ζωή" class="h-16 object-contain">
            </a>
            <a href="https://www.skroutz.gr/shop/5327/MyBuzz/products.html" target="_blank" class="sponsor-slide absolute">
                <img src="{{ asset('images/1.png') }}" alt="BUZZ" class="h-16 object-contain">
            </a>
            <a href="https://pelecode.gr" target="_blank" class="sponsor-slide absolute">
                <img src="{{ asset('images/pelecode.png') }}" alt="Pelecode" class="h-16 object-contain">
            </a>
            <p class="sponsor-slide absolute text-sm text-center px-4">Συνδιοργάνωση: Περιφέρεια Αττικής & Δήμος Μαρκοπούλου Μεσογαίας</p>
            <a href="https://www.patt.gov.gr/" target="_blank" class="sponsor-slide absolute">
                <img src="{{ asset('images/periferia.png') }}" alt="Περιφέρεια" class="h-16 object-contain">
            </a>
            <a href="https://www.markopoulo.gr/" target="_blank" class="sponsor-slide absolute">
                <img src="{{ asset('images/dimos.png') }}" alt="Δήμος" class="h-16 object-contain">
            </a>
        </div>
    </div>


    <script>
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        const slides = document.querySelectorAll('.sponsor-slide');
        let current = 0;
        slides[0].classList.add('active');

        setInterval(() => {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 2500);
    </script>
</body>

</html>