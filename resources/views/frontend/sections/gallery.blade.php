@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
    <style>
        /* Thumbnail gallery */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.06);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            pointer-events: none;
        }

        .overlay-title {
            pointer-events: none;
            background: rgba(6, 182, 212, 0.92);
            color: #fff;
            padding: 8px 14px;
            border-radius: 999px;
            font-weight: 600;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            z-index: 2;
            font-size: 0.95rem;
        }

        .overlay-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.45);
            padding: 8px;
            border-radius: 8px;
            color: #fff;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.18s ease, transform 0.18s ease;
            z-index: 3;
            pointer-events: auto;
        }

        .gallery-item:hover .overlay-icon {
            opacity: 1;
            transform: translateY(0);
        }

        /* Simple Popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            justify-content: center;
            align-items: center;
            z-index: 9999;
            flex-direction: column;
        }

        .popup.show {
            display: flex;
        }

        .popup img {
            max-width: 90%;
            max-height: 80vh;
            margin: 0 auto;
            border-radius: 8px;
        }

        .popup-title {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 10px;
            text-align: center;
        }

        .popup-description {
            color: #fff;
            max-width: 900px;
            text-align: center;
            margin-top: 10px;
            background: rgba(0, 0, 0, 0.35);
            padding: 10px 14px;
            border-radius: 8px;
        }

        .popup-close,
        .popup-prev,
        .popup-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            user-select: none;
            background: rgba(0, 0, 0, 0.35);
            padding: 10px;
            border-radius: 50%;
        }

        .popup-close {
            top: 10px;
            right: 10px;
            transform: none;
            font-size: 2rem;
        }

        .popup-prev {
            left: 20px;
        }

        .popup-next {
            right: 20px;
        }

        @media (max-width: 768px) {
            .gallery-item img {
                height: 250px;
            }

            .popup img {
                max-height: 70vh;
            }
        }
    </style>
@endpush

<section id="gallery" class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 gradient-text">Galeri Kegiatan</h2>
            <p class="lead">Dokumentasi berbagai kegiatan, acara, seminar, dan momen penting</p>

        </div>

        <div class="swiper galelriesSwiper">
            <div class="swiper-wrapper">
                @foreach ($galleries as $gallery)
                    <div class="swiper-slide">
                        <div class="gallery-item" onclick="openPopup({{ $gallery->id }})">
                            <img src="{{ asset('storage/' . $gallery->img_thumb) }}"
                                alt="{{ $gallery->title ?? 'Gallery Image' }}">
                            <div class="gallery-overlay">
                                <div class="overlay-title">{{ $gallery->title ?? 'Gallery Image' }}</div>
                                <div class="overlay-icon"><i class="fas fa-search-plus fa-lg"></i></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Popup JS only -->
@foreach ($galleries as $gallery)
    <div id="popup-{{ $gallery->id }}" class="popup">
        <span class="popup-close" onclick="closePopup({{ $gallery->id }})">&times;</span>
        <span class="popup-prev" onclick="prevImage({{ $gallery->id }})">&#10094;</span>
        <span class="popup-next" onclick="nextImage({{ $gallery->id }})">&#10095;</span>
        <div class="popup-title">{{ $gallery->title }}</div>
        <img id="popup-img-{{ $gallery->id }}" src="{{ asset('storage/' . $gallery->images[0]->path) }}">
        @if ($gallery->description)
            <div class="popup-description">{!! $gallery->description !!}</div>
        @endif
    </div>
@endforeach

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    <script>
        // Swiper untuk gallery utama saja
        const galleriesSwiper = new Swiper(".galelriesSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            speed: 800,
            loop: true,
            pagination: {
                el: ".galelriesSwiper .swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".galelriesSwiper .swiper-button-next",
                prevEl: ".galelriesSwiper .swiper-button-prev"
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });

        // Popup tanpa swiper
        const galleryImages = {
            @foreach ($galleries as $gallery)
                {{ $gallery->id }}: [
                    @foreach ($gallery->images as $img)
                        "{{ asset('storage/' . $img->path) }}",
                    @endforeach
                ],
            @endforeach
        };

        const currentIndex = {};

        function openPopup(id) {
            currentIndex[id] = 0;
            const popup = document.getElementById('popup-' + id);
            const img = document.getElementById('popup-img-' + id);
            img.src = galleryImages[id][currentIndex[id]];
            popup.classList.add('show');
        }

        function closePopup(id) {
            document.getElementById('popup-' + id).classList.remove('show');
        }

        function prevImage(id) {
            currentIndex[id] = (currentIndex[id] - 1 + galleryImages[id].length) % galleryImages[id].length;
            document.getElementById('popup-img-' + id).src = galleryImages[id][currentIndex[id]];
        }

        function nextImage(id) {
            currentIndex[id] = (currentIndex[id] + 1) % galleryImages[id].length;
            document.getElementById('popup-img-' + id).src = galleryImages[id][currentIndex[id]];
        }

        document.addEventListener('keydown', function(e) {
            Object.keys(galleryImages).forEach(id => {
                const popup = document.getElementById('popup-' + id);
                if (!popup.classList.contains('show')) return;
                if (e.key === 'ArrowLeft') prevImage(id);
                if (e.key === 'ArrowRight') nextImage(id);
                if (e.key === 'Escape') closePopup(id);
            });
        });
    </script>
@endpush
