<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Import Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Import Daftar Pasien</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('pasien'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-md-8 col-sm-12 mx-auto">
                            <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="alert alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo form_open_multipart('pasien/ambil', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 mx-auto">
                                    <div class="form-group">
                                        <input type="file" name="import" id="import" class="form-control" size="2000" required>
                                        <label for="import"></label>
                                        <div class="invalid-feedback">Mohon pilih file excel anda</div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-md-8 col-sm-12 mx-auto pt-2">
                                <button class="btn btn-primary float-right" type="submit" name="import">Import data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>