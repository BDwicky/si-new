<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Universitas Dr. Soetomo</title>
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
            /* This makes the image fill the entire container */
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 0;
            /* Remove default margin */
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
            /* background-color: rgba(245, 248, 250, 0.4); */
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
            /* Tambahkan ini */
            -webkit-backdrop-filter: blur(5px);
            /* Untuk browser WebKit */
        }

        .login-container {
            background-color: rgb(245, 248, 250);

            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #003366;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #262b40;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 15px;
        }

        .login-button:hover {
            background-color: #002244;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #003366;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
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

        /* New Creditential */
        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
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
        <div class="login-container">
            <h2 class="login-title">Login Akun</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>


            <form action="/login" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Masukkan username Anda" required>
                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <span class="error-message"><?= $validation->getError('username') ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password Anda" required>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <span class="error-message"><?= $validation->getError('password') ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="login-button">Login</button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="/register">Daftar disini</a>
            </div>
        </div>
    </div>


</body>
<div class="footer">
    2025 © UKM Universitas Dr. Soetomo Surabaya
</div>
</body>

</html>