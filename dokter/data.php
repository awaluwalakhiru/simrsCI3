<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
}
$judul = 'Dokter';
require_once "../templates/header.php"; ?>

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
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?= base_url('dokter/tambah.php'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col">
                                <a class="btn btn-danger btn-action mr-2" data-toggle="tooltip" title="Hapus" data-confirm="Yakin mau menghapus data?|tetap melanjutkan?" data-confirm-yes="hapus();"><i class="fas fa-trash"></i> hapus</a>
                            </div>
                        </div>
                    </div>
                    <form name="proses" method="post">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6><small>Data Dokter</small></h6>
                                </div>
                            </div>
                            <div class="table-responsive">
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
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_dokter") or die(mysqli_error($conn));
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="pilih[]" class="pilih" value="<?= $data['id_dokter']; ?>"></td>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nama_dokter']; ?></td>
                                                <td><?= $data['spesialis']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['no_telepon']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="<?= base_url('dokter/edit.php'); ?>?id_dokter=<?= $data['id_dokter']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }; ?>
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
<script>
    $('#pilih_semua').click(function() {
        if (this.checked) {
            $('.pilih').each(function() {
                this.checked = true;
            });
        } else {
            $('.pilih').each(function() {
                this.checked = false;
            });
        }
    });

    $('.pilih').click(function() {
        if ($('.pilih:checked').length == $('.pilih').length) {
            $('#pilih_semua').prop('checked', true);
        } else {
            $('#pilih_semua').prop('checked', false);
        }
    });

    function hapus() {
        document.proses.action = 'delete.php';
        document.proses.submit();
    }

    $(function() {
        $("#tb_dokter").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [0, 1, 6]
            }]
        });
    });
</script>
<?php require_once "../templates/footer.php"; ?>