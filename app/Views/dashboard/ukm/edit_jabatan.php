<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-jabatan-wrapper {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .edit-jabatan-wrapper h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }

        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <div class="edit-jabatan-wrapper">
        <h2><?= esc($title) ?></h2>

        <form action="<?= base_url('dashboard/ukm/anggota/update-jabatan/' . $anggota['id']) ?>" method="post">
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Anggota</label>
                <input type="text" class="form-control" value="<?= esc($anggota['nama_user']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="role_in_ukm" class="form-label">Jabatan</label>
                <select name="role_in_ukm" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="Ketua" <?= $anggota['role_in_ukm'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                    <option value="Wakil Ketua" <?= $anggota['role_in_ukm'] == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                    <option value="Sekretaris" <?= $anggota['role_in_ukm'] == 'Sekretaris' ? 'selected' : '' ?>>Sekretaris</option>
                    <option value="Bendahara" <?= $anggota['role_in_ukm'] == 'Bendahara' ? 'selected' : '' ?>>Bendahara</option>
                    <option value="Anggota" <?= $anggota['role_in_ukm'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('/dashboard/ukm/list-anggota') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>


</html>