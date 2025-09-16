<!-- News & Articles -->
@if ($articles->count() > 0)

    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="h1 gradient-text">
                    @if (Request::is('/'))
                        Artikel
                    @else
                        Artikel Terkait
                    @endif
                </h2>

                <h5 class="text-light opacity-75 mt-2">
                    Berita, kegiatan, dan artikel inspiratif dari Universitas Terbuka SALUT.
                </h5>
            </div>

            <!-- Swiper Container -->
            <div class="swiper myArticlesSwiper" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <div class="article-card h-100 d-flex flex-column">
                                <a href="{{ route('article.detail', $article->slug) }}" class="text-decoration-none text-light">
                                    {{-- <div class="card h-100 shadow-sm"> --}}
                                    <!-- Thumbnail -->
                                    <div class="card-img-wrapper">
                                        <img src="{{ asset('storage/' . $article->image) }}"
                                            class="img-fluid card-img-top" alt="{{ $article->title }}">
                                    </div>

                                    <!-- Content -->
                                    <div class="card-content flex-grow-1 d-flex flex-column p-3">
                                        <h5 class="fw-bold mb-2">{{ $article->title }}</h5>
                                        <p class="small mb-2 text-light">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $article->created_at->format('d F Y') }}
                                        </p>
                                        <p class="flex-grow-1">{{ Str::limit(strip_tags($article->body), 100, '...') }}
                                        </p>
                                        <a href="{{ route('article.detail', $article->slug) }}"
                                            class="text-decoration-none neon-text mt-auto fw-semibold">
                                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination mt-3"></div>
                {{-- <div class="swiper-button-next"></div> --}}
                {{-- <div class="swiper-button-prev"></div> --}}
            </div>
        </div>
    </section>



    @push('scripts')
        <script>
            const swiper = new Swiper(".myArticlesSwiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000, // 3 detik
                    disableOnInteraction: false,
                },
                speed: 800, // animasi smooth
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2, // tablet
                    },
                    1024: {
                        slidesPerView: 3, // desktop
                    }
                }
            });
        </script>
    @endpush
@endif
