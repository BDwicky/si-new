<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Edit Mahasiswa</h1>

<form action="<?= base_url('mahasiswa/update/'.$mahasiswa['id']) ?>" method="post">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $mahasiswa['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" value="<?= $mahasiswa['nim'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $mahasiswa['alamat'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
