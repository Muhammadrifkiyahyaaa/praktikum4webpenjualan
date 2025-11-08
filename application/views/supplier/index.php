<div class="container-fluid mt-3">
    <h2 class="mb-4">Master Supplier</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('supplier/add') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Supplier</th>
                            <th>Perusahaan</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($supplier as $s) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s->name; ?></td>
                                <td><?= $s->perusahaan; ?></td>
                                <td><?= $s->telp; ?></td>
                                <td><?= $s->alamat; ?></td>
                                <td>
                                    <a href="<?= site_url('supplier/getedit/' . $s->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= site_url('supplier/delete/' . $s->id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>