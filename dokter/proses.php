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
    $nama_dokter = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_dokter']))));
    $spesialis = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['spesialis']))));
    $alamat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['alamat']))));
    $no_telepon = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['no_telepon']))));
    $dokter_db = mysqli_query($conn, "SELECT nama_dokter FROM tb_dokter WHERE nama_dokter='$nama_dokter'");

    if (mysqli_num_rows($dokter_db) > 0) {
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data dokter sudah ada harap masukkan lainnya!.
            </div>
        </div>';
        header('location:' . base_url("dokter/tambah.php") . '');
        exit();
    } else {
        $query_tambah = "INSERT INTO tb_dokter VALUES ('$uuid','$nama_dokter','$spesialis','$alamat','$no_telepon')";
        $query = mysqli_query($conn, $query_tambah);
        // $query = false;

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            Data dokter berhasil ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('dokter/data.php') . "");
            exit();
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data dokter gagal ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('dokter/tambah.php') . "");
            exit();
        }
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id_dokter'];
    $nama_dokter = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_dokter']))));
    $spesialis = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['spesialis']))));
    $alamat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['alamat']))));
    $no_telepon = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['no_telepon']))));
    $query_edit = "UPDATE tb_dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', alamat='$alamat', no_telepon='$no_telepon' WHERE id_dokter='$id'";
    $query = mysqli_query($conn, $query_edit);
    // $query = false;

    if ($query) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Info</div>
        Data dokter berhasil diedit.
        </div>
    </div>';
        header("location:" . base_url('dokter/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data dokter gagal diedit.
        </div>
    </div>';
        header("location:" . base_url('dokter/edit.php') . "");
        exit();
    }
}
