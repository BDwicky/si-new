<?= $this->include('templates/sidebar-super-admin') ?>
<style>
    .table-container {
        padding-top: 30px;
        margin-left: 300px;
        margin-right: 20px;
    }

    .table-container table {
        border-collapse: collapse;
        width: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-top: 50px;
    }

    .table-container th,
    .table-container td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    .table-container thead {
        background-color: #1e2a3a;
        color: white;
    }

    .table-container tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-container tbody tr:hover {
        background-color: #f1f1f1;
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

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama UKM</th>
                <th>Jumlah Anggota</th>
                <th>Dibentuk</th>
            </tr>
        </thead>
        <tbody id="ukmTable">
            <?php if (!empty($ukms)) : ?>
                <?php $no = 1;
                foreach ($ukms as $ukm) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($ukm['name']) ?></td>
                        <td><?= esc($ukm['jumlah_anggota']) ?></td>
                        <td><?= date('d M Y', strtotime($ukm['created_at'])) ?></td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" align="center">Data belum ada.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>