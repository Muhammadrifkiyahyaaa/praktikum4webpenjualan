<form action="<?php echo site_url('barang/update') ?>" method="post">
    <div class="mb-3">
        <input type="hidden" name="id" value="<?= $barang->id; ?>" required>
    </div>

    <div class="mb-3">
        <label>Barkode</label>
        <input class="form-control" name="barkode" type="text" value="<?= $barang->barkode; ?>" placeholder="Barkode" required>
    </div>

    <div class="mb-3">
        <label>Nama Barang</label>
        <input class="form-control" name="name" type="text" value="<?= $barang->name; ?>" placeholder="Nama Barang" required>
    </div>

    <div class="mb-3">
        <label>Harga Beli</label>
        <input class="form-control" name="harga_beli" type="text" value="<?= $barang->harga_beli; ?>" placeholder="Harga Beli" required>
    </div>

    <div class="mb-3">
        <label>Harga Jual</label>
        <input class="form-control" name="harga_jual" type="text" value="<?= $barang->harga_jual; ?>" placeholder="Harga Jual" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input class="form-control" name="stok" type="text" value="<?= $barang->stok; ?>" placeholder="Stok" disabled>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($kategori as $kategori) : ?>
                <?php if ($barang->kategori_id == $kategori['id']) : ?>
                    <option value="<?= $kategori['id']; ?>" selected><?= $kategori['name']; ?></option>
                <?php else : ?>
                    <option value="<?= $kategori['id']; ?>"><?= $kategori['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <select name="satuan_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($satuan as $satuan) : ?>
                <?php if ($barang->satuan_id == $satuan['id']) : ?>
                    <option value="<?= $satuan['id']; ?>" selected><?= $satuan['name']; ?></option>
                <?php else : ?>
                    <option value="<?= $satuan['id']; ?>"><?= $satuan['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Supplier</label>
        <select name="supplier_id" class="form-control" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($supplier as $supplier) : ?>
                <?php if ($barang->supplier_id == $supplier['id']) : ?>
                    <option value="<?= $supplier['id']; ?>" selected><?= $supplier['name']; ?></option>
                <?php else : ?>
                    <option value="<?= $supplier['id']; ?>"><?= $supplier['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> Update</button>
</form>