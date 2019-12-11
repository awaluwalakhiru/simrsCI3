<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
$judul = 'Pasien';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Pasien</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Pasien</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('pasien/data.php'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
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
                    <?php
                    $id = $_GET['id_pasien'];
                    $sql = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE id_pasien='$id'");
                    $data = mysqli_fetch_assoc($sql);
                    ?>
                    <form action="proses.php" method="post" class="needs-validation" novalidate="">
                        <div class="card-body pt-0">
                            <section class="mx-auto">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_obat">Nomor Identitas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-address-book"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_pasien" value="<?= $data['id_pasien'] ?>">
                                                <input type="text" id="nomor_identitas" name="nomor_identitas" class="form-control" value="<?= $data['nomor_identitas'] ?>" required="" autofocus>
                                                <div class="invalid-feedback">
                                                    Mohon isi Nomor Identitas Anda!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Pasien</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user-md"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" value="<?= $data['nama_pasien'] ?>" required="">
                                                <div class="invalid-feedback">
                                                    Mohon isi Nama Anda!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">Jenis Kelamin</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-venus-mars"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline py-2">
                                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" value="<?= ($data['jenis_kelamin'] == "L") ? "L" : "P"; ?>" <?= ($data['jenis_kelamin'] == "L") ? "checked" : ""; ?> class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline py-2">
                                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="<?= ($data['jenis_kelamin'] == "P") ? "P" : "L"; ?>" <?= ($data['jenis_kelamin'] == "P") ? "checked" : ""; ?> class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-bookmark"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required="">
                                                <div class="invalid-feedback">
                                                    Mohon isi Alamat!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">No Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-tty"></i>
                                                    </div>
                                                </div>
                                                <input type="number" id="no_telepon" pattern="[0-9]+" name="no_telepon" class="form-control" value="<?= $data['no_telepon'] ?>" required="">
                                                <div class="invalid-feedback">
                                                    Mohon isi Nomor Telepon!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col-8 mx-auto">
                                    <button class="btn btn-primary float-right" type="submit" name="edit">Edit Pasien</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once "../templates/footer.php"; ?>