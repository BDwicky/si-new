<?= $this->include('templates/sidebar-super-admin') ?>

<style>
    /* Styling untuk konten utama */
    .main-content {
        margin-left: 270px;
        padding: 30px;
        margin-top: 50px;
        transition: all 0.3s ease;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    .btn {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
    }


    .page-header {
        margin-bottom: 30px;
    }

    /* Animasi untuk field tambahan */
    .user-fields {
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .user-fields.show {
        max-height: 1000px;
        opacity: 1;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px dashed #eee;
    }
</style>

<header class="page-header">
    <h1>Tambah User Baru</h1>
</header>

<div class="main-content">
    <form action="<?= base_url('dashboard/admin/store') ?>" method="post" class="form-container">
        <div class="form-group">
            <label class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="1">Admin</option>
                <option value="2">UKM</option>
                <option value="3">User (Mahasiswa)</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="phone" class="form-control" placeholder="Masukkan nomor telepon" required>
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
        </div>

        <div class="user-fields" id="userFields">
            <div class="form-group">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" >
            </div>

            <div class="form-grid">
                        <div class="form-group">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <select id="fakultas" name="fakultas" class="form-input">
                                <option value="">Fakultas</option>
                                <option value="Fakultas Ekonomi dan Bisnis" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Ekonomi dan Bisnis') ? 'selected' : '' ?>>Fakultas Ekonomi dan Bisnis</option>
                                <option value="Fakultas Hukum" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Hukum') ? 'selected' : '' ?>>Fakultas Hukum</option>
                                <option value="Fakultas Teknik" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Teknik') ? 'selected' : '' ?>>Fakultas Teknik</option>
                                <option value="Fakultas Kedokteran" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Kedokteran') ? 'selected' : '' ?>>Fakultas Kedokteran</option>
                                <option value="Fakultas Psikologi" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Psikologi') ? 'selected' : '' ?>>Fakultas Psikologi</option>
                                <option value="Fakultas Ilmu Komunikasi" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Ilmu Komunikasi') ? 'selected' : '' ?>>Fakultas Ilmu Komunikasi</option>
                                <option value="Fakultas Pertanian" <?= (isset($user['fakultas']) && $user['fakultas'] == 'Fakultas Pertanian') ? 'selected' : '' ?>>Fakultas Pertanian</option>
                            </select>
                        </div>


                        <!-- Program Studi -->
                        <div class="form-group">
                            <label for="program_studi" class="form-label">Progam Studi</label>
                            <select id="program_studi" name="program_studi" class="form-input">
                                <option value="">Program Studi</option>
                            </select>
                        </div>
                    </div>
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Buat password minimal 8 karakter" required>
            <small class="text-muted" style="display: block; margin-top: 5px; color: #777;">Gunakan kombinasi huruf, angka, dan simbol</small>
        </div>

        <div class="form-group" style="margin-top: 30px;">
            <button type="submit" class="btn">
                <i class="fas fa-save"></i> Simpan Data
            </button>
            <a href="<?= base_url('dashboard/admin') ?>" class="btn" style="background-color: #95a5a6; margin-left: 10px;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role_id');
        const userFields = document.getElementById('userFields');

        roleSelect.addEventListener('change', function() {
            if (this.value === '3') {
                userFields.classList.add('show');
            } else {
                userFields.classList.remove('show');
            }
        });

        // Validasi form sebelum submit
    document.querySelector('form').addEventListener('submit', function(e) {
            if (roleSelect.value === '3') {
                const nim = document.querySelector('input[name="nim"]').value;
                const fakultas = document.querySelector('input[name="fakultas"]').value;
                const prodi = document.querySelector('input[name="program_studi"]').value;
                if (!nim && !fakultas && !prodi) {
                    alert('NIM, Fakultas dan Program Studi wajib diisi untuk role User(Mahasiswa)');
                    e.preventDefault();
                }
            }
        });
    });
</script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    const roleSelect = document.querySelector('select[name="role_id"]');
    
    const nimInput = document.querySelector('input[name="nim"]');
    const fakultasSelect = document.querySelector('select[name="fakultas"]');
    const prodiSelect = document.querySelector('select[name="program_studi"]');

    const nimField = nimInput.closest('.form-group');
    const fakultasField = fakultasSelect.closest('.form-group');
    const prodiField = prodiSelect.closest('.form-group');

    function toggleMahasiswaFields() {
        const isMahasiswa = roleSelect.value === '3';

        nimField.style.display = isMahasiswa ? 'block' : 'none';
        fakultasField.style.display = isMahasiswa ? 'block' : 'none';
        prodiField.style.display = isMahasiswa ? 'block' : 'none';

        // Set atau hapus atribut required
        nimInput.required = isMahasiswa;
        fakultasSelect.required = isMahasiswa;
        prodiSelect.required = isMahasiswa;
    }

    // Jalankan saat halaman load
    toggleMahasiswaFields();

    // Jalankan saat role berubah
    roleSelect.addEventListener('change', toggleMahasiswaFields);
});


    const programStudiData = {
        'Fakultas Teknik': ['Informatika', 'Sipil', 'Elektro'],
        'Fakultas Hukum': ['Ilmu Hukum'],
        'Fakultas Kedokteran': ['Pendidikan Dokter'],
        'Fakultas Psikologi': ['Psikologi'],
        'Fakultas Ekonomi dan Bisnis': ['Manajemen', 'Akuntansi'],
        'Fakultas Ilmu Komunikasi': ['Ilmu Komunikasi'],
        'Fakultas Pertanian': ['Agroteknologi', 'Agribisnis']
    };

    const fakultasSelect = document.getElementById('fakultas');
    const programStudiSelect = document.getElementById('program_studi');

    function populateProgramStudi(fakultasTerpilih, selectedValue = '') {
        programStudiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

        if (fakultasTerpilih && programStudiData[fakultasTerpilih]) {
            programStudiData[fakultasTerpilih].forEach(prodi => {
                const option = new Option(prodi, prodi);
                if (prodi === selectedValue) {
                    option.selected = true;
                }
                programStudiSelect.add(option);
            });
        }
    }

    // Populate saat halaman dimuat jika ada value awal
    document.addEventListener('DOMContentLoaded', function() {
        const fakultasAwal = fakultasSelect.value;
        const prodiAwal = "<?= isset($user['program_studi']) ? esc($user['program_studi']) : '' ?>";

        if (fakultasAwal) {
            populateProgramStudi(fakultasAwal, prodiAwal);
        }

        // Jika fakultas sudah dipilih tapi prodi belum terisi, tetap tampilkan opsi
        if (fakultasAwal && !prodiAwal) {
            populateProgramStudi(fakultasAwal);
        }
    });

    // Update saat fakultas dipilih
    fakultasSelect.addEventListener('change', function() {
        populateProgramStudi(this.value);
    });
</script>