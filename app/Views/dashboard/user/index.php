
<div class="container mt-4">
    <h2 class="mb-4">Daftar UKM yang Anda Ikuti</h2>

    <?php if (!empty($ukms)) : ?>
        <div class="row">
            <?php foreach ($ukms as $ukm) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ukm['name'] ?></h5>
                            <p class="card-text">
                                Status:
                                <?php if ($ukm['status'] == 'diterima') : ?>
                                    <span class="badge bg-success">Diterima</span>
                                <?php elseif ($ukm['status'] == 'pending') : ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php elseif ($ukm['status'] == 'ditolak') : ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php else : ?>
                                    <span class="badge bg-secondary">Belum mendaftar</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info">Anda belum mengikuti UKM mana pun.</div>
    <?php endif; ?>
</div>
