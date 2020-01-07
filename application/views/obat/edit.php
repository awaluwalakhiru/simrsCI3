<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Obat</h1>
        </div>
        <?php echo form_open('obat/edit', ['class' => 'needs_validation', 'novalidate' => '']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Obat</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('obat'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
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
                                            <input type="hidden" name="id_obat" id="id_obat" value="<?php echo html_escape($this->encryption->encrypt($obat->id_obat)); ?>">
                                            <input type="text" id="nama_obat" name="nama_obat" class="form-control" required="" autofocus value="<?php echo html_escape($obat->nama_obat); ?>">
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
                                            <input type="text" id="ket_obat" name="ket_obat" class="form-control" required="" value="<?php echo html_escape($obat->ket_obat); ?>">
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
                                <button class="btn btn-primary float-right" type="submit" name="edit">Edit Obat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>