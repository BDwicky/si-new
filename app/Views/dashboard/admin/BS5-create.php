<?= $this->include('templates/sidebar-super-admin') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Tambah User Baru</h2>

    <form action="<?= base_url('dashboard/admin/store') ?>" method="post" class="p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="1">Admin</option>
                <option value="2">UKM</option>
                <option value="3">User</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama " required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="user-fields">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="mb-3">
                <label class="form-label">No.Telp</label>
                <input type="text" name="phone" class="form-control" placeholder="Masukkan No. Telp">
            </div>

            <div class="mb-3">
                <label class="form-label">Fakultas</label>
                <input type="text" name="fakultas" class="form-control" placeholder="Masukkan fakultas">
            </div>

            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <input type="text" name="program_studi" class="form-control" placeholder="Masukkan program studi">
            </div>
        </div>



        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
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