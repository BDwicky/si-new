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
            height: 100vh;
            overflow: hidden;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .hero-container {
            height: 100vh;
            background: var(--primary-gradient);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
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
            width: 80px;
            height: 80px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: 3s;
        }

        .floating-circle:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
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
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.7;
            }
        }

        .hero-content {
            position: relative;
            width: 90%;
            max-width: 1200px;
            height: 90vh;
            max-height: 800px;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-header-hero {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
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
            gap: 1.5rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .ukm-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.2;
        }

        .category-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            display: inline-block;
        }

        .hero-icon {
            font-size: 3.5rem;
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
            padding: 2rem;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 2rem;
            align-items: stretch;
            min-height: 0;
        }

        .content-left {
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .content-right {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .description-section {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(31, 41, 55, 0.1);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .description-title {
            color: #1f2937;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description-text {
            font-size: 1rem;
            line-height: 1.6;
            color: #374151;
            flex: 1;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            flex: 1;
        }

        .stat-card {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .quick-info-card {
            background: rgba(31, 41, 55, 0.05);
            border-radius: 15px;
            padding: 1.2rem;
            border: 1px solid rgba(31, 41, 55, 0.1);
        }

        .quick-info-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-info-text {
            font-size: 0.9rem;
            color: #6b7280;
            line-height: 1.4;
        }

        .action-section {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-hero-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
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
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(31, 41, 55, 0.4);
            color: white;
        }

        .btn-hero-secondary {
            background: var(--secondary-gradient);
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
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
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(55, 65, 81, 0.4);
            color: white;
        }

        .hero-footer {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            padding: 1rem 2rem;
            border-top: 1px solid rgba(31, 41, 55, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #6b7280;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-body {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 1.5rem;
            }

            .ukm-title {
                font-size: 2.2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-container {
                padding: 15px;
            }

            .hero-content {
                width: 95%;
                height: 95vh;
            }

            .main-card {
                border-radius: 20px;
            }

            .hero-header-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1rem;
            }

            .ukm-title {
                font-size: 1.8rem;
            }

            .hero-body {
                padding: 1.5rem;
                gap: 1rem;
            }

            .action-section {
                flex-direction: column;
            }

            .hero-footer {
                flex-direction: column;
                gap: 0.3rem;
                text-align: center;
                padding: 0.8rem 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero-content {
                height: 98vh;
            }

            .card-header-hero {
                padding: 1.5rem;
            }

            .ukm-title {
                font-size: 1.6rem;
            }

            .hero-body {
                padding: 1rem;
            }

            .description-section {
                padding: 1.5rem;
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