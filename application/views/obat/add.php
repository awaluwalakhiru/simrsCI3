<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Obat</h1>
        </div>
        <?php echo form_open('obat/tambah', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Daftar Obat</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('obat'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col">
                            <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="col-sm-12 col-md-6">
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
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-medkit"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="nama_obat" name="nama_obat" value="<?php echo html_escape(set_value('nama_obat')); ?>" class="form-control" required="" autofocus>
                                            <span class="text-danger"><?php echo form_error('nama_obat'); ?></span>
                                            <div class="invalid-feedback">
                                                Mohon isi Nama Obat!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Keterangan Obat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-tasks"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="ket_obat" name="ket_obat" value="<?php echo html_escape(set_value('ket_obat')); ?>" class="form-control" required="" autofocus>
                                            <span class="text-danger"><?php echo form_error('ket_obat'); ?></span>
                                            <div class="invalid-feedback">
                                                Mohon isi Keterangan Obat!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="tambah">Tambah Obat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>