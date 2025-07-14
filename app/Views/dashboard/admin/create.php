<?= $this->include('templates/sidebar-super-admin') ?>

<style>
    /* Reset dan Base Styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        border-bottom: 2px solid #3498db;
        padding-bottom: 0.5rem;
    }

    /* Form Styles */
    .form-container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }

    .form-select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        background-color: #fff;
        cursor: pointer;
    }

    /* Button Styles */
    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #2980b9;
    }

    /* Responsive */
    /* @media (max-width: 768px) {
        .container {
            margin: 1rem;
            padding: 0 0.5rem;
        }

        .form-container {
            padding: 1.5rem;
        }
    } */
</style>

<div class="container">
    <h2>Tambah User Baru</h2>

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
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama " required>
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