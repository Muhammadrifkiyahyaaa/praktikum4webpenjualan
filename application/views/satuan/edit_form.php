<div class="container-fluid mt-3">
    <h2 class="mb-4">Update Data Satuan</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="<?= site_url('satuan/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $satuan->id; ?>">
                        <div class="mb-3">
                            <label>Nama Satuan *</label>
                            <input class="form-control" name="name" type="text" value="<?= $satuan->name; ?>" placeholder="Nama Satuan" required>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Satuan"><?= $satuan->deskripsi; ?></textarea>
                        </div>
                        <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> Update</button>
                        <a href="<?= site_url('satuan') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>