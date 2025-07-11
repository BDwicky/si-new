<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Tambah Mahasiswa</h1>

<form action="<?= base_url('mahasiswa/store') ?>" method="post">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
