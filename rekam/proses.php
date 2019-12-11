<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
require '../assets/libs/vendor/autoload.php';
use Ramsey\Uuid\Uuid;

if (isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama_pasien = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_pasien'])));
    $nama_dokter = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_dokter'])));
    $nama_poliklinik = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik'])));
    $keluhan = strtolower(trim(mysqli_real_escape_string($conn, $_POST['keluhan'])));
    $diagnosa = strtolower(trim(mysqli_real_escape_string($conn, $_POST['diagnosa'])));
    $tanggal_periksa = strtolower(trim(mysqli_real_escape_string($conn, $_POST['tanggal_periksa'])));
    $pasien_db = mysqli_query($conn, "SELECT nama_pasien FROM tb_pasien WHERE nama_pasien='$nama_pasien'");

    if (mysqli_num_rows($pasien_db) > 0) {
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data pasien sudah ada di rekam medis harap masukkan lainnya!.
            </div>
        </div>';
        header('location:' . base_url("rekam/tambah.php") . '');
        exit();
    } else {
        $query_tambah = "INSERT INTO tb_rekam_medis VALUES ('$uuid','$nama_pasien','$nama_dokter','$nama_poliklinik','$keluhan','$diagnosa','$tanggal_periksa')";
        $query = mysqli_query($conn, $query_tambah);
        $obat = $_POST['nama_obat'];
        foreach ($obat as $row) {
            $row = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $row))));
            $query_obat = mysqli_query($conn, "INSERT INTO tb_rekam_medis_obat VALUES ('','$uuid','$row')");
        }
        // $query = false;

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            Data rekam medis berhasil ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('rekam/data.php') . "");
            exit();
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data rekam medis gagal ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('rekam/tambah.php') . "");
            exit();
        }
    }
} else if (isset($_POST['edit'])) {
    $id_rekam_medis = $_POST['id_rekam_medis'];
    $nama_pasien = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_pasien'])));
    $nama_dokter = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_dokter'])));
    $nama_poliklinik = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik'])));
    $keluhan = strtolower(trim(mysqli_real_escape_string($conn, $_POST['keluhan'])));
    $diagnosa = strtolower(trim(mysqli_real_escape_string($conn, $_POST['diagnosa'])));
    $tanggal_periksa = strtolower(trim(mysqli_real_escape_string($conn, $_POST['tanggal_periksa'])));
    $query_edit = "UPDATE tb_rekam_medis SET id_pasien='$nama_pasien',id_dokter='$nama_dokter', id_poliklinik='$nama_poliklinik', keluhan='$keluhan', diagnosa='$diagnosa', tanggal_periksa='$tanggal_periksa' WHERE id_rekam_medis='$id_rekam_medis'";
    $ambil = mysqli_query($conn, "SELECT * FROM tb_rekam_medis_obat WHERE id_rekam_medis='$id_rekam_medis'");
    $hasil_ambil = [];
    while ($row = mysqli_fetch_assoc($ambil)) {
        $data = $row['id_rekam_medis_obat'];
        $hasil_ambil[] = $data;
    }
    for ($i = 0; $i < count($_POST['nama_obat']); $i++) {
        $id = $_POST['nama_obat'][$i];
        $id_rekam_medis_obat = $hasil_ambil[$i];
        $nama_obat = strtolower(trim(mysqli_real_escape_string($conn, $_POST['nama_obat'][$i])));
        $query_edit_rekam = "UPDATE tb_rekam_medis_obat SET id_obat='$nama_obat' WHERE id_rekam_medis_obat='$id_rekam_medis_obat'";
        $query_rekam = mysqli_query($conn, $query_edit_rekam);
    }
    $query = mysqli_query($conn, $query_edit);
    // $query = mysqli_query($conn, $query_edit);
    // $query = false;

    if ($query) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Info</div>
        Data rekam medis berhasil diedit.s
        </div>
    </div>';
        header("location:" . base_url('rekam/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data rekam medis gagal diedit.
        </div>
    </div>';
        header("location:" . base_url('rekam/edit.php') . "");
        exit();
    }
}
