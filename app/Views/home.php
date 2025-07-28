<?= $this->include('templates/header') ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI UKM - Universitas Dr. Soetomo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .hero {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content h1 {
            font-weight: 800;
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .feature-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .feature-icon img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .search-box {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border-radius: 50px;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }

        .category-btn {
            border: none;
            background: #f8f9fa;
            padding: 8px 15px;
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .category-btn.active,
        .category-btn:hover {
            background: var(--secondary-color);
            color: white;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
            line-height: 1;
        }

        .stat-label {
            font-size: 1rem;
            color: #6c757d;
        }

        .testimonial-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .animate-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s, transform 0.6s;
        }

        .animate-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .cta {
            background: var(--primary-color);
            color: white;
            padding: 4rem 0;
        }

        @media (max-width: 768px) {
            .hero-content {
                text-align: center;
                margin-bottom: 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .stats {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Unit Kegiatan Mahasiswa Universitas Dr. Soetomo</h1>
                    <p>Temukan wadah pengembangan diri melalui berbagai kegiatan mahasiswa yang menarik dan bermanfaat. Platform digital ini menyediakan informasi lengkap tentang seluruh UKM di kampus kami.</p>
                    <div class="hero-buttons d-flex">
                        <a href="#features" class="btn btn-light btn-lg me-3">Jelajahi UKM</a>
                        <a href="#about" class="btn btn-outline-light btn-lg">Tentang Kami</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="<?= base_url('image\mahasiswa-aktivitas1.png') ?>" alt="Mahasiswa Beraktivitas" style="transform: scaleX(-1);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UKM Listing Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row text-center mb-2">
                <div class="col-12">
                    <h2 class="display-4 fw-bold mb-2">Daftar UKM</h2>
                    <p class="lead text-muted mb-2">Temukan UKM yang sesuai dengan minat dan bakat Anda</p>
                </div>
            </div>

            <div class="search-section mb-4">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari UKM berdasarkan nama atau deskripsi...">
                    <button class="btn btn-sm btn-outline-secondary position-absolute end-0 top-50 translate-middle-y me-2" id="clearSearch">Bersihkan</button>
                </div>

                <div class="category-filters mt-3 d-flex flex-wrap justify-content-center">
                    <button class="category-btn active" data-category="all">
                        <i class="fas fa-th-large me-2"></i>Semua
                    </button>
                    <button class="category-btn" data-category="seni-budaya">
                        <i class="fas fa-palette me-2"></i>Seni & Budaya
                    </button>
                    <button class="category-btn" data-category="olahraga">
                        <i class="fas fa-dumbbell me-2"></i>Olahraga
                    </button>
                    <button class="category-btn" data-category="akademik">
                        <i class="fas fa-graduation-cap me-2"></i>Akademik
                    </button>
                    <button class="category-btn" data-category="kerohanian">
                        <i class="fas fa-mosque me-2"></i>Kerohanian
                    </button>
                    <button class="category-btn" data-category="teknologi">
                        <i class="fas fa-laptop-code me-2"></i>Teknologi
                    </button>
                    <button class="category-btn" data-category="sosial">
                        <i class="fas fa-handshake me-2"></i>Sosial
                    </button>
                </div>
            </div>

            <div id="noResults" class="text-center my-5 d-none">
                <!--
                <img src="<?= base_url('assets/images/no-results.png') ?>" alt="Tidak ditemukan" width="150" class="mb-3" loading="lazy">
                -->
                <h4>UKM tidak ditemukan</h4>
                <p class="text-muted">Coba gunakan kata kunci lain atau pilih kategori berbeda</p>
            </div>

            <?php helper('html'); ?>
            <div class="row g-4" id="ukmContainer">
                <?php foreach ($list_ukm as $ukm): ?>
                    <div class="col-lg-4 col-md-6 ukm-item"
                        data-category="<?= esc(strtolower($ukm['kategori'])) ?>"
                        data-name="<?= esc(strtolower($ukm['name'])) ?>">
                        <div class="feature-card h-100">
                            <div class="p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Gunakan ikon FontAwesome sesuai data atau kategori -->
                                    <i class="fas fa-users fa-3x text-primary me-3"></i>
                                    <h4 class="mb-0"><?= esc($ukm['name']) ?></h4>
                                </div>
                                <p class="text-muted"><?= esc($ukm['deskripsi']) ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-primary">
                                        <i class="fas fa-tag me-1"></i> <?= esc($ukm['kategori']) ?>
                                    </span>
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1"></i> <?= esc($ukm['jumlah_anggota']) ?> anggota
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-4 fw-bold">Manfaat Bergabung dengan UKM</h2>
                    <p class="lead text-muted">Temukan berbagai keuntungan yang bisa Anda dapatkan</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-primary">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <h4>Perluas Jaringan</h4>
                        <p class="text-muted">Bertemu dengan mahasiswa dari berbagai fakultas dengan minat yang sama, membangun relasi yang bermanfaat untuk masa depan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-success">
                            <i class="fas fa-brain fa-3x"></i>
                        </div>
                        <h4>Kembangkan Soft Skills</h4>
                        <p class="text-muted">Asah kemampuan kepemimpinan, kerja tim, manajemen waktu, dan public speaking melalui berbagai kegiatan UKM.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-warning">
                            <i class="fas fa-trophy fa-3x"></i>
                        </div>
                        <h4>Raih Prestasi</h4>
                        <p class="text-muted">Ikuti kompetisi dan ajang bergengsi mewakili universitas, tingkatkan CV dan portofolio Anda.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-danger">
                            <i class="fas fa-heart fa-3x"></i>
                        </div>
                        <h4>Jaga Kesehatan</h4>
                        <p class="text-muted">Aktivitas fisik dan mental yang seimbang melalui UKM membantu menjaga kesehatan selama masa kuliah.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-info">
                            <i class="fas fa-book fa-3x"></i>
                        </div>
                        <h4>Belajar di Luar Kelas</h4>
                        <p class="text-muted">Dapatkan pengetahuan dan pengalaman praktis yang tidak diajarkan di ruang kuliah.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="benefit-card p-4 h-100 bg-white rounded-3 shadow-sm">
                        <div class="benefit-icon mb-3 text-secondary">
                            <i class="fas fa-smile fa-3x"></i>
                        </div>
                        <h4>Hilangkan Stres</h4>
                        <p class="text-muted">Kegiatan UKM menjadi sarana refreshing yang sehat dari rutinitas akademik yang padat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-text animate-in">
                        <h2 class="fw-bold mb-4">Tentang SI UKM Universitas Dr. Soetomo</h2>
                        <p class="lead">SI UKM adalah platform digital terpadu untuk mengelola seluruh aktivitas Unit Kegiatan Mahasiswa di lingkungan Universitas Dr. Soetomo.</p>
                        <p>Kami menyediakan solusi lengkap mulai dari pendaftaran anggota, pengelolaan kegiatan, hingga pelaporan aktivitas UKM secara transparan dan efisien.</p>

                        <div class="about-features mt-4">
                            <div class="d-flex mb-3">
                                <div>
                                    <i class="fas fa-check-circle fa-lg text-primary"></i>
                                    <strong>Manajemen Anggota Terpadu</strong> - Sistem database anggota yang terorganisir dengan baik
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div>
                                    <i class="fas fa-check-circle fa-lg text-primary"></i>
                                    <strong>Kalender Kegiatan</strong> - Pantau seluruh agenda UKM dalam satu platform
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div>
                                    <i class="fas fa-check-circle fa-lg text-primary"></i>
                                    <strong>Pelaporan Digital</strong> - Laporan kegiatan dan keuangan yang transparan
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <i class="fas fa-check-circle fa-lg text-primary"></i>
                                    <strong>Komunikasi Efektif</strong> - Sistem notifikasi terintegrasi untuk seluruh anggota
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center animate-in">
                        <img src="<?= base_url('image/123.png') ?>" alt="Tentang SI UKM" class="img-fluid rounded-3 shadow" loading="lazy">
                        <div class="image-caption mt-3 p-3 bg-light rounded">
                            <p class="mb-0">SI UKM telah membantu lebih dari 50 UKM dalam mengelola kegiatan mereka secara digital</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats animate-in mt-5">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">UKM Terdaftar</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2000+</span>
                    <span class="stat-label">Anggota Aktif</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">300+</span>
                    <span class="stat-label">Kegiatan/Tahun</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span class="stat-label">Kepuasan Pengguna</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonials py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-4 fw-bold">Apa Kata Mereka?</h2>
                    <p class="lead text-muted">Testimoni dari pengguna SI UKM</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card p-4 h-100 bg-white rounded-3 shadow-sm animate-in">
                        <div class="d-flex align-items-center mb-3">
                            <img src="<?= base_url('assets/images/testimonials/1.jpg') ?>" class="rounded-circle me-3" width="60" alt="Testimoni 1" loading="lazy">
                            <div>
                                <h5 class="mb-0">Budi Santoso</h5>
                                <small class="text-muted">Ketua UKM Basket</small>
                            </div>
                        </div>
                        <p class="mb-0">"SI UKM sangat membantu dalam mengelola anggota dan jadwal latihan. Sistem pendaftaran online juga memudahkan mahasiswa baru yang ingin bergabung."</p>
                        <div class="rating mt-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="testimonial-card p-4 h-100 bg-white rounded-3 shadow-sm animate-in">
                        <div class="d-flex align-items-center mb-3">
                            <img src="<?= base_url('assets/images/testimonials/2.jpg') ?>" class="rounded-circle me-3" width="60" alt="Testimoni 2" loading="lazy">
                            <div>
                                <h5 class="mb-0">Anita Rahayu</h5>
                                <small class="text-muted">Anggota UKM Robotika</small>
                            </div>
                        </div>
                        <p class="mb-0">"Dengan SI UKM, saya bisa dengan mudah melihat jadwal kegiatan dan materi pelatihan. Fitur diskusi online juga sangat membantu kolaborasi antar anggota."</p>
                        <div class="rating mt-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="testimonial-card p-4 h-100 bg-white rounded-3 shadow-sm animate-in">
                        <div class="d-flex align-items-center mb-3">
                            <img src="<?= base_url('assets/images/testimonials/3.jpg') ?>" class="rounded-circle me-3" width="60" alt="Testimoni 3" loading="lazy">
                            <div>
                                <h5 class="mb-0">Dr. Surya Wijaya</h5>
                                <small class="text-muted">Pembina UKM</small>
                            </div>
                        </div>
                        <p class="mb-0">"Sebagai pembina, saya sangat terbantu dengan laporan otomatis dari SI UKM. Monitoring perkembangan setiap UKM menjadi lebih mudah dan transparan."</p>
                        <div class="rating mt-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-4 fw-bold">Pertanyaan Umum</h2>
                    <p class="lead text-muted">Temukan jawaban atas pertanyaan Anda</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border rounded animate-in">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana cara bergabung dengan UKM?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda bisa mendaftar melalui menu pendaftaran online di platform SI UKM atau datang langsung ke stand UKM saat masa orientasi mahasiswa baru. Setiap UKM mungkin memiliki persyaratan khusus yang perlu dipenuhi.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border rounded animate-in">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apakah ada biaya keanggotaan?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Beberapa UKM mungkin memungut iuran anggota untuk operasional kegiatan, namun besarnya bervariasi tergantung jenis UKM. Informasi detail bisa Anda dapatkan di halaman masing-masing UKM.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border rounded animate-in">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bisakah saya bergabung dengan lebih dari satu UKM?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, Anda bisa bergabung dengan lebih dari satu UKM selama mampu membagi waktu dengan baik. Namun kami sarankan untuk tidak bergabung lebih dari 3 UKM agar tidak mengganggu aktivitas akademik.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border rounded animate-in">
                            <h3 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana jika UKM yang saya minati tidak ada?
                                </button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda bisa mengajukan pembentukan UKM baru dengan memenuhi persyaratan tertentu seperti memiliki minimal 15 anggota dan pembina dari dosen. Proses pengajuan bisa dilakukan melalui menu "Ajukan UKM Baru" di dashboard SI UKM.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border rounded animate-in">
                            <h3 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Apakah kegiatan UKM mendapatkan SKS?
                                </button>
                            </h3>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Beberapa kegiatan UKM tertentu yang memenuhi syarat bisa dikonversi menjadi SKS melalui program Merdeka Belajar Kampus Merdeka (MBKM). Konsultasikan dengan pembimbing akademik Anda untuk informasi lebih lanjut.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Siap Bergabung dengan UKM?</h2>
                    <p class="lead mb-lg-0">Temukan UKM yang sesuai dengan minat dan bakat Anda, dan mulailah petualangan seru selama masa kuliah!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="<?= base_url('register') ?>" class="btn btn-light btn-lg me-3">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect (tidak diubah)
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links (tidak diubah)
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

        // Animation on scroll (tidak diubah)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation (tidak diubah)
        function animateCounter(element) {
            const target = parseInt(element.textContent.replace(/[^\d]/g, ''));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                const suffix = element.textContent.match(/[^\d]+$/);
                element.textContent = Math.floor(current) + (suffix ? suffix[0] : '');
            }, 16);
        }

        // Animate counters when they come into view (tidak diubah)
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        });

        document.querySelectorAll('.stat-number').forEach(counter => {
            counterObserver.observe(counter);
        });
    </script>

    <script>
        // Search and Filter functionality - Bagian yang diperbaiki
        const searchInput = document.getElementById('searchInput');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const ukmItems = document.querySelectorAll('.ukm-item');
        const noResults = document.getElementById('noResults');
        const loadMoreBtn = document.getElementById('loadMore');

        let currentCategory = 'all';
        let currentSearch = '';
        let visibleItems = [];

        // Initialize - show all items initially
        function initializeUKM() {
            visibleItems = Array.from(ukmItems);
            updateDisplay();
        }

        // Search functionality
        searchInput.addEventListener('input', function() {
            currentSearch = this.value.toLowerCase();
            filterUKM();
        });

        // Category filter functionality
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                currentCategory = this.dataset.category;
                filterUKM();
            });
        });

        // Filter UKM function
        function filterUKM() {
            visibleItems = Array.from(ukmItems).filter(item => {
                const itemCategory = item.dataset.category;
                const itemName = item.dataset.name.toLowerCase();

                const categoryMatch = currentCategory === 'all' || itemCategory === currentCategory;
                const searchMatch = currentSearch === '' || itemName.includes(currentSearch);

                return categoryMatch && searchMatch;
            });

            updateDisplay();
        }

        // Update display after filtering
        function updateDisplay() {
            // Hide all items first
            ukmItems.forEach(item => {
                item.style.display = 'none';
            });

            // Show filtered items
            visibleItems.forEach(item => {
                item.style.display = 'block';
            });

            // Show/hide no results message
            if (visibleItems.length === 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
        }

        // Clear search functionality
        document.getElementById('clearSearch')?.addEventListener('click', function() {
            searchInput.value = '';
            currentSearch = '';
            filterUKM();
        });

        // Load more functionality (jika diperlukan)
        loadMoreBtn?.addEventListener('click', function() {
            // Implementasi load more jika diperlukan
            console.log('Load more clicked');
        });

        // Initialize on DOM load
        document.addEventListener('DOMContentLoaded', initializeUKM);
    </script>


    <?= $this->include('templates/footer') ?>