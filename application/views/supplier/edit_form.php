<div class="container-fluid mt-3">
    <h2 class="mb-4">Update Data Supplier</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?= site_url('supplier/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $supplier->id; ?>">
                        
                        <h5 class="mb-3">Informasi Utama</h5>
                        <div class="mb-3">
                            <label>Nama Supplier *</label>
                            <input class="form-control" name="name" type="text" value="<?= $supplier->name; ?>" placeholder="Nama Supplier" required>
                        </div>
                        <div class="mb-3">
                            <label>Perusahaan</label>
                            <input class="form-control" name="perusahaan" type="text" value="<?= $supplier->perusahaan; ?>" placeholder="Nama Perusahaan">
                        </div>
                        <div class="mb-3">
                            <label>NIK</label>
                            <input class="form-control" name="nik" type="text" value="<?= $supplier->nik; ?>" placeholder="NIK Supplier">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input class="form-control" name="telp" type="text" value="<?= $supplier->telp; ?>" placeholder="Nomor Telepon">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" value="<?= $supplier->email; ?>" placeholder="Email Supplier">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $supplier->alamat; ?></textarea>
                        </div>

                        <h5 class="mt-4 mb-3">Informasi Bank (Opsional)</h5>
                        <div class="mb-3">
                            <label>Nama Bank</label>
                            <input class="form-control" name="nama_bank" type="text" value="<?= $supplier->nama_bank; ?>" placeholder="Contoh: BCA / Mandiri">
                        </div>
                        <div class="mb-3">
                            <label>Nama Akun Bank</label>
                            <input class="form-control" name="nama_akun_bank" type="text" value="<?= $supplier->nama_akun_bank; ?>" placeholder="Nama Pemilik Rekening">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Akun Bank</label>
                            <input class="form-control" name="no_akun_bank" type="text" value="<?= $supplier->no_akun_bank; ?>" placeholder="Nomor Rekening">
                        </div>

                        <button class="btn btn-warning mt-3" type="submit"><i class="fas fa-edit"></i> Update</button>
                        <a href="<?= site_url('supplier') ?>" class="btn btn-secondary mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>