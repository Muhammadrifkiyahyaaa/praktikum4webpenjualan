<div class="container-fluid mt-3">
    <h2 class="mb-4">Update Data Pelanggan</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="<?= site_url('customer/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $customer->id; ?>">

                        <div class="mb-3">
                            <label>Nama Pelanggan *</label>
                            <input class="form-control" name="name" type="text" value="<?= $customer->name; ?>" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label>NIK</label>
                            <input class="form-control" name="nik" type="text" value="<?= $customer->nik; ?>" placeholder="Nomor Induk Kependudukan">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input class="form-control" name="telp" type="text" value="<?= $customer->telp; ?>" placeholder="Nomor Telepon Aktif">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" value="<?= $customer->email; ?>" placeholder="Email Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?= $customer->alamat; ?></textarea>
                        </div>
                        <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> Update</button>
                        <a href="<?= site_url('customer') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>