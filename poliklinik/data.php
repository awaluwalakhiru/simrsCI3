<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
}
$judul = 'Poliklinik';
require_once "../templates/header.php"; ?>

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
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?= base_url('poliklinik/jml_tambah.php'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Poliklinik</small></h6>
                            </div>
                        </div>
                        <form name="proses" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Name Poliklinik</th>
                                        <th>Gedung</th>
                                        <th>
                                            <input type="checkbox" id="pilih_semua" name="pilih_semua" value="">
                                        </th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM tb_poliklinik ORDER BY nama_poliklinik ASC");
                                    ?>
                                    <?php if (mysqli_num_rows($query) > 0) : ?>
                                        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nama_poliklinik']; ?></td>
                                                <td><?= $data['gedung']; ?></td>
                                                <td>
                                                    <input type="checkbox" name="pilih[]" class="pilih" id="pilih" value="<?= $data['id_poliklinik'] ?>;">
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak ada</td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </form>
                        <div class="row mx-0 float-right">
                            <div class="col">
                                <button class="btn btn-info btn-action" data-toggle="tooltip" title="Edit" onclick="edit()"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger" data-toggle="tooltip" title="Hapus" data-confirm="Yakin mau menghapus data?|tetap melanjutkan?" data-confirm-yes="hapus();"><i class="fas fa-trash"></i> Hapus</button>
                            </div>
                        </div>
                    </div>
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

    function edit() {
        document.proses.action = 'edit.php';
        document.proses.submit();
    }

    function hapus() {
        document.proses.action = 'delete.php';
        document.proses.submit();
    }
</script>
<?php require_once "../templates/footer.php"; ?>