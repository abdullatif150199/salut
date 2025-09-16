  <!-- Footer -->
  <footer class="py-5" style="background: var(--dark-bg);">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 mb-4">
                  <h5 class="gradient-text mb-3">
                      <i class="fas fa-vr-cardboard me-2"></i>VR Digitech
                  </h5>
                  <p>Transformasi pendidikan digital dengan teknologi VR terdepan untuk masa depan yang lebih cerah.
                  </p>
                  <div class="d-flex">
                      <a href="{{ !empty($setting->facebook) ? $setting->facebook : '#' }}"
                          class="text-decoration-none me-3 neon-text">
                          <i class="fab fa-facebook fa-2x"></i>
                      </a>
                      <a href="{{ !empty($setting->instagram) ? $setting->instagram : '#' }}"
                          class="text-decoration-none me-3 neon-text">
                          <i class="fab fa-instagram fa-2x"></i>
                      </a>
                      <a href="{{ !empty($setting->youtube) ? $setting->youtube : '#' }}"
                          class="text-decoration-none me-3 neon-text">
                          <i class="fab fa-youtube fa-2x"></i>
                      </a>
                      <a href="{{ !empty($setting->linkedin) ? $setting->linkedin : '#' }}"
                          class="text-decoration-none neon-text">
                          <i class="fab fa-linkedin fa-2x"></i>
                      </a>
                  </div>

              </div>
              <div class="col-lg-2 col-md-6 mb-4">
                  <h6 class="neon-text mb-3">Menu</h6>
                  <ul class="list-unstyled">
                      <li><a href="#hero" class="text-decoration-none text-light">Beranda</a></li>
                      <li><a href="#about" class="text-decoration-none text-light">Tentang</a></li>
                      <li><a href="#programs" class="text-decoration-none text-light">Program</a></li>
                      <li><a href="#gallery" class="text-decoration-none text-light">Galeri</a></li>
                  </ul>
              </div>
              <div class="col-lg-3 col-md-6 mb-4">
                  <h6 class="neon-text mb-3">Program Studi</h6>
                  <ul class="list-unstyled">
                      <li><a href="#" class="text-decoration-none text-light">Manajemen</a></li>
                      <li><a href="#" class="text-decoration-none text-light">Akuntansi</a></li>
                      <li><a href="#" class="text-decoration-none text-light">Sistem Informasi</a></li>
                      <li><a href="#" class="text-decoration-none text-light">Pendidikan</a></li>
                  </ul>
              </div>
              @if ($setting)
                  <div class="col-lg-3 mb-4">
                      <h6 class="neon-text mb-3">Kontak</h6>
                      <p><i class="fas fa-map-marker-alt me-2 neon-text"></i>{{ $setting->address }}</p>
                      <p><i class="fas fa-phone me-2 neon-text"></i>{{ $setting->whatsapp }}</p>
                      <p><i class="fas fa-envelope me-2 neon-text"></i>{{ $setting->email }}</p>
                  </div>
              @endif
          </div>
          <hr class="border-secondary">
          <div class="text-center">
              <p>&copy; 2025 SALUT Digitech by VR Digitech. All rights reserved.</p>
          </div>
      </div>
  </footer>
