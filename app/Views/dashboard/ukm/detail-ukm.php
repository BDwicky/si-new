<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($ukm['name']) ?> - Detail UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><?= esc($ukm['name']) ?></h3>
                <small>Kategori: <?= esc($ukm['kategori']) ?></small>
            </div>
            <div class="card-body">
                <h5 class="card-title">Tentang UKM</h5>
                <p class="card-text"><?= esc($ukm['deskripsi']) ?></p>

                <div class="mb-3">
                    <span class="badge bg-success">
                        <i class="fas fa-users me-1"></i> <?= esc($jumlah_anggota) ?> Anggota Aktif
                    </span>
                </div>

                <?php if (session()->has('id_user')): ?>
                    <button id="btn-daftar" class="btn btn-outline-primary">
                        <i class="fas fa-user-plus me-1"></i> Daftar Sebagai Anggota
                    </button>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-secondary">
                        <i class="fas fa-sign-in-alt me-1"></i> Login untuk Daftar
                    </a>
                <?php endif; ?>
            </div>
            <div class="card-footer text-muted">
                Terakhir diperbarui: <?= date('d M Y H:i', strtotime($ukm['updated_at'])) ?>
            </div>
        </div>
    </div>

    <!-- Notifikasi SweetAlert dari Session Flashdata -->
    <script>
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
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, daftar',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?= base_url('ukm/daftar/' . $ukm['id']) ?>";
                        }
                    });
                });
            }
        });
    </script>

</body>

</html>