<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
}
$judul = 'Pasien';
require_once "../templates/header.php"; ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pasien</h4>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-12">
                            <?php if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset($_SESSION['pesan']);
                            }; ?>
                        </div>
                    </div>
                    <div class="container pr-4">
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?= base_url('pasien/tambah.php'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col-3">
                                <a class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Import" href="<?= base_url('pasien/import.php'); ?>"><i class="fas fa-file-import"></i> import</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Pasien</small></h6>
                            </div>
                        </div>
                        <form name="proses" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="min-width:100%!important;" id="tb_pasien">
                                    <thead>
                                        <tr>
                                            <th>Nomor Identitas</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <script>
                                            $(function() {
                                                $('#tb_pasien').DataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": "data_pasien.php",
                                                    // scrollY: "250px",
                                                    dom: "Bfrtip",
                                                    buttons: [{
                                                        extend: 'pdf',
                                                        orientation: 'potrait',
                                                        pageSize: 'Legal',
                                                        title: 'Data Pasien',
                                                        download: 'open'
                                                    }, 'csv', 'excel', 'print', 'copy'],
                                                    columnDefs: [{
                                                        "searchable": false,
                                                        "orderable": false,
                                                        "targets": 5,
                                                        "render": function(data, type, row) {
                                                            var btn = "<a class=\"btn btn-sm btn-primary btn-action mr-1\" data-toggle=\"tooltip\" title=\"Edit\" href=\"edit.php?id_pasien=" + data + "\"><i class=\"fas fa-edit\"></i></a><a class=\"btn btn-sm btn-danger btn-action\" onclick=\"return confirm('Yakin mau menghapus data?');\" data-toggle=\"tooltip\" title=\"Hapus\" href=\"delete.php?id_pasien=" + data + "\"><i class=\"fas fa-trash\"></i></a>";
                                                            return btn;
                                                        }
                                                    }]
                                                });
                                            });
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </section>
</div>

<?php require_once "../templates/footer.php"; ?>