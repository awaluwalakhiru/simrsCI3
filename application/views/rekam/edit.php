<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Rekam Medis</h1>
        </div>
        <?php echo form_open('rekam/edit', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Rekam Medis</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('rekam'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <div class="row" style="padding-left:10px;padding-right:10px;">
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
                                        <label for="nama_pasien">Nama Pasien</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-injured"></i>
                                                </div>
                                            </div>
                                            <select class="custom-select mr-sm-2" name="nama_pasien" id="nama_pasien" required autofocus>
                                                <option selected value="">Pilih nama pasien</option>
                                                <?php foreach ($pasien as $p) : ?>
                                                    <option value="<?php echo html_escape($this->encryption->encrypt($p->id_pasien)); ?>" <?php echo ($p->id_pasien == $rekam_medis->id_pasien) ? "selected" : "" ?>><?php echo html_escape($p->nama_pasien); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon pilih nama pasien!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_dokter">Nama Dokter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                            </div>
                                            <select class="custom-select mr-sm-2" name="nama_dokter" id="nama_dokter" required>
                                                <option selected>Pilih nama dokter</option>
                                                <?php foreach ($dokter as $d) : ?>
                                                    <option value="<?php echo html_escape($this->encryption->encrypt($d->id_dokter)); ?>" <?php echo ($d->id_dokter == $rekam_medis->id_dokter) ? "selected" : "" ?>><?php echo html_escape($d->nama_dokter); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon pilih nama dokter!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_poliklinik">Nama Poliklinik</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-hospital"></i>
                                                </div>
                                            </div>
                                            <select class="custom-select mr-sm-2" name="nama_poliklinik" id="nama_poliklinik" required>
                                                <option selected>Pilih nama poliklinik</option>
                                                <?php foreach ($poliklinik as $pol) : ?>
                                                    <option value="<?php echo html_escape($this->encryption->encrypt($pol->id_poliklinik)); ?>" <?php echo ($pol->id_poliklinik == $rekam_medis->id_poliklinik) ? "selected" : "" ?>><?php echo html_escape($pol->nama_poliklinik); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon pilih nama poliklinik!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="keluhan">Keluhan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-file-medical"></i>
                                                </div>
                                            </div>
                                            <textarea class="form-control" name="keluhan" id="keluhan" rows="3" required><?php echo $rekam_medis->keluhan; ?></textarea>
                                            <div class="invalid-feedback">
                                                Mohon isi Keterangan keluhan!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="diagnosa">Diagnosa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-diagnoses"></i>
                                                </div>
                                            </div>
                                            <textarea class="form-control" name="diagnosa" id="diagnosa" rows="3" required><?php echo $rekam_medis->diagnosa; ?></textarea>
                                            <div class="invalid-feedback">
                                                Mohon isi keterangan Diagnosa!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-first-aid"></i>
                                                </div>
                                            </div>
                                            <select multiple class="custom-select mr-sm-2" name="nama_obat[]" id="nama_obat" required>
                                                <option value="">Pilih nama obat</option>
                                                <?php foreach ($obat as $o) : ?>
                                                    <option value="<?php echo html_escape($this->encryption->encrypt($o->id_obat)); ?>" <?php echo (in_array($o->id_obat, $rekam_obat)) ? "selected" : ""; ?>><?php echo html_escape($o->nama_obat); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon pilih nama obat!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="tanggal_periksa">Tanggal Periksa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_rekam_medis" value="<?php echo  html_escape($this->encryption->encrypt($rekam_medis->id_rekam_medis)); ?>">
                                            <input type="date" id="tanggal_periksa" name="tanggal_periksa" value="<?php echo html_escape($rekam_medis->tanggal_periksa); ?>" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                Mohon isi pilih tanggal periksa!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-8 mx-auto">
                                <button class="btn btn-primary float-right" type="submit" name="edit">Edit Rekam Medis</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>
<script>
    CKEDITOR.replace('keluhan');
    CKEDITOR.replace('diagnosa');
</script>