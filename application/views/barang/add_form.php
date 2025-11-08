<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Data Barang Baru</h6>
    </div>
    <div class="card-body">
        
        <div class="row">
            <div class="col-lg-8 col-md-10">
                
                <form action="<?php echo site_url('barang/save') ?>" method="post">
                    
                    <div class="mb-3">
                        <label>Barcode </label>
                        <input class="form-control" name="barkode" type="text" placeholder="Barcode" required>
                    </div>

                    <div class="mb-3">
                        <label>Nama Barang </label>
                        <input class="form-control" name="name" type="text" placeholder="Nama Barang" required>
                    </div>

                    <div class="mb-3">
                        <label>Harga Beli </label>
                        <input class="form-control" name="harga_beli" type="text" placeholder="Harga Beli" required>
                    </div>

                    <div class="mb-3">
                        <label>Harga Jual </label>
                        <input class="form-control" name="harga_jual" type="text" placeholder="Harga Jual" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori </label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?php echo $k['id'] ?>"><?php echo $k['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Satuan </label>
                        <select name="satuan_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($satuan as $s): ?>
                                <option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Supplier </label>
                        <select name="supplier_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($supplier as $s): ?>
                                <option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" name="stok" type="text" placeholder="Stok">
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
                </form>

            </div> </div> </div> </div>

