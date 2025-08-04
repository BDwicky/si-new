<?= $this->include('templates/sidebar-user') ?>
<style>
    /* Main Content Area */
    .content-wrapper {
        margin-left: 250px;
        padding: 20px;
        min-height: calc(100vh - 60px);
        background: #f8fafc;
    }

    /* Form Container */
    .edit-form-container {
        /* max-width: 900px; */
        /* margin: 0 auto; */
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03);
        padding: 30px 20px 20px 20px;
        margin-left: 40px;
        margin-top: 10px;
    }

    /* Form Header */
    .form-header {
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e2e8f0;
    }

    .form-title {
        font-size: 1.5rem;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Form Grid Layout */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 25px;
    }

    .section-title {
        font-size: 1.1rem;
        color: #334155;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #475569;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: all 0.2s;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        background: white;
        outline: none;
    }

    /* Full Width Elements */
    .full-width {
        grid-column: span 2;
    }

    /* Form Footer */
    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    /* Buttons */
    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary {
        background: #6366f1;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: #4f46e5;
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: white;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #f1f5f9;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: all 0.2s;
    }

    /* Icons */
    .icon {
        font-size: 1.1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: span 1;
        }
    }
</style>
<div class="content-wrapper">
    <div class="edit-form-container">
        <form action="<?= base_url('dashboard/user/update-profile') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-user-circle"></i> Informasi Akun</h3>

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" value="<?= esc($user['name']) ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" value="<?= esc($user['nim']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="phone" value="<?= esc($user['phone']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Fakultas</label>
                    <input type="text" name="fakultas" value="<?= esc($user['fakultas']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="program_studi" value="<?= esc($user['program_studi']) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
            </div>

            <div class="form-footer">
                <a href="<?= base_url('dashboard/user') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>