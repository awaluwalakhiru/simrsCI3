<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Gedung</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Daftar Gedung</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('poliklinik'); ?>" class="btn btn-info float-right ml-2"><i class="fas fa-chevron-left"></i> kembali</a>
                            <a href="<?php echo site_url('poliklinik/jumlah_v'); ?>" class="btn btn-success float-right"><i class="fas fa-chevron-left"></i> tambah lagi</a>
                        </div>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-12">
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
                    <!-- <form action="proses.php" method="post" class="needs-validation" novalidate=""> -->
                    <?php echo form_open('poliklinik/tambah', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                    <div class="card-body pt-0">
                        <section class="justify-content-center">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th class="pl-0" style="width:60%;">Name Poliklinik</th>
                                        <th style="width:35%;">Gedung</th>
                                    </tr>
                                    <?php for ($i = 1; $i <= $jumlah; $i++) : ?>
                                        <tr class="justify-content-center">
                                            <td><?php echo $i; ?></td>
                                            <td class="pl-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" name="jumlah" value="<?php echo html_escape($jumlah); ?>">
                                                        <input type="text" id="nama_poliklinik" name="nama_poliklinik-<?php echo html_escape($i); ?>" value="<?php echo set_value('nama_poliklinik-' . $i . ''); ?>" class="form-control" required="" autofocus>
                                                        <span class="text-danger"><?php echo form_error('nama_poliklinik-' . $i . ''); ?></span>
                                                        <div class="invalid-feedback">
                                                            Mohon isi Nama Poliklinik!
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="text" id="gedung" name="gedung-<?php echo html_escape($i); ?>" value="<?php echo set_value('gedung-' . $i . ''); ?>" class="form-control" required="" autofocus>
                                                        <span class="text-danger"><?php echo form_error('gedung-' . $i . ''); ?></span>
                                                        <div class="invalid-feedback">
                                                            Mohon isi Nama Gedung!
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </table>
                            </div>
                        </section>
                        <div class="row float-right pb-3">
                            <div class="col">
                                <button class="btn btn-primary" type="submit" name="tambah">Tambah Gedung</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>