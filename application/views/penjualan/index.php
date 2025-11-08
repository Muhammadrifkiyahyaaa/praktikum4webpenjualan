<div class="container-fluid px-4">
    <h1 class="mt-4">Transaksi Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Input Penjualan Baru</li>
    </ol>

    <?php echo $this->session->flashdata('message'); ?> 

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart me-1"></i>
                    Keranjang Belanja
                </div>
                <div class="card-body">
                    <form id="formTambahBarang">
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Barcode / Nama Barang</label>
                                <input type="text" id="barcode" class="form-control" placeholder="Scan Barcode atau Cari Nama">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Harga Jual</label>
                                <input type="text" id="harga_jual" class="form-control" readonly>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Qty</label>
                                <input type="number" id="qty" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                    
                    <hr>

                    <h4>Daftar Belanja</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="keranjangTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cartItems">
                                <tr><td colspan="6" class="text-center">Belum ada barang ditambahkan.</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-file-invoice-dollar me-1"></i>
                    Detail Transaksi
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('penjualan/simpan') ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Customer</label>
                            <select name="customer_id" class="form-select">
                                <option value="">Pilih Customer (Opsional)</option>
                                <?php foreach ($customer as $cust): ?>
                                    <option value="<?php echo $cust['id']; ?>"><?php echo $cust['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Total Belanja</label>
                            <input type="text" name="total_bayar" id="finalTotal" class="form-control form-control-lg text-danger fw-bold" readonly value="0">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Uang Tunai (Bayar)</label>
                            <input type="number" name="bayar" id="uangBayar" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <input type="text" name="kembalian" id="uangKembalian" class="form-control" readonly value="0">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-lg w-100" id="btnSimpan" disabled>SIMPAN TRANSAKSI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// ... (Salin seluruh kode JavaScript yang sudah kita buat ke sini) ...
</script>