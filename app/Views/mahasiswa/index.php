<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Daftar Mahasiswa</h1>

    <a href="<?= base_url('/mahasiswa/create') ?>" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($mahasiswa)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($mhs['nama']) ?></td>
                        <td><?= esc($mhs['nim']) ?></td>
                        <td><?= esc($mhs['alamat']) ?></td>
                        <td>
                            <a href="<?= base_url('/mahasiswa/edit/' . $mhs['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('/mahasiswa/delete/' . $mhs['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
