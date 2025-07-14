<?= $this->include('templates/sidebar-super-admin') ?>
<style>
    .table-container {
    padding-top: 50px;
    padding-left: 300px;
}
</style>
<div class="table-container">
    <h1>List User</h1>
    <a href="<?= base_url('dashboard/admin/create') ?>">Tambah User</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>NIM</th>
            <th>Fakultas</th>
            <th>Program Studi</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)) : ?>
            <?php $no = 1; foreach ($users as $user) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['nim']) ?></td>
                    <td><?= esc($user['fakultas']) ?></td>
                    <td><?= esc($user['program_studi']) ?></td>
                    <td>
                        <?php 
                            switch($user['role_id']) {
                                case 1: echo 'Admin'; break;
                                case 2: echo 'UKM'; break;
                                case 3: echo 'User'; break;
                                default: echo 'Tidak diketahui';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url('dashboard/admin/edit/' . $user['id']) ?>">Edit</a> |
                        <a href="<?= base_url('dashboard/admin/delete/' . $user['id']) ?>" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="9" align="center">Data belum ada.</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
</div>
