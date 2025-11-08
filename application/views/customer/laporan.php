<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Data Customer</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/customerlap') ?>" target="_blank">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Internal file controller : Menyertakan report pada file controller</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Header Saja</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/headerlap') ?>" target="_blank">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Internal file controller : Menyertakan report hanya header pada file controller</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Data Customer Full</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/customerfull') ?>" target="_blank">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">External file controller : Menyertakan report pada file berbeda dan diletakan di folder view</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Kustom</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/kustomkustom') ?>" target="_blank"> 
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Custom external file controller : Menyertakan report pada file berbeda dan diletakan di folder view berdasarkan fungsi</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Penjualan Transaksi</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/laporan_penjualan'); ?>" target="_blank">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Laporan Transaksi Penjualan (Membutuhkan data JOIN)</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Laporan Pembelian Transaksi</div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('report/laporan_pembelian'); ?>" target="_blank">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Laporan Transaksi Pembelian (Membutuhkan data JOIN)</label>
                        </div>
                        <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>