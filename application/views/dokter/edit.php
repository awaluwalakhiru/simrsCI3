<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Dokter</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Dokter</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('dokter'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>

                    <?php echo form_open('dokter/edit', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                    <div class="card-body pt-0">
                        <section class="mx-auto">
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Dokter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_dokter" value="<?php echo html_escape($this->encryption->encrypt($dokter->id_dokter)) ?>">
                                            <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" required="" autofocus value="<?php echo html_escape($dokter->nama_dokter) ?>" tabindex="1">
                                            <div class="invalid-feedback">
                                                Mohon isi Nama Dokter!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                    <div class="form-group">
                                        <label for="ket_obat">Spesialis</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-allergies"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="spesialis" name="spesialis" class="form-control" required="" value="<?php echo html_escape($dokter->spesialis) ?>" tabindex="2">
                                            <div class="invalid-feedback">
                                                Mohon isi Keterangan Spesialisasi!
                                            </div>
                                        </div>
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
                                            <input type="text" id="alamat" name="alamat" class="form-control" required="" value="<?php echo html_escape($dokter->alamat) ?>" tabindex="3">
                                            <div class="invalid-feedback">
                                                Mohon isi Alamat!
                                            </div>
                                        </div>
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
                                            <input type="number" id="no_telepon" name="no_telepon" class="form-control" required="" value="<?php echo html_escape($dokter->no_telepon) ?>" tabindex="4">
                                            <div class="invalid-feedback">
                                                Mohon isi Nomor Telepon!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="edit">Edit Dokter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>