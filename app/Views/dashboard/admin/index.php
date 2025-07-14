<?= $this->include('templates/sidebar-super-admin') ?>

<style>
    .table-container {
        padding-top: 50px;
        padding-left: 300px;
    }

    .table-container table {
        border-collapse: collapse;
        width: 100%;
    }

    .table-container th,
    .table-container td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table-container th {
        background-color: #1e2a3a;
        color: white;
    }

    .filter-container {
        margin-top: 50px;
        margin-bottom: 20px;
    }
</style>

<div class="table-container">
    <!-- <h1 class="mb-3">List User</h1> -->

    <div class="filter-container">
        <label for="roleFilter">Filter Role: </label>
        <select id="roleFilter" class="form-select w-auto d-inline-block">
            <option value="all">Semua</option>
            <option value="1">Admin</option>
            <option value="2">UKM</option>
            <option value="3">User</option>
        </select>

        <a href="<?= base_url('dashboard/admin/create') ?>" class="btn btn-primary btn-sm ms-3">+ Tambah User</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th class="nim-column">NIM</th>
                <th class="phone">No. Telp</th>
                <th class="fakultas-column">Fakultas</th>
                <th class="prodi-column">Program Studi</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <?php if (!empty($users)) : ?>
                <?php $no = 1;
                foreach ($users as $user) : ?>
                    <tr data-role="<?= esc($user['role_id']) ?>">
                        <td><?= $no++ ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td class="nim-column"><?= esc($user['nim']) ?></td>
                        <td class="phone"><?= esc($user['phone']) ?></td>
                        <td class="fakultas-column"><?= esc($user['fakultas']) ?></td>
                        <td class="prodi-column"><?= esc($user['program_studi']) ?></td>
                        <td>
                            <?php
                            switch ($user['role_id']) {
                                case 1:
                                    echo 'Admin';
                                    break;
                                case 2:
                                    echo 'UKM';
                                    break;
                                case 3:
                                    echo 'User';
                                    break;
                                default:
                                    echo 'Tidak diketahui';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url('dashboard/admin/edit/' . $user['id']) ?>">Edit</a> |

                            <form action="<?= base_url('dashboard/admin/delete/' . $user['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleFilter = document.getElementById('roleFilter');
        const rows = document.querySelectorAll('#userTable tr');

        const nimColumns = document.querySelectorAll('.nim-column');
        const fakultasColumns = document.querySelectorAll('.fakultas-column');
        const prodiColumns = document.querySelectorAll('.prodi-column');

        roleFilter.addEventListener('change', function() {
            const selectedRole = this.value;

            // Tampilkan/sembunyikan baris data sesuai role
            rows.forEach(row => {
                const roleId = row.getAttribute('data-role');

                if (selectedRole === 'all' || roleId === selectedRole) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Tampilkan/sembunyikan kolom NIM, Fakultas, Prodi
            if (selectedRole == '1' || selectedRole == '2') {
                nimColumns.forEach(el => el.style.display = 'none');
                fakultasColumns.forEach(el => el.style.display = 'none');
                prodiColumns.forEach(el => el.style.display = 'none');
            } else {
                nimColumns.forEach(el => el.style.display = '');
                fakultasColumns.forEach(el => el.style.display = '');
                prodiColumns.forEach(el => el.style.display = '');
            }
        });
    });
</script>