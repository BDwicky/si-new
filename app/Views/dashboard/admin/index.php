<?= $this->include('templates/sidebar-super-admin') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .table-container {
        padding-top: 30px;
        margin-left: 300px;
        margin-right: 20px;
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
        margin: 50px 0 20px;
        padding: 20px;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .filter-container label {
        font-weight: 600;
        color: #2c3e50;
        margin-right: 8px;
        font-size: 14px;
    }

    .filter-select {
        padding: 10px 15px;
        border: 2px solid #dfe6e9;
        border-radius: 8px;
        background-color: white;
        font-size: 14px;
        color: #2d3436;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .filter-select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    .btn-add-user {
        padding: 10px 20px;
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 10px rgba(52, 152, 219, 0.3);
        text-decoration: none;
    }

    .btn-add-user:hover {
        background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
    }

    .btn-add-user:active {
        transform: translateY(0);
    }
</style>



<header class="page-header">
    <h1>List Akun</h1>
</header>
<div class="table-container">
    <!-- <h1 class="mb-3">List User</h1> -->

    <div class="filter-container">
        <label for="roleFilter">Filter Role:</label>
        <select id="roleFilter" class="filter-select">
            <option value="all">Semua Role</option>
            <option value="1">Admin</option>
            <option value="2">UKM</option>
            <option value="3">User</option>
        </select>

        <a href="<?= base_url('dashboard/admin/create') ?>" class="btn-add-user">
            <i class="fas fa-plus-circle"></i> Tambah User Baru
        </a>
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


                        <td style="text-align: center; vertical-align: middle;">
                            <div style="display: inline-flex; align-items: center; gap: 8px;">
                                <!-- Edit Button -->
                                <a href="<?= base_url('dashboard/admin/edit/' . $user['id']) ?>"
                                    class="btn-edit"
                                    style="padding: 5px 12px; background-color: #3498db; color: white; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                    <i class="fas fa-pencil-alt" style="font-size: 12px;"></i> Edit
                                </a>

                                <!-- Separator -->
                                <span style="color: #ddd;">|</span>

                                <!-- Delete Form -->
                                <form action="<?= base_url('dashboard/admin/delete/' . $user['id']) ?>"
                                    method="post"
                                    style="display: inline; margin: 0;"
                                    onsubmit="return confirm('Yakin ingin hapus?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field() ?>
                                    <button type="submit"
                                        class="btn-delete"
                                        style="padding: 5px 12px; background-color: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; gap: 4px;">
                                        <i class="fas fa-trash-alt" style="font-size: 12px;"></i> Hapus
                                    </button>
                                </form>
                            </div>
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