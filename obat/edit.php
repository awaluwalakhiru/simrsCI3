<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
$judul = 'Obat';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Obat</h1>
        </div>
        <form action="proses.php" method="post" class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Daftar Obat</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('obat/data.php'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                            </div>
                        </div>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <div class="col-12">
                                <?php if (isset($_SESSION['pesan'])) {
                                    echo $_SESSION['pesan'];
                                    unset($_SESSION['pesan']);
                                }; ?>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <section class="mx-auto">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <?php $id_obat = @$_GET['id_obat'];
                                        $query = mysqli_query($conn, "SELECT * FROM tb_obat WHERE id_obat='$id_obat'");
                                        $data = mysqli_fetch_assoc($query);
                                        ?>
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-medkit"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_obat" id="id_obat" value="<?= $id_obat; ?>">
                                                <input type="text" id="nama_obat" name="nama_obat" class="form-control" required="" autofocus value="<?= $data['nama_obat']; ?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi Nama Obat!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">Keterangan Obat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-tasks"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id="ket_obat" name="ket_obat" class="form-control" required="" value="<?= $data['ket_obat']; ?>">
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

<?php require_once "../templates/footer.php"; ?>