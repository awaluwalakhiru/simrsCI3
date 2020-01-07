<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Daftar Pasien</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('pasien'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                <div class="alert mx-3 mb-0 alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
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
                    <?php echo form_open('pasien/tambah', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nomor Identitas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-address-book"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="nomor_identitas" name="nomor_identitas" value="<?php echo html_escape(set_value('nomor_identitas')) ?>" class="form-control" required="" autofocus tabindex="1">
                                            <div class="invalid-feedback">
                                                Mohon isi Nomor Identitas Anda!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('nomor_identitas'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Pasien</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="nama_pasien" name="nama_pasien" value="<?php echo html_escape(set_value('nama_pasien')) ?>" class="form-control" required="" tabindex="2">
                                            <div class="invalid-feedback">
                                                Mohon isi Nama Anda!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('nama_pasien'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Jenis Kelamin</label>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-venus-mars"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-radio custom-control-inline py-2">
                                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" value="L" class="custom-control-input" <?php echo set_radio('jenis_kelamin', '1', true); ?> tabindex="3">
                                                    <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline py-2">
                                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="P" class="custom-control-input" <?php echo set_radio('jenis_kelamin', '2'); ?> tabindex="4">
                                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Mohon pilih salah satu!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('jenis_kelamin'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="alamat" name="alamat" value="<?php echo html_escape(set_value('alamat')) ?>" class="form-control" required="" tabindex="5">
                                            <div class="invalid-feedback">
                                                Mohon isi Alamat!
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">No Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-tty"></i>
                                                </div>
                                            </div>
                                            <input type="number" id="no_telepon" pattern="[0-9]+" name="no_telepon" value="<?php echo html_escape(set_value('no_telepon')) ?>" class="form-control" required="" tabindex="6">
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
                            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="tambah" tabindex="7">Tambah Pasien</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>