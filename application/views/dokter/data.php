<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dokter</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Dokter</h4>
                    </div>

                    <div class="container pr-4">
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?php echo site_url('dokter/tambah_v'); ?>"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col">
                                <a class="btn btn-danger btn-action mr-2" data-toggle="tooltip" title="Hapus" data-confirm="Yakin mau menghapus data?|tetap melanjutkan?" data-confirm-yes="hapus();"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="container">
                            <div class="row mt-2" style="padding-left:10px;padding-right:10px;">
                                <div class="col-sm-12 col-md-6 col-lg-6">
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
                        </div>
                    <?php endif; ?>
                    <?php echo form_open('dokter/hapus', ['name' => 'proses']); ?>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Dokter</small></h6>
                            </div>
                        </div>
                        <div class="table-responsive lewat">
                            <table class="table table-striped table-hover table-md" id="tb_dokter">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="pilih_semua" id="pilih_semua"></th>
                                        <th>No</th>
                                        <th>Name Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dokter as $data) : ?>
                                        <tr>
                                            <td><input type="checkbox" name="pilih[]" class="pilih" value="<?php echo  html_escape($this->encryption->encrypt($data->id_dokter)); ?>"></td>
                                            <td><?php echo html_escape($no++); ?></td>
                                            <td><?php echo html_escape($data->nama_dokter); ?></td>
                                            <td><?php echo html_escape($data->spesialis); ?></td>
                                            <td><?php echo html_escape($data->alamat); ?></td>
                                            <td><?php echo html_escape($data->no_telepon); ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="<?php echo base_url('dokter/edit_v/' . urlencode(base64_encode(($this->encryption->encrypt($data->id_dokter)))) . ''); ?>"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>