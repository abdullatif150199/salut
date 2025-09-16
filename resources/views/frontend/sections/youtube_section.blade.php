@php
    // Helper aman: dukung URL watch?v=, youtu.be/, /shorts/, /embed/, dan <iframe ...>
    if (!function_exists('getYoutubeIdFromInput')) {
        function getYoutubeIdFromInput($input)
        {
            $url = trim($input);

            // Jika input adalah iframe, ambil src-nya
            if (preg_match('/<iframe[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $url, $m)) {
                $url = $m[1];
            }

            // Normalisasi entity (&amp; dll)
            $url = html_entity_decode($url);

            // 1) youtu.be/ID
            if (preg_match('~youtu\.be/([A-Za-z0-9_-]{6,})~', $url, $m)) {
                return $m[1];
            }

            // 2) youtube.com/shorts/ID atau /embed/ID
            if (preg_match('~youtube\.com/(?:shorts|embed)/([A-Za-z0-9_-]{6,})~', $url, $m)) {
                return $m[1];
            }

            // 3) watch?v=ID (atau query param v)
            $parts = parse_url($url);
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $qs);
                if (!empty($qs['v'])) {
                    return $qs['v'];
                }
            }

            return null;
        }
    }
@endphp


@php
    use Illuminate\Support\Str;
@endphp


    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="h1 gradient-text">YouTube Videos</h2>
                <h5 class="text-light opacity-75 mt-2">
                    Kumpulan video kegiatan, seminar, wisuda, dan informasi terbaru dari Universitas Terbuka SALUT.
                </h5>
            </div>

            <!-- Swiper -->
            <div class="swiper myVideosSwiper" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($videos as $video)
                        @php $videoId = getYoutubeIdFromInput($video->url); @endphp
                        <div class="swiper-slide">
                            <div class="article-card h-100 d-flex flex-column">
                                <a href="{{ $videoId ? 'https://www.youtube.com/watch?v=' . $videoId : $video->url }}"
                                    class="text-decoration-none text-light" target="_blank" rel="noopener">
                                    <!-- Thumbnail -->
                                    <div class="card-img-wrapper ratio ratio-16x9 mb-3">
                                        @if ($videoId)
                                            <iframe class="w-100 h-100"
                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                title="{{ $video->title }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        @else
                                            <div
                                                class="d-flex align-items-center justify-content-center bg-light text-danger">
                                                <p class="p-3 small">URL YouTube tidak valid</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Konten -->
                                    <div class="card-content flex-grow-1 d-flex flex-column p-3">
                                        <h5 class="fw-bold mb-2">{{ $video->title }}</h5>
                                        <p class="flex-grow-1">
                                            {{ Str::limit(strip_tags($video->description), 100, '...') }}</p>
                                        <span class="text-decoration-none neon-text mt-auto fw-semibold">
                                            Tonton di YouTube <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-3"></div>
            </div>
        </div>
    </section>



    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const swiper = new Swiper(".myVideosSwiper", {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    speed: 800,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    observer: true,
                    observeParents: true,
                    breakpoints: {
                        768: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 3
                        },
                    }
                });
            });
        </script>
    @endpush

