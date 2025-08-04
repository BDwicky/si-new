<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Anggota UKM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            margin-left: 300px;
            padding: 30px;
        }

         .badge {
        display: inline-block;
        padding: 5px 12px;
        font-size: 13px;
        font-weight: bold;
        border-radius: 20px;
        text-align: center;
        white-space: nowrap;
    }

    .badge-aktif {
        background-color: #c6f6d5; /* Hijau lembut */
        color: #22543d;
    }

    .badge-nonaktif {
        background-color: #fed7d7; /* Merah lembut */
        color: #822727;
    }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            margin-left: 30px;
        }

        .page-title {
            font-size: 24px;
            color: #2d3748;
            margin: 0;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: #4299e1;
            color: white;
            border: none;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #4299e1;
            color: #4299e1;
        }

        .search-filter {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }

        .search-box {
            flex-grow: 1;
            position: relative;
        }

        .search-input {
            width: 95%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 14px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background-color: white;
            min-width: 200px;
        }

        .members-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            /* margin-left: 300px; */
            margin-top: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .members-table thead {
            background-color: #1e2a3a;
            color: white;
        }

        .members-table th {
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
        }

        .members-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .members-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .members-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-weight: bold;
        }

        .member-name {
            display: flex;
            align-items: center;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background-color: #c6f6d5;
            color: #22543d;
        }

        .status-inactive {
            background-color: #fed7d7;
            color: #822727;
        }

        .status-pending {
            background-color: #feebc8;
            color: #7b341e;
        }

        .action-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #718096;
            font-size: 18px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            z-index: 1;
        }

        .dropdown-content a {
            color: #4a5568;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f7fafc;
        }

        .action-dropdown:hover .dropdown-content {
            display: block;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-info {
            color: #718096;
            font-size: 14px;
        }

        .pagination-controls {
            display: flex;
            gap: 10px;
        }

        .page-btn {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            background-color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .page-btn.active {
            background-color: #4299e1;
            color: white;
            border-color: #4299e1;
        }
    </style>
</head>

<body>
    <?= $this->include('templates/sidebar-admin') ?>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">List Anggota UKM</h1>
            <div class="action-buttons">
                <button class="btn btn-outline">
                    <i class="fas fa-file-export"></i> Export
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Anggota
                </button>
            </div>
        </div>

        <div class="search-filter">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari anggota...">
            </div>
            <select class="filter-select status-filter">
                <option value="">Semua Status</option>
                <option value="active">Aktif</option>
                <option value="deactive">Nonaktif</option>
            </select>
            <select class="filter-select jabatan-filter">
                <option value="">Semua Jabatan</option>
                <option value="ketua">Ketua</option>
                <option value="wakil">Wakil</option>
                <option value="sekretaris">Sekretaris</option>
                <option value="bendahara">Bendahara</option>
                <option value="anggota">Anggota</option>
            </select>
        </div>

        <table class="members-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tanggal Bergabung</th>
                    <th width="50">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($anggota as $a) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <div class="member-name"><?= esc($a['nama_user']) ?></div>
                        </td>
                        <td><?= esc($a['nim']) ?></td>
                        <td><?= esc($a['fakultas']) ?></td>
                        <td><?= esc($a['program_studi']) ?></td>
                        <td class="jabatan"><?= esc(($a['role_in_ukm'])) ?></td>
                        <td class="status" data-status="<?= esc($a['status_in_ukm']) ?>">
                            <?php if ($a['status_in_ukm'] === 'active') : ?>
                                <span class="badge badge-aktif">Aktif</span>
                            <?php elseif ($a['status_in_ukm'] === 'deactive') : ?>
                                <span class="badge badge-nonaktif">Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d M Y', strtotime($a['created_at'])) ?></td>
                        <td>
                            <?php if ($a['status_in_ukm'] === 'active') : ?>
                                <a href="<?= base_url('dashboard/ukm/anggota/deactivate/' . $a['id_member']) ?>" 
                                   class="btn-sm btn-warning" 
                                   title="Nonaktifkan Member"
                                   onclick="return confirm('Yakin ingin menonaktifkan member ini?')">
                                    <i class="fas fa-user-slash"></i> Deactivate
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url('dashboard/ukm/anggota/activate/' . $a['id_member']) ?>" 
                                   class="btn-sm btn-success" 
                                   title="Aktifkan Member"
                                   onclick="return confirm('Yakin ingin mengaktifkan member ini?')">
                                    <i class="fas fa-user-check"></i> Activate
                                </a>
                            <?php endif; ?>

                            <a href="<?= base_url('dashboard/ukm/anggota/edit-jabatan/' . $a['id_member']) ?>" 
                               class="btn-sm btn-info" 
                               title="Edit Jabatan">
                                <i class="fas fa-user-edit"></i> Edit Jabatan
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <div class="pagination-info">Menampilkan 1-5 dari 25 anggota</div>
            <div class="pagination-controls">
                <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
                <button class="page-btn">5</button>
                <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

    <script>
       function filterTable() {
    const searchTerm = document.querySelector('.search-input').value.toLowerCase();
    const selectedStatus = document.querySelector('.status-filter').value.toLowerCase();
    const selectedJabatan = document.querySelector('.jabatan-filter').value.toLowerCase();
    const rows = document.querySelectorAll('.members-table tbody tr');

    rows.forEach(row => {
        const name = row.querySelector('.member-name').textContent.toLowerCase();
        const nim = row.cells[2].textContent.toLowerCase();
        const prodi = row.cells[4].textContent.toLowerCase();
        const status = row.querySelector('.status').dataset.status.toLowerCase();
        const jabatan = row.querySelector('.jabatan').textContent.toLowerCase();

        const matchesSearch = name.includes(searchTerm) || nim.includes(searchTerm) || prodi.includes(searchTerm);
        const matchesStatus = !selectedStatus || status === selectedStatus;
        const matchesJabatan = !selectedJabatan || jabatan === selectedJabatan;

        row.style.display = (matchesSearch && matchesStatus && matchesJabatan) ? '' : 'none';
    });
}


        document.querySelector('.search-input').addEventListener('input', filterTable);
        document.querySelector('.status-filter').addEventListener('change', filterTable);
        document.querySelector('.jabatan-filter').addEventListener('change', filterTable);
    </script>
</body>


</html>