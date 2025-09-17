
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
     style="background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px);">
     <div class="container">
         <a class="navbar-brand fw-bold gradient-text d-flex align-items-center" href="#">
             <i class="fas fa-graduation-cap me-2"></i>
             <div>
                 <div style="font-size: 1.6rem;">SALUT Digitech</div>
                 <small style="font-size: 0.8rem;">Universitas Terbuka Partner</small>
             </div>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                 <li class="nav-item"><a class="nav-link" href="#about">Tentang UT</a></li>
                 <li class="nav-item"><a class="nav-link" href="#programs">Program Studi</a></li>
                 <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                 <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
             </ul>
             <div>
                 <a href="{{ !empty($setting->register_url) ? $setting->register_url : 'javascript:void(0);' }}" class="btn-daftar text-decoration-none">Daftar Sekarang</a>
             </div>
             {{-- <div class="d-flex align-items-center ms-3">
                    <span class="badge bg-primary me-2">
                        <i class="fas fa-award me-1"></i>Akreditasi A
                    </span>
                    <span class="badge bg-success">
                        <i class="fas fa-users me-1"></i>40+ Tahun
                    </span>
                </div> --}}
         </div>
     </div>
 </nav>
