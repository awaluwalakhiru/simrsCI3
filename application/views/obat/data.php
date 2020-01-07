<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Obat</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Obat</h4>
                    </div>
                    <div class="row" style="padding-left:10px;padding-right:10px;">
                        <div class="col">
                            <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="col-sm-12 col-md-5 col-lg-5">
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
                    <div class="container ml-2">
                        <?php echo form_open('#', ['name' => 'proses']); ?>
                        <div class="row">
                            <div class="col pb-2 mr-3 d-flex justify-content-end">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?php echo site_url('obat/tambah_v'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Obat</small></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table_obat" data-semua="<?php echo site_url('obat/semua'); ?>" data-edit="<?php echo site_url('obat/edit_v/'); ?>" data-hapus="<?php echo site_url('obat/hapus/'); ?>" style="min-width:100%!important;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 30%;">Nama Obat</th>
                                        <th style="width: 50%;">Keterangan</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function hapus() {
        var hapus = $('table').data('hapus');
        confirm('Yakin mau hapus data?');
        document.proses.action = hapus;
        document.proses.submit();
    }
</script>