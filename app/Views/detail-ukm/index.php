<?= $this->include('templates/header') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Seni & Budaya - Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 100%);
            --accent-gradient: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        /* Hero Section */
        .hero-section {
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            background-size: cover;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-icon {
            font-size: 8rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            margin-top: 3rem;
        }
        
        .btn-primary-custom {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: white;
        }
        
        .btn-secondary-custom {
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .btn-secondary-custom:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-3px);
            color: white;
        }
        
        /* About Section */
        .about-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .section-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .about-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.15);
        }
        
        .about-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
            margin-bottom: 20px;
        }
        
        /* Programs Section */
        .programs-section {
            padding: 100px 0;
            background: white;
        }
        
        .program-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            border-left: 5px solid #667eea;
            transition: all 0.3s ease;
        }
        
        .program-card:hover {
            transform: translateX(10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        
        .program-icon {
            width: 60px;
            height: 60px;
            background: var(--secondary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
        }
        
        /* Gallery Section */
        .gallery-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin-bottom: 30px;
            aspect-ratio: 1;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .gallery-item:hover {
            transform: scale(1.05);
        }
        
        .gallery-placeholder {
            font-size: 4rem;
            color: rgba(255,255,255,0.3);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-text {
            color: white;
            text-align: center;
            font-weight: 600;
        }
        
        /* Team Section */
        .team-section {
            padding: 100px 0;
            background: white;
        }
        
        .team-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
        }
        
        .team-avatar {
            width: 100px;
            height: 100px;
            background: var(--accent-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            margin: 0 auto 20px;
        }
        
        /* Contact Section */
        .contact-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            text-align: center;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin: 0 auto 20px;
        }
        
        .social-links {
            margin-top: 30px;
        }
        
        .social-link {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            line-height: 50px;
            text-align: center;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            transform: translateY(-5px);
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            transform: translateY(-5px);
            color: white;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .hero-icon {
                font-size: 5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-primary-custom,
            .btn-secondary-custom {
                display: block;
                margin: 10px 0;
            }
        }
        
        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="floating-elements">
            <div class="floating-element">
                <i class="fas fa-music" style="font-size: 3rem;"></i>
            </div>
            <div class="floating-element">
                <i class="fas fa-masks-theater" style="font-size: 2.5rem;"></i>
            </div>
            <div class="floating-element">
                <i class="fas fa-palette" style="font-size: 2rem;"></i>
            </div>
        </div>
        
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <div class="hero-icon">
                    <i class="fas fa-masks-theater"></i>
                </div>
                <h1 class="hero-title">UKM Seni & Budaya</h1>
                <p class="hero-subtitle">Wadah Kreativitas dan Ekspresi Seni Mahasiswa</p>
                <p class="lead">Bergabunglah dengan komunitas seniman muda yang penuh passion dan kreativitas dalam mengembangkan bakat seni dan budaya.</p>
                
                <div class="cta-buttons">
                    <a href="#about" class="btn-primary-custom">
                        <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                    </a>
                    <a href="#contact" class="btn-secondary-custom">
                        <i class="fas fa-user-plus me-2"></i>Bergabung Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Tentang UKM Seni & Budaya</h2>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>Visi</h4>
                        <p>Menjadi wadah utama pengembangan seni dan budaya di kampus yang menghasilkan karya-karya berkualitas dan berdampak positif bagi masyarakat.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Misi</h4>
                        <p>Mengembangkan potensi kreatif mahasiswa melalui berbagai kegiatan seni dan budaya yang inovatif, edukatif, dan inspiratif.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>Nilai</h4>
                        <p>Kreativitas, kolaborasi, integritas, dan keunggulan dalam setiap karya dan pertunjukan yang dihasilkan oleh anggota UKM.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs-section" id="programs">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Program & Kegiatan</h2>
            
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-music"></i>
                        </div>
                        <h4>Musik & Vokal</h4>
                        <p>Pelatihan vokal, instrumen musik, dan produksi musik. Termasuk band, paduan suara, dan ensembel musik tradisional.</p>
                        <ul class="mt-3">
                            <li>Pelatihan vokal dan teknik bernyanyi</li>
                            <li>Kelas instrumen (gitar, keyboard, drum)</li>
                            <li>Workshop produksi musik</li>
                            <li>Pertunjukan rutin dan kompetisi</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-theater-masks"></i>
                        </div>
                        <h4>Teater & Drama</h4>
                        <p>Pengembangan kemampuan akting, penulisan naskah, dan produksi teater. Dari drama klasik hingga kontemporer.</p>
                        <ul class="mt-3">
                            <li>Pelatihan akting dan improvisasi</li>
                            <li>Workshop penulisan naskah</li>
                            <li>Produksi teater berkala</li>
                            <li>Kolaborasi dengan komunitas teater</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h4>Seni Rupa & Visual</h4>
                        <p>Eksplorasi berbagai medium seni rupa dari tradisional hingga digital. Meliputi lukis, grafis, dan instalasi seni.</p>
                        <ul class="mt-3">
                            <li>Kelas melukis dan menggambar</li>
                            <li>Workshop seni digital</li>
                            <li>Pameran karya seni</li>
                            <li>Proyek seni kolaboratif</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        <h4>Tari & Koreografi</h4>
                        <p>Pelatihan tari tradisional dan modern, pengembangan koreografi, dan pertunjukan tari yang memukau.</p>
                        <ul class="mt-3">
                            <li>Pelatihan tari tradisional Nusantara</li>
                            <li>Kelas tari modern dan kontemporer</li>
                            <li>Workshop koreografi</li>
                            <li>Pertunjukan tari dan festival</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <h2 class="section-title text-white" data-aos="fade-up">Galeri Kegiatan</h2>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Pertunjukan Musik</h5>
                                <p>Konser tahunan UKM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Pementasan Teater</h5>
                                <p>Drama kolosal 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Pameran Seni</h5>
                                <p>Karya mahasiswa terbaik</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Festival Tari</h5>
                                <p>Kolaborasi antar UKM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Workshop Seni</h5>
                                <p>Pelatihan teknik melukis</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="gallery-item">
                        <div class="gallery-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="gallery-overlay">
                            <div class="gallery-text">
                                <h5>Kompetisi Seni</h5>
                                <p>Juara 1 tingkat nasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section" id="team">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Tim Pengurus</h2>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5>Ahmad Rizki</h5>
                        <p class="text-primary">Ketua UKM</p>
                        <p class="small">Mahasiswa Seni Rupa semester 6 yang berpengalaman dalam manajemen organisasi dan seni lukis.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5>Sari Indah</h5>
                        <p class="text-primary">Wakil Ketua</p>
                        <p class="small">Mahasiswa Musik semester 5 yang aktif dalam berbagai kompetisi vokal dan paduan suara.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5>Budi Santoso</h5>
                        <p class="text-primary">Sekretaris</p>
                        <p class="small">Mahasiswa Sastra yang memiliki passion dalam teater dan penulisan naskah drama.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-card">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5>Maya Putri</h5>
                        <p class="text-primary">Bendahara</p>
                        <p class="small">Mahasiswa Akuntansi yang juga aktif sebagai penari dan koreografer tari modern.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Kontak & Informasi</h2>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>Alamat</h5>
                        <p>Gedung Kesenian Lt. 2<br>Kampus Universitas<br>Jl. Pendidikan No. 123</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5>Kontak</h5>
                        <p>WhatsApp: +62 812-3456-7890<br>Email: ukmsenbudaya@univ.ac.id<br>Instagram: @ukmsenbudaya</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5>Jadwal Kegiatan</h5>
                        <p>Senin - Jumat: 16:00 - 18:00<br>Sabtu: 09:00 - 12:00<br>Minggu: Libur</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5" data-aos="fade-up">
                <h4 class="mb-3">Ikuti Media Sosial Kami</h4>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
                
                <div class="mt-4">
                    <a href="#" class="btn-primary-custom">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5" style="background: var(--primary-gradient);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-white mb-3">UKM Seni & Budaya</h5>
                    <p class="text-white opacity-75">Mengembangkan kreativitas dan ekspresi seni mahasiswa melalui berbagai program dan kegiatan yang inspiratif.</p>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white opacity-75 text-decoration-none">Home</a></li>
                        <li><a href="#about" class="text-white opacity-75 text-decoration-none">About</a></li>
                        <li><a href="#programs" class="text-white opacity-75 text-decoration-none">Programs</a></li>
                        <li><a href="#gallery" class="text-white opacity-75 text-decoration-none">Gallery</a></li>
                        <li><a href="#contact" class="text-white opacity-75 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white mb-3">Program</h6>
                    <ul class="list-unstyled">
                        <li><span class="text-white opacity-75">Musik & Vokal</span></li>
                        <li><span class="text-white opacity-75">Teater & Drama</span></li>
                        <li><span class="text-white opacity-75">Seni Rupa & Visual</span></li>
                        <li><span class="text-white opacity-75">Tari & Koreografi</span></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="text-white opacity-75 mb-0">&copy; 2024 UKM Seni & Budaya. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#home" class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-section');
            const speed = scrolled * 0.5;
            
            if (parallax) {
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Dynamic counter animation
        function animateCounter(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const current = Math.floor(progress * (end - start) + start);
                element.textContent = current;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        animateCounter(counter, 0, target, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Add stats section if needed
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Interactive gallery hover effect
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05) rotate(1deg)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) rotate(0deg)';
            });
        });

        // Dynamic text animation
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.textContent = '';
            
            function typing() {
                if (i < text.length) {
                    element.textContent += text.charAt(i);
                    i++;
                    setTimeout(typing, speed);
                }
            }
            typing();
        }

        // Add loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
            
            // Animate hero title
            const heroTitle = document.querySelector('.hero-title');
            if (heroTitle) {
                const originalText = heroTitle.textContent;
                typeWriter(heroTitle, originalText, 150);
            }
        });

        // Contact form validation (if form exists)
        const contactForm = document.querySelector('#contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Simple form validation
                const inputs = this.querySelectorAll('input[required], textarea[required]');
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                
                if (isValid) {
                    // Show success message
                    alert('Terima kasih! Pesan Anda telah dikirim.');
                    this.reset();
                }
            });
        }

        // Add scroll indicator
        function updateScrollIndicator() {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            let indicator = document.querySelector('.scroll-indicator');
            if (!indicator) {
                indicator = document.createElement('div');
                indicator.className = 'scroll-indicator';
                indicator.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: ${scrollPercent}%;
                    height: 4px;
                    background: var(--primary-gradient);
                    z-index: 9999;
                    transition: width 0.3s ease;
                `;
                document.body.appendChild(indicator);
            } else {
                indicator.style.width = scrollPercent + '%';
            }
        }

        window.addEventListener('scroll', updateScrollIndicator);
    </script>

<?= $this->include('templates/footer') ?>