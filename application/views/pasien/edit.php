<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Pasien</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('pasien'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>

                    <?php echo form_open('pasien/edit', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nomor Identitas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-address-book"></i>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_pasien" value="<?php echo html_escape($this->encryption->encrypt($pasien->id_pasien)) ?>">
                                            <input type="text" id="nomor_identitas" name="nomor_identitas" class="form-control" value="<?php echo html_escape($pasien->nomor_identitas) ?>" required="" autofocus tabindex="1">
                                            <div class="invalid-feedback">
                                                Mohon isi Nomor Identitas Anda!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Pasien</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" value="<?php echo html_escape($pasien->nama_pasien) ?>" required="" tabindex="2">
                                            <div class="invalid-feedback">
                                                Mohon isi Nama Anda!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
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
                                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" value="<?php echo ($pasien->jenis_kelamin == "L") ? "L" : "P"; ?>" <?php echo ($pasien->jenis_kelamin == "L") ? "checked" : ""; ?> class="custom-control-input" tabindex="3">
                                                    <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline py-2">
                                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="<?php echo ($pasien->jenis_kelamin == "P") ? "P" : "L"; ?>" <?php echo ($pasien->jenis_kelamin == "P") ? "checked" : ""; ?> class="custom-control-input" tabindex="4">
                                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo html_escape($pasien->alamat) ?>" required="" tabindex="5">
                                            <div class="invalid-feedback">
                                                Mohon isi Alamat!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">No Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-tty"></i>
                                                </div>
                                            </div>
                                            <input type="number" id="no_telepon" pattern="[0-9]+" name="no_telepon" class="form-control" value="<?php echo html_escape($pasien->no_telepon) ?>" required="" tabindex="6">
                                            <div class="invalid-feedback">
                                                Mohon isi Nomor Telepon!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="edit" tabindex="7">Edit Pasien</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>