<?= $this->include('templates/header') ?>   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI UKM - Sistem Informasi Unit Kegiatan Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Unit Kegiatan Mahasiswa Universitas Dr. Soetomo</h1>
                    <p>Platform digital seluruh aktivitas UKM kampus Universitas Dr.Soetomo</p>
                    <div class="hero-buttons">
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
                    <h2 class="display-4 fw-bold mb-3">Daftar UKM</h2>
                    <p class="lead text-muted">Dapatkan informasi lengkap tentang Unit Kegiatan Mahasiswa</p>
                </div>
            </div>

            <div class="search-section">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari UKM berdasarkan nama atau deskripsi...">
                </div>
                
                <div class="category-filters">
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
                    <button class="category-btn" data-category="keagamaan">
                        <i class="fas fa-mosque me-2"></i>Keagamaan
                    </button>
                    <button class="category-btn" data-category="teknologi">
                        <i class="fas fa-laptop-code me-2"></i>Teknologi
                    </button>
                    <button class="category-btn" data-category="sosial">
                        <i class="fas fa-handshake me-2"></i>Sosial
                    </button>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card animate-in">
                        <a href="<?= base_url('detail-ukm') ?>" style="text-decoration: none;">
                        <div class="feature-icon">
                            <img src="" alt="image cok">
                        </div>
                            
                            <h4>UKM Seni & Budaya</h4>
                            <p>Wadah bagi mahasiswa dalam menyalurkan bakat seni seperti tari, musik, dan teater kampus.</p>
                        </div>
                        </a>
                    </div>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row about-content">
                <div class="col">
                    <div class="about-text animate-in">
                        <h2>Mengapa Pilih SI UKM?</h2>
                        <p>SI UKM hadir untuk membantu Unit Kegiatan Mahasiswa dalam mengelola administrasi dan kegiatan secara digital. Platform kami dirancang khusus untuk kebutuhan organisasi kemahasiswaan yang dinamis.</p>
                        <p>Kami memahami tantangan yang dihadapi UKM dalam pengelolaan anggota, kegiatan, dan pelaporan. SI UKM memberikan solusi terintegrasi yang mudah digunakan untuk semua stakeholder UKM.</p>
                        <button class="btn btn-primary btn-lg">Hubungi Kami</button>
                    </div>
                </div>
                <div class="col">
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

     <script>
        // Search and Filter functionality
        const searchInput = document.getElementById('searchInput');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const ukmItems = document.querySelectorAll('.ukm-item');
        const noResults = document.getElementById('noResults');
        
        let currentCategory = 'all';
        let currentSearch = '';
        
        // Search functionality
        searchInput.addEventListener('input', function() {
            currentSearch = this.value.toLowerCase();
            filterUKM();
        });
        
        // Category filter functionality
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Update current category
                currentCategory = this.dataset.category;
                
                // Filter UKM
                filterUKM();
            });
        });
        
        function filterUKM() {
            let visibleCount = 0;
            
            ukmItems.forEach(item => {
                const itemCategory = item.dataset.category;
                const itemName = item.dataset.name.toLowerCase();
                
                // Check category filter
                const categoryMatch = currentCategory === 'all' || itemCategory === currentCategory;
                
                // Check search filter
                const searchMatch = currentSearch === '' || itemName.includes(currentSearch);
                
                if (categoryMatch && searchMatch) {
                    item.style.display = 'block';
                    visibleCount++;
                    
                    // Add animation
                    item.classList.remove('animate-in');
                    setTimeout(() => {
                        item.classList.add('animate-in');
                    }, 50);
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
        }
        
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            ukmItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('animate-in');
                }, index * 100);
            });
        });
        
        // Clear search button functionality
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Escape') {
                this.value = '';
                currentSearch = '';
                filterUKM();
            }
        });
    </script>


<?= $this->include('templates/footer') ?>