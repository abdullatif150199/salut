@push('styles')
    <style>
        /* Background utama */
        #testimoni {
            background: transparent;
            color: #ffffff;
        }

        /* Card testimoni */
        .testimonial-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        /* Rounded image */
        .testimonial-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #00b894;
            margin-bottom: 1rem;
        }

        /* Stars */
        .star-full {
            color: #f5b50a;
            margin: 0 2px;
        }

        .star-empty {
            color: #cfcfcf;
            margin: 0 2px;
        }

        /* Nama */
        .testimonial-name {
            font-weight: 600;
            /* color: #00b894; */
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        /* Review */
        .testimonial-content {
            font-style: italic;
            color: #ffffff;
            font-size: 0.95rem;
        }

        /* Swiper pagination bullets */
        .swiper-pagination-bullet {
            background: var(--neon-cyan);
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }
    </style>
@endpush

<section id="testimoni" class="py-16">
    <div class="container" data-aos="fade-up" data-aos-duration="1500">
        <div class="text-center mb-12">
            <h2 class="h1 gradient-text mb-4">Testimoni</h2>
            <p class="text-light mx-auto lead" style="max-width: 700px;">Pengalaman pengguna yang telah merasakan kemudahan dan layanan terbaik melalui aplikasi Salut</p>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiperTestimoni">
            <div class="swiper-wrapper">

                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <img src="{{ asset('storage/' . $testimonial->img) }}" alt="{{ $testimonial->user }}"
                                class="testimonial-img">

                            <div class="mb-2">
                                @for ($i = 1; $i <= $testimonial->rating; $i++)
                                    <i class="fa-solid fa-star star-full"></i>
                                @endfor
                                @for ($i = $testimonial->rating + 1; $i <= 5; $i++)
                                    <i class="fa-regular fa-star star-empty"></i>
                                @endfor
                            </div>

                            <div class="testimonial-name neon-text">
                                {{ $testimonial->user }}
                            </div>

                            <p class="testimonial-content">
                                "{{ $testimonial->content }}"
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Pagination -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        var swiperTestimoni = new Swiper(".mySwiperTestimoni", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
@endpush
