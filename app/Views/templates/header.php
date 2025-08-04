<?php $session = session(); ?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <i class="fas fa-chart-line me-2"></i>SI UKM
        </a>
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

            <?php if ($session->get('id_user')): ?>
                <?php
                $role = $session->get('role');
                $dashboardUrl = '';

                if ($role == 1) {
                    $dashboardUrl = 'dashboard/admin';
                } elseif ($role == 2) {
                    $dashboardUrl = 'dashboard/ukm';
                } elseif ($role == 3) {
                    $dashboardUrl = 'dashboard/user';
                } else {
                    $dashboardUrl = 'akses-ditolak';
                }
                ?>
                <button class="btn btn-primary ms-3" onclick="window.location.href='<?= base_url($dashboardUrl) ?>'">Dashboard</button>
            <?php else: ?>
                <button class="btn btn-primary ms-3" onclick="window.location.href='<?= base_url('login') ?>'">Login</button>
            <?php endif; ?>

        </div>
    </div>
</nav>