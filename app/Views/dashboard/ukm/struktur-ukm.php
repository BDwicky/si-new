<!DOCTYPE html>
<html>

<head>
    <title>Dashboard </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Main Layout */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            margin-left: 300px;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            margin-left: 30px;
        }

        .page-title {
            font-size: 24px;
            color: #2d3748;
            margin: 0;
        }

        /* Content Layout */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .top-section {
            display: flex;
            gap: 30px;
            margin-top: 40px;
        }

        .ukm-card-container {
            flex: 0 0 300px;
        }

        .structure-container {
            flex: 1;
        }

        /* Card Styling */
        .ukm-card {
            width: 100%;
            height: 450px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            pointer-events: none;
            cursor: default;
        }

        /* Status Badge */
        .ukm-status {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 6px 15px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 600;
            z-index: 1;
        }

        /* Image Container */
        .ukm-image-container {
            width: 100%;
            height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
            background: #f8f9fa;
        }

        .ukm-image {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Content Area */
        .ukm-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .ukm-name {
            font-size: 20px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
        }

        /* Table Styling */
        .structure-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .structure-table th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
        }

        .structure-table td {
            padding: 12px;
            border-bottom: 1px solid #ecf0f1;
        }

        /* Kaderisasi Section */
        .kaderisasi-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .kaderisasi-header {
            background: #2c3e50;
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            margin: 0;
        }

        .division-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .division {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .division h3 {
            color: #3498db;
            margin-top: 0;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .member-list {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .member-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .member-list li:last-child {
            border-bottom: none;
        }

        .leader {
            font-weight: 600;
            color: #2c3e50;
            background: #e3f2fd;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 8px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- Include your sidebar -->
    <?= $this->include('templates/sidebar-admin') ?>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Struktur Anggota UKM</h1>
        </div>

        <div class="content-wrapper">
            <div class="top-section">
                <div class="ukm-card-container">
                    <!-- UKM Card 1 - Pending -->
                    <a class="ukm-card">
                        <div class="ukm-image-container">
                            <img src="<?= base_url('image/ukm/futsal.png') ?>" alt="Futsal" class="ukm-image">
                        </div>
                        <div class="ukm-content">
                            <div class="ukm-name">UKM Futsal</div>
                        </div>
                    </a>
                </div>

                <div class="structure-container">
                    <!-- Main Structure Table -->
                    <table class="structure-table">
                        <tr>
                            <th>Anggota</th>
                            <th>Penanggung Jawab</th>
                        </tr>
                        <tr>
                            <td>Pembina</td>
                            <td>Mika Tandiling, S.Th., M.T.<br>
                                Sry Yunaru, S.H., M.Cs.<br>
                                Ari Nugraha Putra</td>
                        </tr>
                        <tr>
                            <td>Badan Pendiri</td>
                            <td>Hamsyari<br>
                                Rio Wahyudi<br>
                                Muhammad Ramadhan S<br>
                                Rudy Fohriandiga<br>
                                Dhara</td>
                        </tr>
                        <tr>
                            <td>Ketua Umum</td>
                            <td>Saintal Abidin</td>
                        </tr>
                        <tr>
                            <td>Wakil Ketua Umum</td>
                            <td>Agustamil</td>
                        </tr>
                        <tr>
                            <td>Sekretaris</td>
                            <td>Jaili</td>
                        </tr>
                        <tr>
                            <td>Bendahara</td>
                            <td>Mitra Reski Juliani</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Kaderisasi Section - Now below both card and table -->
            <div class="kaderisasi-section">
                <h2 class="kaderisasi-header">Divisi Kaderisasi</h2>

                <div class="division-container">
                    <div class="division">
                        <h3>Divisi Humas</h3>
                        <ul class="member-list">
                            <li><span class="leader">Ketua Divisi</span><br>[Nama Ketua]</li>
                            <li>Anggota: [Nama Anggota 1]</li>
                            <li>Anggota: [Nama Anggota 2]</li>
                            <li>Anggota: [Nama Anggota 3]</li>
                        </ul>
                    </div>

                    <div class="division">
                        <h3>Divisi Kasekretarian</h3>
                        <ul class="member-list">
                            <li><span class="leader">Ketua Divisi</span><br>[Nama Ketua]</li>
                            <li>Anggota: [Nama Anggota 1]</li>
                            <li>Anggota: [Nama Anggota 2]</li>
                        </ul>
                    </div>

                    <div class="division">
                        <h3>Divisi Dana</h3>
                        <ul class="member-list">
                            <li><span class="leader">Ketua Divisi</span><br>[Nama Ketua]</li>
                            <li>Anggota: [Nama Anggota 1]</li>
                            <li>Anggota: [Nama Anggota 2]</li>
                        </ul>
                    </div>

                    <div class="division">
                        <h3>Divisi Sarana & Perlengkapan</h3>
                        <ul class="member-list">
                            <li><span class="leader">Ketua Divisi</span><br>[Nama Ketua]</li>
                            <li>Anggota: [Nama Anggota 1]</li>
                            <li>Anggota: [Nama Anggota 2]</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>