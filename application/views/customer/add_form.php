<div class="container-fluid mt-3">
    <h2 class="mb-4">Tambah Data Pelanggan</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <form action="<?= site_url('customer/save') ?>" method="post">
                        <div class="mb-3">
                            <label>Nama Pelanggan *</label>
                            <input class="form-control" name="name" type="text" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label>NIK</label>
                            <input class="form-control" name="nik" type="text" placeholder="Nomor Induk Kependudukan">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input class="form-control" name="telp" type="text" placeholder="Nomor Telepon Aktif">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" placeholder="Email Pelanggan">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Save</button>
                        <a href="<?= site_url('customer') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>