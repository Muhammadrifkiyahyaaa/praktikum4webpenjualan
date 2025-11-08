<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $title; ?></h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('kategori'); ?>">Kategori</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-list"></i> Tambah Kategori
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('kategori/save'); ?>" method="post">
                    <div class="form-floating mb-3">
                        <input 
                            class="form-control <?php echo form_error('name') ? 'is-invalid' : ''; ?>" 
                            type="text" 
                            name="name" 
                            id="name"
                            placeholder="Name" 
                            required 
                        />
                        <label for="name">Nama Kategori <code>*</code></label>
                        <div class="invalid-feedback">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?php echo site_url('kategori'); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
