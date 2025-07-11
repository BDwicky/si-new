<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI UKM - Sistem Informasi Unit Kegiatan Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Navbar */
        .header {
            /* background-color: rgba(245, 248, 250, 0.4); */
            background-color: rgba(245, 248, 250, 0.6);

            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            z-index: 10;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 50%;
            overflow: hidden;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .university-name {
            color: #002244;
            background-color: transparent;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .university-name h1 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .university-name h2 {
            font-size: 16px;
            font-weight: normal;
        }




        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        /* Navigation */
        .navbar {
            /* background: rgba(255, 255, 255, 0.95); */
            background-color: #262b40;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 10px;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            background: var(--primary-color);
            color: white !important;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero p {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .hero-buttons {
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            transform: translateY(-3px);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: var(--bg-light);
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(37, 99, 235, 0.05), transparent);
            transition: transform 0.6s;
            transform: rotate(45deg);
        }

        .feature-card:hover::before {
            transform: rotate(45deg) translateX(100%);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 2rem;
            color: white;
            position: relative;
            z-index: 2;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text-dark);
            position: relative;
            z-index: 2;
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.8;
            position: relative;
            z-index: 2;
        }

        /* About Section */
        .about {
            padding: 100px 0;
            background: white;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .about-text p {
            font-size: 1.1rem;
            color: var(--text-light);
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: var(--bg-light);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M0 0h40v40H0z'/%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E");
            animation: rotate 30s infinite linear;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        .btn-outline-light {
            border: 2px solid white;
            color: white;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            padding: 60px 0 30px;
            color: white;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            line-height: 1.8;
        }

        .footer-section a:hover {
            color: var(--accent-color);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .about-content {
                flex-direction: column;
                text-align: center;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Animation for elements in viewport */
        .animate-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .animate-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <!-- <a class="navbar-brand" href="#home">
                <i class="fas fa-chart-line me-2"></i>SI UKM
            </a> -->
            <div class="header" style="cursor: pointer;" onclick="window.location.href='/'">
                <div class="logo">
                    <img src="<?= base_url('image/logo-unv.png') ?>" alt="UKM Logo" class="logo-img" loading="lazy" decoding="async">
                </div>
                <div class="university-name">
                    <h1>UNIVERSITAS DR. SOETOMO</h1>
                    <h2>Unit Kegiatan Mahasiswa</h2>
                </div>
            </div>




            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
                <button class="btn btn-primary ms-3">Mulai Gratis</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Sistem Informasi Unit Kegiatan Mahasiswa</h1>
                    <p>Platform digital terpadu untuk mengelola seluruh aktivitas UKM kampus. Dari pendaftaran anggota hingga pelaporan kegiatan, semua dalam satu sistem.</p>
                    <div class="hero-buttons">
                        <button class="btn btn-primary btn-lg me-3">Coba Sekarang</button>
                        <button class="btn btn-light btn-lg">Pelajari Lebih Lanjut</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <i class="fas fa-graduation-cap" style="font-size: 15rem; color: rgba(255,255,255,0.2);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-4 fw-bold mb-3">Fitur Unggulan</h2>
                    <p class="lead text-muted">Platform lengkap untuk mengelola administrasi dan kegiatan Unit Kegiatan Mahasiswa</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Manajemen Anggota</h3>
                        <p>Kelola data anggota UKM, pendaftaran, validasi, dan status keanggotaan dengan sistem yang terintegrasi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Manajemen Kegiatan</h3>
                        <p>Rencanakan, kelola, dan monitor semua kegiatan UKM dengan sistem penjadwalan yang fleksibel.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>Manajemen Keuangan</h3>
                        <p>Catat pemasukan dan pengeluaran UKM, kelola kas, dan buat laporan keuangan yang transparan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>Pelaporan Digital</h3>
                        <p>Buat laporan kegiatan, laporan keuangan, dan dokumentasi UKM secara otomatis dan terstruktur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3>Sistem Pengumuman</h3>
                        <p>Broadcast informasi dan pengumuman kepada seluruh anggota UKM melalui notifikasi real-time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <div class="feature-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>Manajemen Prestasi</h3>
                        <p>Catat dan dokumentasikan semua prestasi anggota dan UKM untuk keperluan akreditasi dan pelaporan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row about-content">
                <div class="col-lg-6">
                    <div class="about-text animate-in">
                        <h2>Mengapa Pilih SI UKM?</h2>
                        <p>SI UKM hadir untuk membantu Unit Kegiatan Mahasiswa dalam mengelola administrasi dan kegiatan secara digital. Platform kami dirancang khusus untuk kebutuhan organisasi kemahasiswaan yang dinamis.</p>
                        <p>Kami memahami tantangan yang dihadapi UKM dalam pengelolaan anggota, kegiatan, dan pelaporan. SI UKM memberikan solusi terintegrasi yang mudah digunakan untuk semua stakeholder UKM.</p>
                        <button class="btn btn-primary btn-lg">Hubungi Kami</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <i class="fas fa-university" style="font-size: 12rem; color: var(--primary-color); opacity: 0.1;"></i>
                    </div>
                </div>
            </div>
            <div class="stats animate-in">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">UKM Kampus</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2000+</span>
                    <span class="stat-label">Anggota Aktif</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <span class="stat-label">Universitas</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span class="stat-label">Kepuasan Pengguna</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Siap Digitalisasi UKM Anda?</h2>
                <p>Bergabunglah dengan ratusan UKM yang telah merasakan kemudahan pengelolaan dengan SI UKM</p>
                <button class="btn btn-outline-light btn-lg me-3">Mulai Uji Coba</button>
                <button class="btn btn-primary btn-lg">Konsultasi Gratis</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SI UKM</h3>
                    <p>Platform sistem informasi terpercaya untuk Unit Kegiatan Mahasiswa. Membantu digitalisasi administrasi dan kegiatan UKM dengan teknologi modern.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Fitur</h3>
                    <p><a href="#">Manajemen Anggota</a></p>
                    <p><a href="#">Manajemen Kegiatan</a></p>
                    <p><a href="#">Laporan Digital</a></p>
                    <p><a href="#">Sistem Pengumuman</a></p>
                </div>
                <div class="footer-section">
                    <h3>Dukungan</h3>
                    <p><a href="#">Pusat Bantuan</a></p>
                    <p><a href="#">Tutorial</a></p>
                    <p><a href="#">Kontak Support</a></p>
                    <p><a href="#">FAQ</a></p>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Jakarta, Indonesia</p>
                    <p><i class="fas fa-phone me-2"></i>+62 21 1234 5678</p>
                    <p><i class="fas fa-envelope me-2"></i>info@siukm.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 SI UKM. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
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

        // Animation on scroll
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

        // Counter animation
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

        // Animate counters when they come into view
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
</body>

</html>