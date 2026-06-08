@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8 pb-24">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('gallery.index') }}" class="text-[#1a3a6b] hover:underline text-sm">← Πίσω</a>
        <h1 class="text-2xl font-medium text-[#1a3a6b]">{{ $folder }}</h1>
    </div>

    <div class="grid grid-cols-2 gap-3">
        @foreach($images as $image)
        <div>
            @if(preg_match('/\.(mp4|mov|avi)$/i', $image))
            <video src="{{ $baseUrl . $image }}"
                class="w-full rounded-lg cursor-pointer hover:opacity-90 transition"
                controls
                preload="metadata">
            </video>
            @else
            <img src="{{ $baseUrl . $image }}"
                alt="{{ $folder }}"
                class="w-full object-cover rounded-lg cursor-pointer hover:opacity-90 transition"
                onclick="openLightbox('{{ $baseUrl . $image }}')">
            @endif
        </div>
        @endforeach
    </div>
</div>

<!-- Lightbox -->
<div id="lightbox" onclick="handleLightboxClick(event)" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.92); z-index:9999; flex-direction:column;">

    <!-- Image -->
    <div style="flex:1; display:flex; align-items:center; justify-content:center; padding:16px;">
        <img id="lightbox-img" src="" onclick="event.stopPropagation()" style="max-height:calc(100vh - 100px); max-width:100%; object-fit:contain; border-radius:8px;">
    </div>

    <!-- Bottom bar -->
    <div onclick="event.stopPropagation()" style="display:flex; align-items:center; justify-content:center; gap:16px; padding:12px 16px; flex-shrink:0;">
        <a id="lightbox-download" href="" download style="display:flex; align-items:center; gap:8px; color:white; background:rgba(255,255,255,0.15); padding:10px 20px; border-radius:8px; text-decoration:none; font-size:14px;">
            ⬇ Λήψη
        </a>
        <button onclick="closeLightbox()" style="display:flex; align-items:center; gap:8px; color:white; background:rgba(255,255,255,0.15); border:none; padding:10px 20px; border-radius:8px; cursor:pointer; font-size:14px;">
            ✕ Κλείσιμο
        </button>
    </div>
</div>

<script>
    let images = @json(array_values($images));
    let baseUrl = '{{ $baseUrl }}';
    let currentIndex = 0;
    let touchStartX = 0;
    let touchStartY = 0;

    function openLightbox(src) {
        currentIndex = images.findIndex(img => baseUrl + img === src);
        updateLightbox();
        document.getElementById('lightbox').style.display = 'flex';
    }

    function updateLightbox() {
        let src = baseUrl + images[currentIndex];
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox-download').href = src;
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightbox();
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightbox();
    }

    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
        document.getElementById('lightbox-img').src = '';
    }

    function handleLightboxClick(e) {
        closeLightbox();
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') prevImage();
        if (e.key === 'ArrowRight') nextImage();
    });

    document.getElementById('lightbox').addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
    }, {
        passive: true
    });

    document.getElementById('lightbox').addEventListener('touchend', (e) => {
        let diffX = touchStartX - e.changedTouches[0].clientX;
        let diffY = touchStartY - e.changedTouches[0].clientY;
        if (Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX > 50) nextImage();
            if (diffX < -50) prevImage();
        } else {
            if (Math.abs(diffY) > 60) closeLightbox();
        }
    }, {
        passive: true
    });
</script>
@endsection