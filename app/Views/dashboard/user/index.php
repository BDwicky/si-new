<?= $this->include('templates/sidebar-user') ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar UKM</title>
  <style>
    body {
      background: #f8fbfd;
      font-family: Arial, sans-serif;
      padding: 2rem;
      margin-left: 300px;
      margin-top: 100px;
    }

    .watermark {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%) rotate(-20deg);
          font-size: 32px;
          font-weight: bold;
          color: rgba(255, 0, 0, 0.2); /* Merah transparan */
          pointer-events: none;
          z-index: 5;
          text-transform: uppercase;
        }
        
    h2 {
      font-weight: bold;
      margin-bottom: 2rem;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 5rem;
      /* jarak antar card */
    }

    .col-md-4 {
      flex: 1 1 300px;
      max-width: 300px;
    }

    .card {
      position: relative;
      border: 1px solid #000;
      border-radius: 15px;
      padding: 1.5rem;
      background: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: transform 0.2s ease;
      width: 300px;
      /* Lebar fix */
      height: 450px;
      /* Tinggi fix */
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      /* Vertikal tengah */
      align-items: center;
      /* Horizontal tengah */
      text-align: center;
      height: 100%;
      /* Isi full tinggi kartu */
    }

    .badge {
      position: absolute;
      top: 15px;
      left: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 120px;
      height: 40px;
      border-radius: 30px;
      font-size: 0.9rem;
      font-weight: 600;
      text-align: center;
      color: #000;
      border: 1px solid #000;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
      font-weight: 600;
      font-size: 22px;
      margin-bottom: 10px;
    }

    .card-icon {
      width: 220px;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 64px;
      margin: 1rem 0 2rem 0;
      /* Bawah lebih besar */
    }

    .bg-success {
      background: #00b96b;
    }

    .bg-warning {
      background: #f4e04d;
    }

    .bg-danger {
      background: #e63946;
    }

    .bg-secondary {
      background: #999;
    }

    .alert-card {
      width: 300px;
      height: 450px;
      background: #e6f4f9;
      /* Biru lembut */
      color: #31708f;
      border-radius: 12px;
      border: 1px solid #4299e1;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);

      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      text-align: center;
      padding: 2rem;

      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      line-height: 1.6;
    }



    .page-header {
      position: fixed;
      top: 0;
      left: 280px;
      right: 0;
      height: 60px;
      background: white;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      padding: 0 20px;
      z-index: 100;
    }
  </style>
</head>

<header class="page-header">
  <h1> Daftar UKM yang Anda Ikuti </h1>
</header>

<body>



  <?php if (!empty($ukms)) : ?>
    <div class="row">
      <?php foreach ($ukms as $ukm) : ?>
        <div class="col-md-4">
  <div class="card shadow-sm position-relative">
    <?php if ($ukm['status_in_ukm'] === 'deactive') : ?>
      <div class="watermark">DEACTIVE</div>
    <?php endif; ?>

    <div class="card-body">
      <!-- Badge status pendaftaran -->
      <?php if ($ukm['status'] == 'approved') : ?>
        <span class="badge bg-success">Anggota</span>
      <?php elseif ($ukm['status'] == 'pending') : ?>
        <span class="badge bg-warning text-dark">Pending</span>
      <?php elseif ($ukm['status'] == 'rejected') : ?>
        <span class="badge bg-danger">Ditolak</span>
      <?php endif; ?>

      <!-- Ikon -->
      <div class="card-icon">
        <?php
        if (strpos(strtolower($ukm['name']), 'silat') !== false) {
          echo '<img src="' . base_url('image/ukm/pencak-silat.png') . '" alt="Silat" />';
        } elseif (strpos(strtolower($ukm['name']), 'futsal') !== false) {
          echo '<img src="' . base_url('image/ukm/futsal.png') . '" alt="Futsal" />';
        } elseif (strpos(strtolower($ukm['name']), 'volly') !== false) {
          echo '<img src="' . base_url('image/ukm/volly.png') . '" alt="Volly" />';
        } elseif (strpos(strtolower($ukm['name']), 'catur') !== false) {
          echo '<img src="' . base_url('image/ukm/catur.png') . '" alt="Catur" />';
        } else {
          echo '<img src="' . base_url('image/ukm/default.png') . '" alt="UKM" />';
        }
        ?>
      </div>

      <h5 class="card-title"><?= $ukm['name'] ?></h5>
    </div>
  </div>
</div>

      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <div class="alert-card">
      <i class="fas fa-info-circle" style="font-size: 40px; color: #4299e1; margin-bottom: 1rem;"></i>
      Anda belum mengikuti UKM mana pun.
    </div>

  <?php endif; ?>

</body>

</html>
</body>

</html>