<!DOCTYPE html>
<html>

<head>
    <title>Daftar UKM</title>
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
            /* height: 100vh; */
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

        /* Card Container */
        .ukm-card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin: 50px auto 0;
            max-width: calc(100% - 50px);
            /* Prevents touching screen edges */
            justify-items: center;
            /* Centers items horizontally in their grid cells */
            padding: 0 25px;
            /* Ensures proper spacing on smaller screens */
        }

        /* Card Styling */
        .ukm-card {
            width: 300px;
            height: 450px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            text-decoration: none;
            color: inherit;
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

        .status-pending {
            background: #FFD700;
            /* Yellow */
            color: rgb(0, 0, 0);
        }

        .status-inactive {
            background: #FF6B6B;
            /* Red */
            color: rgb(0, 0, 0);

        }

        .status-anggota {
            background: #77DD77;
            /* Green */
            color: rgb(0, 0, 0);

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
    </style>
</head>

<body>
    <!-- Include your sidebar -->
    <?= $this->include('templates/sidebar-admin') ?>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Daftar UKM</h1>
        </div>


        <div class="ukm-card-container">
            <!-- UKM Card 1 - Pending -->
            <a href="<?= base_url('dashboard/admin') ?>" class="ukm-card">
                <span class="ukm-status status-pending">Pending</span>
                <div class="ukm-image-container">
                    <img src="<?= base_url('image/ukm/pencak-silat.png') ?>" alt="Pencak Silat" class="ukm-image">
                </div>
                <div class="ukm-content">
                    <div class="ukm-name">UKM PENCAK SILAT (PSHT)</div>
                </div>
            </a>

            <!-- UKM Card 2 - Inactive -->
            <a href="<?= base_url('dashboard/admin') ?>" class="ukm-card">
                <span class="ukm-status status-inactive">Inactive</span>
                <div class="ukm-image-container">
                    <img src="<?= base_url('image/ukm/futsal.png') ?>" alt="Futsal" class="ukm-image">
                </div>
                <div class="ukm-content">
                    <div class="ukm-name">UKM Futsal</div>
                </div>
            </a>

            <!-- UKM Card 3 - Anggota -->
            <a href="<?= base_url('dashboard/admin') ?>" class="ukm-card">
                <span class="ukm-status status-anggota">Anggota</span>
                <div class="ukm-image-container">
                    <img src="<?= base_url('image/ukm/volly.png') ?>" alt="Bola Volly" class="ukm-image">
                </div>
                <div class="ukm-content">
                    <div class="ukm-name">UKM Bola Volly</div>
                </div>
            </a>

            <!-- UKM Card 4 - Pending -->
            <a href="<?= base_url('dashboard/admin') ?>" class="ukm-card">
                <span class="ukm-status status-pending">Pending</span>
                <div class="ukm-image-container">
                    <img src="<?= base_url('image/ukm/catur.jpg') ?>" alt="Catur" class="ukm-image">
                </div>
                <div class="ukm-content">
                    <div class="ukm-name">UKM Catur</div>
                </div>
            </a>



        </div>
    </div>

</body>

</html>