<?= $this->include('templates/sidebar-super-admin') ?>
<style>
    .table-container table {
        border-collapse: collapse;
        width: 100%;
    }

    table {
        /* width: 100%; */
        border-collapse: collapse;
        margin-top: 50px;
        padding: 30px;
        margin-left: 300px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    thead {
        background-color: #3498db;
        color: white;
    }

    th,
    td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-container {
        padding-top: 30px;
        /* margin-left: 300px; */
        margin-right: 20px;
    }

    .table-container th {
        background-color: #1e2a3a;
        color: white;
        /* font-style: italic; */
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