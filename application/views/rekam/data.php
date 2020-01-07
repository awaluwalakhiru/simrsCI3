<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rekam Medis</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Rekam Medis</h4>
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
                    <div class="container">
                        <div class="row float-right pr-2">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?php echo site_url('rekam/tambah_v'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Rekam Medis</small></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md" id="table_rekam_medis">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Nama Poliklinik</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Obat</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($gabung as $g) : ?>
                                        <tr>
                                            <td><?php echo html_escape($no++); ?></td>
                                            <td><?php echo html_escape($g->nama_pasien); ?></td>
                                            <td><?php echo html_escape($g->nama_dokter); ?></td>
                                            <td><?php echo html_escape($g->nama_poliklinik); ?></td>
                                            <td><?php echo $g->keluhan; ?></td>
                                            <td><?php echo $g->diagnosa; ?></td>
                                            <td><?php echo html_escape($g->tanggal_periksa); ?></td>
                                            <td><?php $id_rekam_medis = $g->id_rekam_medis;
                                                    $obat = $this->rekam_m->rekam_obat_join($id_rekam_medis);
                                                    foreach ($obat as $o) {
                                                        echo $o->nama_obat . "<br/>";
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="<?php echo site_url('rekam/edit_v/' .  urlencode(base64_encode($this->encryption->encrypt($g->id_rekam_medis)))); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action hapus" data-toggle="tooltip" title="Hapus" href="<?php echo site_url('rekam/hapus/' . urlencode(base64_encode($this->encryption->encrypt($g->id_rekam_medis)))); ?>"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>