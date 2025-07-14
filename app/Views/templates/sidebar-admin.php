
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Sidebar - Fixed Layout */
        .sidebar {
            width: 250px;
            background: #262b40;
            padding: 20px;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow: hidden;
            z-index: 1000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo-img {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
            transform: translateZ(0);
            backface-visibility: hidden;
            image-rendering: -webkit-optimize-contrast;
        }

        .logo-title {
            color: #FFFFFF;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo-subtitle {
            color: #FFFFFF;
            font-size: 14px;
            margin: 0;
        }

        .nav-container {
            flex: 1;
            overflow-y: auto;
        }

        /* Remove underline from links */
        .nav-container a {
            text-decoration: none;
        }

        .nav-item {
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            color: #FFFFFF;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            background: transparent;
            /* Ensure background is transparent by default */
        }

        /* Icon styling with colors */
        .nav-item i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 18px;
            z-index: 1;
        }

        /* Individual icon colors */
        .fa-home {
            color: #FF9E3B;
        }

        .fa-sitemap {
            color: #6EE7B7;
        }

        .fa-calendar-alt {
            color: #F472B6;
        }

        .fa-users {
            color: #93C5FD;
        }

        .fa-user-plus {
            color: #A78BFA;
        }

        .nav-item:hover {
            background: rgba(66, 153, 225, 0.2);
        }

        .nav-item.active {
            color: white;
            font-weight: 500;
            /* Solid blue background for active state */
            background: #4299e1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Remove the shine effect */
        .nav-item.active::before {
            display: none;
        }

        .nav-item.active i {
            color: white !important;
        }

        .nav-item span {
            position: relative;
            z-index: 1;
        }

        .user-section-wrapper {
            margin-top: auto;
            padding-top: 20px;
            background: #262b40;
            position: relative;
        }

        .user-section {
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            margin-bottom: 10px;
            position: relative;
            cursor: pointer;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #FFFFFF;
            margin-bottom: 2px;
        }

        .user-role {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Logout dropdown menu */
        .logout-menu {
            position: absolute;
            bottom: 100%;
            left: 0;
            width: 100%;
            background: #2d3748;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .user-section:hover .logout-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .logout-menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            color: #FFFFFF;
            font-size: 14px;
            transition: background 0.2s;
        }

        .logout-menu-item i {
            margin-right: 10px;
            color: #e53e3e;
        }

        .logout-menu-item:hover {
            background: rgba(231, 74, 59, 0.2);
        }

        .page-header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 60px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 100;
        }

        .logout-btn {
            background: #4299e1;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #3182ce;
        }

        .page-footer {
            position: fixed;
            bottom: 0;
            left: 250px;
            right: 0;
            text-align: center;
            padding: 20px;
            color: #718096;
            font-size: 14px;
            background: white;
            border-top: 1px solid #e2e8f0;
            z-index: 100;
        }
    </style>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="logo-container">
                <img src="<?= base_url('image/ukm-logo.png') ?>" alt="UKM Logo" class="logo-img" loading="lazy" decoding="async">
                <h1 class="logo-title">Dashboard UKM</h1>
                <p class="logo-subtitle">Universitas DR Soetomo</p>
            </div>

            <div class="nav-container">
                <nav>
                    <a href="<?= base_url('dashboard/admin') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin') ? 'active' : '' ?>">
                            <i class="fas fa-home"></i>
                            <span>Home Dashboard</span>
                        </div>
                    </a>

                    <a href="<?= base_url('dashboard/admin/struktur-ukm') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin/struktur-ukm') ? 'active' : '' ?>">
                            <i class="fas fa-sitemap"></i>
                            <span>Struktur UKM</span>
                        </div>
                    </a>

                    <a href="<?= base_url('dashboard/admin/kalender') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin/kalender') ? 'active' : '' ?>">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Kalender Agenda</span>
                        </div>
                    </a>

                    <a href="<?= base_url('dashboard/admin/list-anggota') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin/anggota') ? 'active' : '' ?>">
                            <i class="fas fa-users"></i>
                            <span>List Anggota UKM</span>
                        </div>
                    </a>

                    <a href="<?= base_url('dashboard/admin/pendaftar') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin/pendaftar') ? 'active' : '' ?>">
                            <i class="fas fa-user-plus"></i>
                            <span>List Pendaftar Anggota</span>
                        </div>
                    </a>

                    <a href="<?= base_url('dashboard/admin/tempt') ?>" style="text-decoration: none;">
                        <div class="nav-item <?= ($active_menu == 'dashboard/admin/tempt') ? 'active' : '' ?>">
                            <i class="fas fa-cog"></i>
                            <span>Temporary Page</span>
                        </div>
                    </a>

                </nav>
            </div>

            <div class="user-section-wrapper">
                <div class="user-section">
                    <div class="user-profile">
                        <img src="<?= base_url('image/Profile.png') ?>" alt="Profile" class="user-avatar">
                        <div class="user-info">
                            <span class="user-name">David Wijaya</span>
                            <span class="user-role">Admin UKM</span>
                        </div>
                    </div>
                    <!-- Logout dropdown menu -->
                    <div class="logout-menu">
                        <div class="logout-menu-item" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="page-header">

    </header>

    <footer class="page-footer">
        2025 © UKM Universitas Dr. Soetomo Surabaya
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.querySelector('.logo-img');
            if (logo) {
                logo.src = logo.src + '?v=' + Date.now(); // Cache buster
            }
        });

        function logout() {
            console.log('Logout berhasil');
            window.location.href = '/';
        }
    </script>
