<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran UKM TEst</title>
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

        .btn-success {
            background-color: #48bb78;
            color: white;
            border: none;
        }

        .btn-danger {
            background-color: #f56565;
            color: white;
            border: none;
        }



        .bulk-actions {
            display: flex;
            gap: 10px;
        }

        .search-filter {
            display: flex;
            gap: 15px;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 8px 15px 8px 35px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 14px;
            width: 250px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }

        .registrations-table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 50px;
            /* margin-left: 300px; */
            /* opsional, kalau layout pakai sidebar */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid #edf2f7;
            align-items: center;
        }

        .registrations-table {
            width: 100%;
            border-collapse: collapse;
        }

        .registrations-table thead {
            background-color: #1e2a3a;
            color: white;
        }

        .registrations-table th {
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }

        .registrations-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            vertical-align: middle;
            font-size: 14px;
        }

        .registrations-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .registrations-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .select-checkbox {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .applicant-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .applicant-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-weight: bold;
        }

        .applicant-name {
            font-weight: 600;
            color: #2d3748;
        }

        .applicant-nim {
            font-size: 13px;
            color: #718096;
            margin-top: 3px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-pending {
            background-color: #feebc8;
            color: #b77905;
        }

        .status-approved {
            background-color: #c6f6d5;
            color: #22543d;
        }

        .status-rejected {
            background-color: #fed7d7;
            color: #9b2c2c;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            color: white;
            font-size: 14px;
        }

        .btn-approve {
            background-color: #48bb78;
        }

        .btn-reject {
            background-color: #f56565;
        }

        .btn-view {
            background-color: #4299e1;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-top: 1px solid #edf2f7;
        }

        .pagination-info {
            color: #718096;
            font-size: 14px;
        }

        .pagination-controls {
            display: flex;
            gap: 8px;
        }

        .page-btn {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            background-color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .page-btn.active {
            background-color: #4299e1;
            color: white;
            border-color: #4299e1;
        }
    </style>
</head>

<body>
    <!-- Include Sidebar -->
    <?= $this->include('templates/sidebar-admin') ?>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Pendaftaran Anggota UKM</h1>
            <div class="action-buttons">
                <button class="btn btn-outline">
                    <i class="fas fa-file-export"></i> Export Data
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filter Lanjutan
                </button>
            </div>
        </div>

        <div class="registrations-table-container">
            <div class="table-controls">
                <div class="bulk-actions">
                    <select class="bulk-select" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #e2e8f0;">
                        <option>Aksi Massal</option>
                        <option>Setujui yang dipilih</option>
                        <option>Tolak yang dipilih</option>
                        <option>Hapus yang dipilih</option>
                    </select>
                    <button class="btn btn-outline" style="padding: 8px 12px;">
                        Terapkan
                    </button>
                </div>
                <div class="search-filter">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Cari pendaftar...">
                    </div>
                    <select class="filter-select" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #e2e8f0; min-width: 150px;">
                        <option>Semua UKM</option>
                        <option>UKM Futsal</option>
                        <option>UKM Pencak Silat</option>
                        <option>UKM Bola Volly</option>
                        <option>UKM Catur</option>
                    </select>
                    <select class="filter-select" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #e2e8f0; min-width: 150px;">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Disetujui</option>
                        <option>Ditolak</option>
                    </select>
                </div>
            </div>

            <table class="registrations-table">
                <thead>
                    <tr>
                        <th width="40"><input type="checkbox" class="select-checkbox"></th>
                        <th>Nama Pendaftar</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($anggota)) : ?>
                        <?php foreach ($anggota as $row) : ?>
                            <tr>
                                <td><input type="checkbox" class="select-checkbox"></td>
                                <td>
                                    <div class="applicant-info">
                                        <div class="applicant-avatar">
                                            <?= strtoupper(substr($row['nama_user'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="applicant-name"><?= esc($row['nama_user']) ?></div>
                                            <div class="applicant-nim"><?= esc($row['nim']) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= esc($row['fakultas']) ?></td>
                                <td><?= esc($row['program_studi']) ?></td>
                                <td><?= date('d/m/Y', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <span class="status-badge status-pending">
                                        Menunggu
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn btn-approve" data-id="<?= $row['id_member'] ?>" title="Setujui">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="action-btn btn-reject" data-id="<?= $row['id_member'] ?>" title="Tolak">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">Tidak ada pendaftar ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="pagination">
                <div class="pagination-info">
                    Menampilkan 1-5 dari 23 pendaftar
                </div>
                <div class="pagination-controls">
                    <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Basic functionality for the table
        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkbox
            const selectAll = document.querySelector('thead .select-checkbox');
            const checkboxes = document.querySelectorAll('tbody .select-checkbox');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });

            // Approve/Reject buttons
            document.querySelectorAll('.btn-approve').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const row = this.closest('tr');

                    fetch('<?= base_url("ukm/setujui") ?>', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${id}`
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                row.querySelector('.status-badge').className = 'status-badge status-approved';
                                row.querySelector('.status-badge').textContent = 'Disetujui';
                            }
                        });
                });
            });

            document.querySelectorAll('.btn-reject').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const row = this.closest('tr');

                    fetch('<?= base_url("ukm/tolak") ?>', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${id}`
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                row.querySelector('.status-badge').className = 'status-badge status-rejected';
                                row.querySelector('.status-badge').textContent = 'Ditolak';
                            }
                        });
                });
            });


            // Search functionality
            const searchInput = document.querySelector('.search-input');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const name = row.querySelector('.applicant-name').textContent.toLowerCase();
                    const nim = row.querySelector('.applicant-nim').textContent.toLowerCase();
                    const ukm = row.cells[2].textContent.toLowerCase();

                    if (name.includes(searchTerm) || nim.includes(searchTerm) || ukm.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>