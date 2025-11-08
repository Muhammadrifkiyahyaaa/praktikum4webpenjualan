<div class="container-fluid mt-3">
    <h2 class="mb-4">Tambah Data Satuan</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="<?= site_url('satuan/save') ?>" method="post">
                        <div class="mb-3">
                            <label>Nama Satuan *</label>
                            <input class="form-control" name="name" type="text" placeholder="Nama Satuan" required>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Satuan"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
                        <a href="<?= site_url('satuan') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>