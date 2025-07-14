<?= $this->include('templates/sidebar-super-admin') ?>

<style>
    /* Styling hanya untuk konten utama */
    .main-content {
        margin-left: 280px;
        /* Sesuaikan dengan lebar sidebar Anda */
        padding: 20px;
        margin-top: 60px;
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #3498db;
        outline: none;
    }

    .form-select {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
    }

    .btn {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
</style>

<header class="page-header">
    <h1>Tambah User Baru</h1>
</header>

<div class="main-content">

    <form action="<?= base_url('dashboard/admin/store') ?>" method="post" class="form-container">
        <div class="form-group">
            <label class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="1">Admin</option>
                <option value="2">UKM</option>
                <option value="3">User</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="user-fields" style="display: none;">
            <div class="form-group">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="form-group">
                <label class="form-label">No.Telp</label>
                <input type="text" name="phone" class="form-control" placeholder="Masukkan No. Telp">
            </div>

            <div class="form-group">
                <label class="form-label">Fakultas</label>
                <input type="text" name="fakultas" class="form-control" placeholder="Masukkan fakultas">
            </div>

            <div class="form-group">
                <label class="form-label">Program Studi</label>
                <input type="text" name="program_studi" class="form-control" placeholder="Masukkan program studi">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role_id');
        const userFields = document.querySelector('.user-fields');

        // Sembunyikan field tambahan saat pertama load
        userFields.style.display = 'none';

        roleSelect.addEventListener('change', function() {
            if (this.value == '3') {
                userFields.style.display = 'block';
            } else {
                userFields.style.display = 'none';
            }
        });
    });
</script>