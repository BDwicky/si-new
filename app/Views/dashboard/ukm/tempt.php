<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Universitas Dr. Soetomo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            overflow-x: hidden;
            color: #333;
        }

        section {
            padding: 80px 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.2rem;
            color: #262b40;
            margin-bottom: 15px;
        }

        .section-title p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        /* Navigation Header */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 50px;
            background-color: #262b40;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo-section {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 250px;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo img {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }

        .university-name {
            color: #FFFFFF;
            line-height: 1.2;
        }

        .university-name h1 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .university-name h2 {
            font-size: 0.9rem;
            font-weight: normal;
            opacity: 0.9;
        }

        .nav-center {
            display: flex;
            justify-content: center;
            flex: 2;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 12px;
        }

        .nav-links a {
            text-decoration: none;
            color: #FFFFFF;
            font-weight: 500;
            transition: all 0.3s;
            padding: 8px 0;
            position: relative;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: #6995c2;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #6995c2;
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex: 1;
            min-width: 150px;
        }

        .login-btn {
            padding: 8px 20px;
            background-color: #4299e1;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .login-btn:hover {
            background-color: #3182ce;
            transform: translateY(-2px);
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            margin-left: 20px;
            color: white;
            font-size: 1.5rem;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 150px 50px 80px;
            background: linear-gradient(135deg, #262b40 0%, #3a4166 100%);
            color: white;
            gap: 40px;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .hero-title span {
            color: #4299e1;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: #4299e1;
            color: white;
            border: 2px solid #4299e1;
        }

        .btn-primary:hover {
            background-color: #3182ce;
            border-color: #3182ce;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 153, 225, 0.3);
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .hero-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-out;
            max-width: 600px;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.03);
        }

        /* Counter Section */
        .counter-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .counters {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .counter-item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            flex: 1;
            min-width: 200px;
            transition: transform 0.3s;
        }

        .counter-item:hover {
            transform: translateY(-10px);
        }

        .counter-icon {
            font-size: 2.5rem;
            color: #4299e1;
            margin-bottom: 15px;
        }

        .counter-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #262b40;
            margin-bottom: 5px;
        }

        .counter-text {
            color: #666;
            font-size: 1.1rem;
        }

        /* Gallery Section */
        .gallery-section {
            background-color: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 250px;
            transition: all 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        .gallery-caption h3 {
            margin-bottom: 5px;
        }

        /* Testimonial Section */
        .testimonial-section {
            background-color: #f8f9fa;
        }

        .testimonials {
            display: flex;
            gap: 30px;
            overflow-x: auto;
            padding: 20px 0;
            scroll-snap-type: x mandatory;
        }

        .testimonial-card {
            min-width: 350px;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            scroll-snap-align: start;
        }

        .testimonial-content {
            font-style: italic;
            margin-bottom: 20px;
            color: #555;
            line-height: 1.6;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            color: #262b40;
            margin-bottom: 5px;
        }

        .author-info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Footer Styles */
        .footer {
            background-color: #262b40;
            color: #fff;
            padding: 70px 0 0;
            font-size: 0.95rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-col {
            flex: 1;
            min-width: 250px;
            padding: 0 15px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .footer-logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: contain;
            background: #fff;
            padding: 5px;
        }

        .footer-univ-info h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .footer-univ-info p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .footer-description {
            margin-bottom: 20px;
            line-height: 1.6;
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #4299e1;
            transform: translateY(-3px);
        }

        .footer-col h4 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: #4299e1;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: #ddd;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .footer-col ul li a:hover {
            color: #4299e1;
            transform: translateX(5px);
        }

        .contact-info i {
            margin-right: 10px;
            color: #4299e1;
            width: 20px;
            text-align: center;
        }

        .newsletter-form {
            margin-top: 20px;
        }

        .newsletter-form input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .newsletter-form button {
            width: 100%;
            padding: 12px;
            background: #4299e1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .newsletter-form button:hover {
            background: #3182ce;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .copyright {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .footer-links a {
            color: #ddd;
            margin-left: 20px;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: #4299e1;
        }


        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer-col {
                flex: 100%;
                margin-bottom: 30px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .footer-links a {
                margin: 0 10px;
            }
        }

        /* Animations */
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            nav {
                padding: 12px 30px;
            }

            .hero {
                padding: 150px 30px 80px;
            }
        }

        @media (max-width: 992px) {
            .nav-center {
                display: none;
            }

            .menu-toggle {
                display: block;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding: 120px 30px 60px;
                min-height: auto;
            }

            .hero-content {
                max-width: 100%;
                margin-bottom: 40px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                max-width: 100%;
            }

            .counters {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 10px 20px;
            }

            .university-name h1 {
                font-size: 1rem;
            }

            .university-name h2 {
                font-size: 0.8rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .counter-item {
                min-width: 150px;
            }

            .testimonial-card {
                min-width: 300px;
            }

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

        @media (max-width: 576px) {
            .logo-section {
                min-width: auto;
            }

            .university-name {
                display: none;
            }

            .nav-right {
                min-width: auto;
            }

            .hero {
                padding: 100px 20px 50px;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .counters {
                grid-template-columns: 1fr;
            }

            .counter-number {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Header -->
    <nav>
        <div class="logo-section">
            <div class="logo">
                <img src="image/logo-unv.png" alt="UKM Logo" loading="lazy">
            </div>
            <div class="university-name">
                <h1>Universitas Dr. Soetomo</h1>
                <h2>Unit Kegiatan Mahasiswa</h2>
            </div>
        </div>

        <div class="nav-center">
            <ul class="nav-links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Fakultas</a></li>
                <li><a href="#">Akademik</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="nav-right">
            <button class="login-btn">Login</button>
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Selamat Datang di <span>UKM Universitas Dr. Soetomo</span></h1>
            <p class="hero-description">
                Wadah pengembangan minat, bakat, dan kreativitas mahasiswa untuk menciptakan
                pemimpin masa depan yang berkarakter dan kompeten di bidangnya.
            </p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">Lihat Kegiatan Kami</a>
                <a href="#" class="btn btn-secondary">Daftar Sekarang</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="image/ukm-hero.jpg" alt="Kegiatan UKM" loading="lazy">
        </div>
    </section>

    <!-- Counter Section -->
    <section class="counter-section">
        <div class="container">
            <div class="counters">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="counter-number" data-count="25">0</div>
                    <div class="counter-text">Jumlah UKM</div>
                </div>
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="counter-number" data-count="1200">0</div>
                    <div class="counter-text">Anggota Aktif</div>
                </div>
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="counter-number" data-count="56">0</div>
                    <div class="counter-text">Prestasi</div>
                </div>
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="counter-number" data-count="48">0</div>
                    <div class="counter-text">Kegiatan/Tahun</div>
                </div>
            </div>
        </div>

        <!-- Baru -->
        <!-- <div class="stats animate-in">
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
        </div> -->

    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Kegiatan</h2>
                <p>Momen berharga dari berbagai kegiatan Unit Kegiatan Mahasiswa Universitas Dr. Soetomo</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="image/gallery1.jpg" alt="Kegiatan UKM 1">
                    <div class="gallery-caption">
                        <h3>Pentas Seni Mahasiswa</h3>
                        <p>2023</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="image/gallery2.jpg" alt="Kegiatan UKM 2">
                    <div class="gallery-caption">
                        <h3>Olahraga Bersama</h3>
                        <p>2023</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="image/gallery3.jpg" alt="Kegiatan UKM 3">
                    <div class="gallery-caption">
                        <h3>Seminar Kewirausahaan</h3>
                        <p>2023</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="image/gallery4.jpg" alt="Kegiatan UKM 4">
                    <div class="gallery-caption">
                        <h3>Kompetisi Debat</h3>
                        <p>2023</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="image/gallery5.jpg" alt="Kegiatan UKM 5">
                    <div class="gallery-caption">
                        <h3>Pelatihan Keterampilan</h3>
                        <p>2023</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="image/gallery6.jpg" alt="Kegiatan UKM 6">
                    <div class="gallery-caption">
                        <h3>Kegiatan Sosial</h3>
                        <p>2023</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Mereka?</h2>
                <p>Testimonial dari anggota UKM Universitas Dr. Soetomo</p>
            </div>
            <div class="testimonials">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "Bergabung dengan UKM ini memberikan saya banyak pengalaman berharga dan teman-teman baru yang mendukung. Saya berkembang tidak hanya dalam minat saya tetapi juga dalam kepribadian."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="image/testi1.jpg" alt="Anggota UKM 1">
                        </div>
                        <div class="author-info">
                            <h4>Rina Wijaya</h4>
                            <p>UKM Paduan Suara</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "Melalui UKM, saya bisa mengembangkan bakat saya di bidang robotika dan bahkan berhasil memenangkan kompetisi nasional. Terima kasih untuk semua dukungannya!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="image/testi2.jpg" alt="Anggota UKM 2">
                        </div>
                        <div class="author-info">
                            <h4>Andi Pratama</h4>
                            <p>UKM Robotika</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "Saya menemukan passion saya di dunia teater melalui UKM ini. Pengalaman pentas di berbagai event benar-benar mengubah hidup saya."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="image/testi3.jpg" alt="Anggota UKM 3">
                        </div>
                        <div class="author-info">
                            <h4>Siti Aisyah</h4>
                            <p>UKM Teater</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "UKM olahraga tidak hanya membuat saya sehat secara fisik tetapi juga mental. Saya belajar tentang kerja tim dan pantang menyerah."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="image/testi4.jpg" alt="Anggota UKM 4">
                        </div>
                        <div class="author-info">
                            <h4>Budi Santoso</h4>
                            <p>UKM Basket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Counter Animation
        const counters = document.querySelectorAll('.counter-number');
        const speed = 200;

        function animateCounters() {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(animateCounters, 1);
                } else {
                    counter.innerText = target;
                }
            });
        }

        // Run animation when counter section is in view
        const counterSection = document.querySelector('.counter-section');
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                animateCounters();
                observer.unobserve(counterSection);
            }
        });

        observer.observe(counterSection);

        // Mobile Menu Toggle (basic functionality)
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-row">
            <!-- Logo dan Deskripsi -->
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="image/logo-unv.png" alt="Universitas Dr. Soetomo" loading="lazy">
                    <div class="footer-univ-info">
                        <h3>Universitas Dr. Soetomo</h3>
                        <p>Unit Kegiatan Mahasiswa</p>
                    </div>
                </div>
                <p class="footer-description">
                    Wadah pengembangan minat, bakat, dan kreativitas mahasiswa untuk menciptakan pemimpin masa depan yang berkarakter.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Link Cepat -->
            <div class="footer-col">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Profil UKM</a></li>
                    <li><a href="#">Daftar UKM</a></li>
                    <li><a href="#">Kalender Kegiatan</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Prestasi</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="footer-col">
                <h4>Kontak Kami</h4>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> Jl. Semolowaru No.84, Surabaya</li>
                    <li><i class="fas fa-phone"></i> (031) 593 1234</li>
                    <li><i class="fas fa-envelope"></i> ukm@unitomo.ac.id</li>
                    <li><i class="fas fa-clock"></i> Senin-Jumat: 08:00 - 16:00</li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Dapatkan informasi terbaru tentang kegiatan UKM langsung ke email Anda.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Alamat Email Anda" required>
                    <button type="submit">Berlangganan</button>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <div class="copyright">
                &copy; 2023 Universitas Dr. Soetomo. Hak Cipta Dilindungi.
            </div>
            <div class="footer-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Peta Situs</a>
            </div>
        </div>
    </div>
</footer>

</html>