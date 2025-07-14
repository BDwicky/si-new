<?= $this->include('templates/sidebar-super-admin') ?>
<div class="container mt-5" style="padding-left: 300px; padding-top:50px;">
    <h2>Edit User</h2>

    <form action="<?= base_url('dashboard/admin/update/' . $user['id']) ?>" method="post" class="p-4 rounded shadow-sm bg-light">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="<?= esc($user['name']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" value="<?= esc($user['nim']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">No. Telp</label>
            <input type="text" name="phone" value="<?= esc($user['phone']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <input type="text" name="fakultas" value="<?= esc($user['fakultas']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" name="program_studi" value="<?= esc($user['program_studi']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role_id" class="form-select" required>
                <option value="1" <?= $user['role_id'] == 1 ? 'selected' : '' ?>>Admin</option>
                <option value="2" <?= $user['role_id'] == 2 ? 'selected' : '' ?>>UKM</option>
                <option value="3" <?= $user['role_id'] == 3 ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Password <small>(Kosongkan jika tidak ingin mengubah)</small></label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('dashboard/admin') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>