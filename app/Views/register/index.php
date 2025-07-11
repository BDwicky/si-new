<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Universitas Dr. Soetomo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            min-height: 100vh;
            background-image: url('<?= base_url('image/bg-luar.png') ?>');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0);
            z-index: -1;
        }

        .header {
            background-color: rgba(245, 248, 250, 0.6);
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            z-index: 10;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            border-radius: 50%;
            overflow: hidden;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .university-name {
            color: #002244;
            background-color: transparent;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .university-name h1 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .university-name h2 {
            font-size: 16px;
            font-weight: normal;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: rgba(38, 43, 64, 0.35);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .register-container {
            background-color: rgb(245, 248, 250);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            /* Lebarkan container */
        }

        .register-title {
            text-align: center;
            margin-bottom: 25px;
            color: #003366;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .register-button {
            width: 100%;
            padding: 12px;
            background-color: #262b40;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .register-button:hover {
            background-color: #002244;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #003366;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            padding: 15px;
            color: #002244;
            font-size: 14px;
            background-color: rgba(172, 176, 185, 0.8);
            width: 100%;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 3px;
            display: block;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .form-columns {
            display: flex;
            gap: 20px;
        }

        .form-column {
            flex: 1;
        }

        .compact-row {
            display: flex;
            gap: 15px;
        }

        .compact-row .form-group {
            flex: 1;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="header" style="cursor: pointer;" onclick="window.location.href='/'">
        <div class="logo">
            <img src="<?= base_url('image/logo-unv.png') ?>" alt="UKM Logo" class="logo-img" loading="lazy" decoding="async">
        </div>
        <div class="university-name">
            <h1>UNIVERSITAS DR. SOETOMO</h1>
            <h2>Unit Kegiatan Mahasiswa</h2>
        </div>
    </div>

    <div class="main-content">
        <div class="register-container">
            <h2 class="register-title">Registrasi Akun Baru</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="/register" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="form-columns">
                    <div class="form-column">
                        <!-- Kolom Pertama -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-input" placeholder="Username" required>
                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                <span class="error-message"><?= $validation->getError('username') ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Nama lengkap" required>
                            <?php if (isset($validation) && $validation->hasError('fullname')): ?>
                                <span class="error-message"><?= $validation->getError('fullname') ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Email aktif" required>
                            <?php if (isset($validation) && $validation->hasError('email')): ?>
                                <span class="error-message"><?= $validation->getError('email') ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="compact-row">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" id="nim" name="nim" class="form-input" placeholder="Nomor NIM" required>
                                <?php if (isset($validation) && $validation->hasError('nim')): ?>
                                    <span class="error-message"><?= $validation->getError('nim') ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="phone">No. HP</label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="0812..." required>
                                <?php if (isset($validation) && $validation->hasError('phone')): ?>
                                    <span class="error-message"><?= $validation->getError('phone') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-column">
                        <!-- Kolom Kedua -->
                        <div class="form-group">
                            <label for="faculty">Fakultas</label>
                            <select id="faculty" name="faculty" class="form-input" required>
                                <option value="">Pilih Fakultas</option>
                                <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                                <option value="Fakultas Hukum">Fakultas Hukum</option>
                                <option value="Fakultas Teknik">Fakultas Teknik</option>
                                <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                <option value="Fakultas Ilmu Komunikasi">Fakultas Ilmu Komunikasi</option>
                                <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('faculty')): ?>
                                <span class="error-message"><?= $validation->getError('faculty') ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="study_program">Program Studi</label>
                            <input type="text" id="study_program" name="study_program" class="form-input" placeholder="Program studi" required>
                            <?php if (isset($validation) && $validation->hasError('study_program')): ?>
                                <span class="error-message"><?= $validation->getError('study_program') ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="compact-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                                <?php if (isset($validation) && $validation->hasError('password')): ?>
                                    <span class="error-message"><?= $validation->getError('password') ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Konfirmasi</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-input" placeholder="Ulangi password" required>
                                <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                                    <span class="error-message"><?= $validation->getError('confirm_password') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="register-button">Daftar Sekarang</button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="/login">Login disini</a>
            </div>
        </div>
    </div>

    <div class="footer">
        2025 © UKM Universitas Dr. Soetomo Surabaya
    </div>
</body>

</html>