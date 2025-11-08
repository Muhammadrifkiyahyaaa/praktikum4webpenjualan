<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Barang</h2>
        <a href="<?= base_url('barang/add'); ?>" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="tabelkelas" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Barkode</th>
                    <th>Name</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $barang) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $barang->barkode; ?></td>
                        <td><?= $barang->name; ?></td>
                        <td><?= $barang->satuan; ?></td>
                        <td><?= $barang->kategori; ?></td>
                        <td><?= $barang->stok; ?></td>
                        <td>Rp <?= number_format($barang->harga_beli, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($barang->harga_jual, 0, ',', '.'); ?></td>
                        <td>
                            <a href="<?= base_url('barang/getedit/' . $barang->id); ?>" class="btn btn-sm btn-info" title="Edit">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            
                            <a href="<?= base_url('barang/delete/' . $barang->id); ?>" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" title="Hapus">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($barang)): ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data barang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>