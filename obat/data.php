<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
}
$judul = 'Obat';
require_once "../templates/header.php"; ?>

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
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-12">
                            <?php if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset($_SESSION['pesan']);
                            }; ?>
                        </div>
                    </div>
                    <div class="container ml-2">
                        <form action="" method="post">
                            <div class="row justify-content-between">
                                <div class="col-sm-10 col-md-10 col-lg-10 pl-3 pr-4">
                                    <div class="form-group form-inline mb-3">
                                        <input type="text" name="pencarian" placeholder="Masukkan pencarian" class="form-control" autofocus>
                                        <button class="btn btn-info btn-action form-control" data-toggle="tooltip" title="Pencarian"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col pb-2 pr-0">
                                    <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?= base_url('obat/tambah.php'); ?>"><i class="fas fa-plus"></i> tambah</a>
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
                        <?php
                        $batas = 5;
                        $hal = @$_GET['hal'];
                        if (empty($hal)) {
                            $hal = 1;
                            $pos = 0;
                        } else {
                            $pos = ($hal - 1) * $batas;
                        }; ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Name Obat</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $no = 1;
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
                                    if ($pencarian != '') {
                                        $sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%' LIMIT $pos,$batas";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else {
                                        $queryJml = "SELECT * FROM tb_obat";
                                        $query = "SELECT * FROM tb_obat LIMIT $pos,$batas";
                                        $no = $pos + 1;
                                    }
                                } else {
                                    $queryJml = "SELECT * FROM tb_obat";
                                    $query = "SELECT * FROM tb_obat LIMIT $pos,$batas";
                                    $no = $pos + 1;
                                }

                                $sql_obat = mysqli_query($conn, $query);
                                ?>
                                <?php if (mysqli_num_rows($sql_obat) > 0) : ?>
                                    <?php while ($row = mysqli_fetch_assoc($sql_obat)) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_obat']; ?></td>
                                            <td><?= $row['ket_obat']; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="<?= base_url('obat/edit.php'); ?>?id_obat=<?= $row['id_obat']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action hapus" data-toggle="tooltip" title="Hapus" href="<?= base_url('obat/delete.php'); ?>?id_obat=<?= $row['id_obat']; ?>"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                        <?php if (@$_POST['pencarian'] == '') : ?>
                            <?php
                            $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
                            $jml_hal = ceil($jml / $batas);
                            $link = 1;
                            $awal = ($hal > $link) ? $hal - $link : 1;
                            $akhir = ($hal < ($jml_hal - $link)) ? $hal + $link : $jml_hal;
                            ?>
                            <div class="container">
                                <div class="float-left">
                                    <h5><small>Jumlah data : <?= $jml; ?></small></h5>
                                </div>
                                <div class="float-right">
                                    <nav class="d-inline-block">
                                        <ul class="pagination mb-0">
                                            <?php if ($hal == 1) : ?>
                                                <li class="page-item disabled"><a href="#" class="page-link">&laquo;</a></li>
                                            <?php else : ?>
                                                <li class="page-item"><a href="?hal=<?= $hal - 1; ?>" class="page-link">&laquo;</a></li>
                                            <?php endif; ?>
                                            <?php
                                            for ($i = $awal; $i <= $akhir; $i++) {
                                                if ($i != $hal) {
                                                    echo "<li class=\"page-item\"><a href=\"?hal=$i\" class=\"page-link\">$i</a></li>";
                                                } else {
                                                    echo "<li class=\"page-item active\"><a class=\"page-link\">$i</a></li>";
                                                }
                                            } ?>
                                            <?php if ($hal == $jml_hal) : ?>
                                                <li class="page-item disabled"><a href="#" class="page-link">&raquo;</a></li>
                                            <?php else : ?>
                                                <li class="page-item"><a href="?hal=<?= $hal + 1; ?>" class="page-link">&raquo;</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            <?php else : ?>
                                <?php
                                $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
                                $jml_hal = ceil($jml / $batas);
                                ?>
                                <div class="float-left">
                                    <h5><small>Jumlah Hasil Pencarian : <?= $jml; ?></small></h5>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "../templates/footer.php"; ?>