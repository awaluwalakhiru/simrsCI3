<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Poliklinik</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Poliklinik</h4>
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
                    <div class="container pr-4">
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?php echo site_url('poliklinik/jumlah_v'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Poliklinik</small></h6>
                            </div>
                        </div>
                        <?php echo form_open('#', ['name' => 'proses']); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table_poliklinik">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 45%">Nama Poliklinik</th>
                                        <th style="width: 45%">Gedung</th>
                                        <th style="width: 5%">
                                            <input type="checkbox" id="pilih_semua" name="pilih_semua" value="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody data-hapus="<?php echo site_url('poliklinik/hapus') ?>" data-edit="<?php echo site_url('poliklinik/edit_v'); ?>">
                                    <?php $no = 1;
                                    foreach ($poliklinik as $row) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nama_poliklinik; ?></td>
                                            <td><?php echo $row->gedung; ?></td>
                                            <td> <input type="checkbox" name="pilih[]" class="pilih" id="pilih" value="<?php echo $this->encryption->encrypt($row->id_poliklinik) ?>"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mx-0 mt-3 float-right">
                            <div class="col">
                                <a class="btn btn-info btn-action" data-toggle="tooltip" title="Edit" data-confirm="Yakin mau mengedit data?|tetap melanjutkan?" data-confirm-yes="edit();"><i class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus" data-confirm="Yakin mau menghapus data?|tetap melanjutkan?" data-confirm-yes="hapus();"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function hapus() {
        var hapus = $('tbody').data('hapus');
        if ($('.pilih:checked').length == 0) {
            alert('Harap pilih dahulu');
        } else {
            document.proses.action = hapus;
            document.proses.submit();
        }
    }

    function edit() {
        var edit = $('tbody').data('edit');
        if ($('.pilih:checked').length == 0) {
            alert('Harap pilih dahulu');
        } else {
            document.proses.action = edit;
            document.proses.submit();
        }
    }
</script>