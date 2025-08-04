<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($ukm['name']) ?> - Detail UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            --secondary-gradient: linear-gradient(135deg, #374151 0%, #4b5563 100%);
            --success-gradient: linear-gradient(135deg, #1f2937 0%, #374151 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: auto;
            overflow: auto;
        }

        .hero-container {
            min-height: 100vh;
            background: var(--primary-gradient);
            position: relative;
            overflow: visible;
            display: flex;
            align-items: center;
            justify-content: center;
            /* agar konten di tengah horizontal */
            padding: 50px 0;
            /* beri ruang atas bawah */
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            animation: float 8s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 15%;
            animation-delay: 3s;
        }

        .floating-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 30%;
            left: 70%;
            animation-delay: 6s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.7;
            }
        }

        .hero-content {
            position: relative;
            z-index: 10;
            width: 80%;
            max-width: 1400px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            min-height: 85vh;
            display: flex;
            flex-direction: column;
        }

        .card-header-hero {
            background: var(--primary-gradient);
            color: white;
            padding: 3rem 3rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .card-header-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 15px,
                    rgba(255, 255, 255, 0.03) 15px,
                    rgba(255, 255, 255, 0.03) 30px);
            animation: shimmer 25s linear infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .hero-header-content {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 2rem;
            align-items: center;
        }

        .ukm-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.1;
        }

        .category-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-size: 1.1rem;
            backdrop-filter: blur(10px);
            display: inline-block;
        }

        .hero-icon {
            font-size: 5rem;
            opacity: 0.6;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.6;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .hero-body {
            flex: 1;
            padding: 3rem;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            align-items: start;
        }

        .content-left {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .content-right {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .description-section {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border-radius: 25px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(31, 41, 55, 0.1);
            flex: 1;
        }

        .description-title {
            color: #1f2937;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #374151;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .stat-card {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: scale(1.05);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .quick-info-card {
            background: rgba(31, 41, 55, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(31, 41, 55, 0.1);
        }

        .quick-info-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-info-text {
            font-size: 0.95rem;
            color: #6b7280;
            line-height: 1.5;
        }

        .action-section {
            display: flex;
            gap: 1rem;
            margin-top: auto;
            padding-top: 2rem;
        }

        .btn-hero-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(31, 41, 55, 0.4);
            color: white;
        }

        .btn-hero-secondary {
            background: var(--secondary-gradient);
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }

        .btn-hero-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(55, 65, 81, 0.4);
            color: white;
        }

        .hero-footer {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            padding: 1.5rem 3rem;
            border-top: 1px solid rgba(31, 41, 55, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-body {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .ukm-title {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content {
                padding: 1rem;
            }

            .main-card {
                min-height: 95vh;
                border-radius: 20px;
            }

            .hero-header-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1rem;
            }

            .ukm-title {
                font-size: 2.2rem;
            }

            .hero-body {
                padding: 2rem;
            }

            .action-section {
                flex-direction: column;
            }

            .hero-footer {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="hero-container">
        <div class="hero-background"></div>

        <div class="floating-elements">
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
        </div>

        <div class="hero-content">
            <div class="main-card">
                <div class="card-header-hero">
                    <div class="hero-header-content">
                        <div>
                            <h1 class="ukm-title"><?= esc($ukm['name']) ?></h1>
                            <span class="category-badge">
                                <i class="fas fa-tag me-2"></i><?= esc($ukm['kategori']) ?>
                            </span>
                        </div>
                        <div>
                            <i class="fas fa-users hero-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="hero-body">
                    <div class="content-left">
                        <div class="description-section">
                            <h3 class="description-title">
                                <i class="fas fa-info-circle"></i>
                                Tentang UKM
                            </h3>
                            <p class="description-text">
                                <?= esc($ukm['deskripsi']) ?>
                            </p>
                        </div>

                        <div class="action-section">
                            <?php if (session()->has('id_user')): ?>
                                <button id="btn-daftar" class="btn-hero-primary">
                                    <i class="fas fa-user-plus"></i>
                                    Daftar Sebagai Anggota
                                </button>
                            <?php else: ?>
                                <a href="<?= base_url('login') ?>" class="btn-hero-secondary">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login untuk Daftar
                                </a>
                            <?php endif; ?>
                            <a href="#" class="btn-hero-secondary">
                                <i class="fas fa-info-circle"></i>
                                Info Lebih Lanjut
                            </a>
                        </div>
                    </div>

                    <div class="content-right">
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-number">
                                    <i class="fas fa-users"></i>
                                    <?= esc($jumlah_anggota) ?>
                                </div>
                                <div class="stat-label">Anggota Aktif</div>
                            </div>

                            <div class="stat-card">
                                <div class="stat-number">
                                    <i class="fas fa-trophy"></i>
                                    25+
                                </div>
                                <div class="stat-label">Prestasi Diraih</div>
                            </div>
                        </div>

                        <div class="quick-info-card">
                            <h6 class="quick-info-title">
                                <i class="fas fa-bullseye"></i>
                                Visi & Misi
                            </h6>
                            <p class="quick-info-text">
                                Mengembangkan potensi mahasiswa melalui kegiatan positif dan prestasi.
                            </p>
                        </div>

                        <div class="quick-info-card">
                            <h6 class="quick-info-title">
                                <i class="fas fa-star"></i>
                                Keunggulan
                            </h6>
                            <p class="quick-info-text">
                                Pembinaan intensif, networking luas, dan kesempatan pengembangan diri.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="hero-footer">
                    <div>
                        <i class="fas fa-clock me-2"></i>
                        Terakhir diperbarui: <?= date('d M Y H:i', strtotime($ukm['updated_at'])) ?>
                    </div>
                    <div>
                        <i class="fas fa-eye me-2"></i>
                        1,234 views
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Notifikasi SweetAlert dari Session Flashdata
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php elseif (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= session()->getFlashdata('error') ?>',
                showConfirmButton: false,
                timer: 2500
            });
        <?php endif; ?>

        // Konfirmasi sebelum daftar
        document.addEventListener('DOMContentLoaded', function() {
            const btnDaftar = document.getElementById('btn-daftar');
            if (btnDaftar) {
                btnDaftar.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Konfirmasi Pendaftaran',
                        text: "Apakah kamu yakin ingin mendaftar sebagai anggota UKM ini?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1f2937',
                        cancelButtonColor: '#ef4444',
                        confirmButtonText: 'Ya, daftar',
                        cancelButtonText: 'Batal',
                        backdrop: `
                            rgba(31, 41, 55, 0.1)
                            left top
                            no-repeat
                        `
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?= base_url('ukm/daftar/' . $ukm['id']) ?>";
                        }
                    });
                });
            }

            // Entrance animations
            const cards = document.querySelectorAll('.stat-card, .quick-info-card, .description-section');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';

                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * (index + 1));
            });
        });
    </script>

</body>

</html>