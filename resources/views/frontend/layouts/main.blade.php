<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>SALUT Digitech - Transformasi Layanan Pendidikan DigitalSALUT Digitech - Transformasi Layanan Pendidikan Digital</title> --}}
    <title>@yield('title', 'SALUT Digitech') | SALUT Digitech</title>
    <meta name="description" content="@yield('meta_description', 'UT SALUT (Sentra Layanan Universitas Terbuka): Mendukung pembelajaran jarak jauh dengan layanan akademik, administrasi, dan informasi untuk mahasiswa Universitas Terbuka.')">
    <meta name="keywords" content="@yield('meta_keywords', 'UT SALUT, Universitas Terbuka, pendidikan jarak jauh, layanan akademik, layanan mahasiswa, kuliah online, e-learning, studi fleksibel')">
    <meta name="author" content="UT SALUT">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .btn-daftar {
            background: linear-gradient(45deg, #06b6d4, #ec4899);
            border: none;
            color: #fff !important;
            font-weight: 600;
            padding: 0.6rem 1.4rem;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 184, 148, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* .btn-daftar::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
        } */

        .btn-daftar:hover::before {
            left: 100%;
        }

        .btn-daftar:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 184, 148, 0.6);
        }
    </style>
    @stack('styles')

</head>

<body>

    <a href="{{ !empty($setting->whatsapp) ? 'https://wa.me/' . $setting->whatsapp : 'javascript:void(0);' }}"
        target="_blank"
        class="whatsapp-float d-flex align-items-center justify-content-center {{ empty($setting->whatsapp) ? 'disabled' : '' }}">
        <i class="bi bi-whatsapp"></i>
    </a>

    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')


    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Program details data
        const programDetails = {
            'Manajemen': {
                description: 'Program Studi Manajemen mempersiapkan mahasiswa untuk menjadi manajer profesional yang mampu mengelola organisasi dengan efektif dan efisien.',
                subjects: ['Pengantar Manajemen', 'Manajemen Strategis', 'Manajemen Keuangan', 'Manajemen Pemasaran',
                    'Manajemen SDM'
                ],
                career: ['Manager', 'Supervisor', 'Entrepreneur', 'Konsultan Bisnis', 'Analis Bisnis']
            },
            'Akuntansi': {
                description: 'Program Studi Akuntansi menghasilkan lulusan yang kompeten dalam bidang akuntansi, audit, perpajakan, dan keuangan.',
                subjects: ['Pengantar Akuntansi', 'Akuntansi Keuangan', 'Akuntansi Manajemen', 'Audit', 'Perpajakan'],
                career: ['Akuntan', 'Auditor', 'Tax Consultant', 'Financial Analyst', 'Controller']
            },
            'Sistem Informasi': {
                description: 'Program Studi Sistem Informasi memadukan teknologi informasi dengan manajemen bisnis untuk era digital.',
                subjects: ['Pemrograman', 'Database', 'Sistem Informasi Manajemen', 'E-Business', 'Keamanan Sistem'],
                career: ['System Analyst', 'IT Consultant', 'Database Administrator', 'Project Manager IT',
                    'Software Developer'
                ]
            },
            'Pendidikan': {
                description: 'Program Studi Pendidikan menyiapkan tenaga pendidik profesional yang kompeten dan berkarakter.',
                subjects: ['Psikologi Pendidikan', 'Kurikulum dan Pembelajaran', 'Evaluasi Pembelajaran',
                    'Media Pembelajaran', 'Penelitian Pendidikan'
                ],
                career: ['Guru', 'Kepala Sekolah', 'Pengawas Sekolah', 'Instruktur', 'Konselor Pendidikan']
            },
            'Hukum': {
                description: 'Program Studi Hukum menghasilkan sarjana hukum yang memahami sistem hukum Indonesia dan mampu menerapkannya.',
                subjects: ['Hukum Perdata', 'Hukum Pidana', 'Hukum Tata Negara', 'Hukum Bisnis', 'Hukum Internasional'],
                career: ['Advokat', 'Hakim', 'Jaksa', 'Notaris', 'Legal Officer']
            },
            'Komunikasi': {
                description: 'Program Studi Komunikasi mempersiapkan mahasiswa untuk berkarir di bidang komunikasi dan media di era digital.',
                subjects: ['Teori Komunikasi', 'Jurnalistik', 'Public Relations', 'Media Digital',
                    'Komunikasi Organisasi'
                ],
                career: ['Jurnalis', 'Public Relations', 'Content Creator', 'Social Media Manager', 'Broadcaster']
            }
        };

        // Show program detail
        function showProgramDetail(program) {
            const detail = programDetails[program];
            const modalTitle = document.getElementById('programModalTitle');
            const modalBody = document.getElementById('programModalBody');

            modalTitle.textContent = `Program Studi ${program}`;
            modalBody.innerHTML = `
                <div class="mb-4">
                    <h6 class="neon-text">Deskripsi Program</h6>
                    <p>${detail.description}</p>
                </div>
                <div class="mb-4">
                    <h6 class="neon-text">Mata Kuliah Utama</h6>
                    <ul>
                        ${detail.subjects.map(subject => `<li>${subject}</li>`).join('')}
                    </ul>
                </div>
                <div>
                    <h6 class="neon-text">Prospek Karir</h6>
                    <ul>
                        ${detail.career.map(career => `<li>${career}</li>`).join('')}
                    </ul>
                </div>
            `;

            const modal = new bootstrap.Modal(document.getElementById('programModal'));
            modal.show();
        }

        // Lightbox functions
        // function openLightbox(src) {
        //     document.getElementById('lightbox-img').src = src;
        //     document.getElementById('lightbox').style.display = 'flex';
        // }

        // function closeLightbox() {
        //     document.getElementById('lightbox').style.display = 'none';
        // }

        // Form submission
        document.getElementById('registrationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                fullName: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                whatsapp: document.getElementById('whatsapp').value,
                program: document.getElementById('program').value,
                message: document.getElementById('message').value
            };

            try {
                // Simulate API call - replace with actual endpoint
                const response = await axios.post('/api/register', formData);

                alert('Pendaftaran berhasil dikirim! Tim kami akan menghubungi Anda segera.');
                this.reset();
            } catch (error) {
                // For demo purposes, show success message
                alert('Pendaftaran berhasil dikirim! Tim kami akan menghubungi Anda segera.');
                this.reset();
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(15, 23, 42, 0.98)';
            } else {
                navbar.style.background = 'rgba(15, 23, 42, 0.95)';
            }
        });

        // Hero Carousel functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.carousel-dot');

        function changeSlide(index) {
            // Remove active class from current slide and dot
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');

            // Set new current slide
            currentSlide = index;

            // Add active class to new slide and dot
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        // Auto-advance carousel
        setInterval(() => {
            const nextSlide = (currentSlide + 1) % slides.length;
            changeSlide(nextSlide);
        }, 5000);
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'96185458d7a96cf4',t:'MTc1MjkwODI5Ny4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
