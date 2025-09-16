<!-- Registration Form -->
<section id="contact" class="section-padding" style="background: rgba(30, 41, 59, 0.3);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="h1 gradient-text">Daftar Kuliah Sekarang</h2>
            <p class="lead">Mulai perjalanan pendidikan Anda bersama SALUT Digitech</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tech-card" data-aos="fade-up">
                    <form action="{{ route('waform.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    maxlength="20">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="wa" class="form-label">No. WhatsApp</label>
                                <input type="tel" class="form-control" id="wa" name="wa" required
                                    maxlength="20">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="program" class="form-label">Program Studi</label>
                                <select class="form-select" id="program" name="program">
                                    <option value="">Pilih Program Studi</option>
                                    <option value="Manajemen">Manajemen</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Hukum">Hukum</option>
                                    <option value="Komunikasi">Komunikasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" name="message" rows="4"
                                placeholder="Ceritakan tentang motivasi Anda..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="glow-btn">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
