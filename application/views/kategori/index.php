<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('kategori') ?>">kategori</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?php echo site_url('kategori/add') ?>"><i class="fas fa-plus"></i> Add New</a>
            </div>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <div class="card-body">
    <div class="card-responsive">
        <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kategori as $kategori1) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $kategori1->name . "</td>";
                    echo "<td>";
                    ?>
                        <a href="<?php echo base_url('kategori/getedit/') . $kategori1->id; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('kategori/delete/') . $kategori1->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Ingin menghapus data user ini?');"><i class="fas fa-trash"></i> Hapus</a>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
            </div>
        </div>
    </div>
</main>