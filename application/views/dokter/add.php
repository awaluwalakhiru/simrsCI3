<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Dokter</h1>
        </div>
        <?php echo form_open('dokter/tambah', ["class" => "needs-validation", "novalidate" => '']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Daftar Dokter</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('dokter'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                <div class="alert alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Dokter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" required="" autofocus value="<?php echo html_escape(set_value('nama_dokter')) ?>" tabindex="1">
                                            <div class="invalid-feedback">
                                                Mohon isi Nama Dokter!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('nama_dokter'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Spesialis</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-allergies"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="spesialis" name="spesialis" class="form-control" required="" value="<?php echo html_escape(set_value('spesialis')) ?>" tabindex="2">
                                            <div class="invalid-feedback">
                                                Mohon isi Keterangan Spesialisasi!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('spesialis'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="alamat" name="alamat" class="form-control" required="" value="<?php echo html_escape(set_value('alamat')) ?>" tabindex="3">
                                            <div class="invalid-feedback">
                                                Mohon isi Alamat!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">No Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-tty"></i>
                                                </div>
                                            </div>
                                            <input type="number" id="no_telepon" pattern="[0-9]+" name="no_telepon" class="form-control" required="" value="<?php echo html_escape(set_value('no_telepon')) ?>" tabindex="4">
                                            <div class="invalid-feedback">
                                                Mohon isi Nomor Telepon!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('no_telepon'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-lg-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="tambah">Tambah Dokter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>