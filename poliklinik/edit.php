<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}

$judul = 'Poliklinik';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Gedung</h1>
        </div>
        <form action="proses.php" method="post" class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Daftar Gedung</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('poliklinik/data.php'); ?>" class="btn btn-info float-right ml-2"><i class="fas fa-chevron-left"></i> kembali</a>
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
                            <section class="justify-content-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>No</th>
                                            <th class="pl-0">Name Poliklinik</th>
                                            <th>Gedung</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        $id = $_POST['pilih'];
                                        foreach ($id as $id) {
                                            $id = trim($id, ";");
                                            $sql_poliklinik = mysqli_query($conn, "SELECT * FROM tb_poliklinik WHERE id_poliklinik='$id'") or die(mysqli_error($conn));
                                            while ($data = mysqli_fetch_assoc($sql_poliklinik)) {
                                                ?>
                                                <tr class="justify-content-center">
                                                    <td><?= $no++; ?></td>
                                                    <td class="pl-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="hidden" name="id[]" value="<?= $data['id_poliklinik']; ?>">
                                                                <input type="text" name="nama_poliklinik[]" value="<?= $data['nama_poliklinik']; ?>" class="form-control" autofocus>
                                                                <div class="invalid-feedback">
                                                                    Mohon isi Nama Poliklinik!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="text" name="gedung[]" value="<?= $data['gedung']; ?>" class="form-control">
                                                                <div class="invalid-feedback">
                                                                    Mohon isi Nama Gedung!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </table>
                                </div>
                            </section>
                            <div class="row float-right">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" name="edit">Edit Gedung</button>
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