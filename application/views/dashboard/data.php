<!-- Main Content -->
<?php if ($this->session->userdata('level') == 'admin') : ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pasien</h4>
                        </div>
                        <div class="card-body">
                            <?php echo html_escape($jumlah_pasien) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Dokter</h4>
                        </div>
                        <div class="card-body">
                            <?php echo html_escape($jumlah_dokter); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Obat</h4>
                        </div>
                        <div class="card-body">
                            <?php echo html_escape($jumlah_obat); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Rekap</h4>
                        </div>
                        <div class="card-body">
                            <?php echo html_escape($jumlah_rekam_medis); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar 5 Pasien Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <?php $no = 1;
                        foreach ($pasien_terbaru as $row) : ?>
                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo html_escape($no++); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo html_escape(strtoupper($row->nama_pasien)); ?></div>
                            <div class="progress" data-height="5">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" data-width="100%" aria-valuenow="<?php echo html_escape($no); ?>" aria-valuemin="1" aria-valuemax="5"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
