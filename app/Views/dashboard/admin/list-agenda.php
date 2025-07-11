<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
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
            margin-top: 40px;
            margin-left: 300px;
            /* Increased from 250px */
            padding: 30px;
            flex: 1;
        }
    </style>
</head>

<body>
    <!-- Load Sidebar -->
    <?= $this->include('templates/sidebar-admin') ?>

    <!-- Konten Utama -->
    <div class="main-content">
        <h1>List Agenda</h1>
    </div>
</body>

</html>