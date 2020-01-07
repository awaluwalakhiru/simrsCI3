<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pasien</h4>
                    </div>
                    <div class="row" style="padding-left:10px;padding-right:10px;">
                        <div class="col">
                            <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="alert alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="container pr-4">
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?php echo site_url('pasien/tambah_v'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Import" href="<?php echo site_url('pasien/ambil_v'); ?>"><i class="fas fa-file-import"></i> import</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Pasien</small></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="min-width:100%!important;" id="table_pasien" data-semua="<?php echo site_url('pasien/semua') ?>" data-hapus="<?php echo site_url('pasien/hapus/') ?>" data-edit="<?php echo site_url('pasien/edit_v/') ?>">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Identitas</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>