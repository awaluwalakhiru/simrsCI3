<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
require '../assets/libs/vendor/autoload.php';
use Ramsey\Uuid\Uuid;

$jumlah = @$_POST['jml_gdg'];

if (isset($_POST['tambah'])) {
    for ($i = 1; $i <= $jumlah; $i++) {
        $nama_poliklinik = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik-' . $i]))));
        $gedung = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['gedung-' . $i]))));
        $poliklinik_db = mysqli_query($conn, "SELECT gedung FROM tb_poliklinik WHERE gedung='$gedung'AND nama_poliklinik='$nama_poliklinik'");
    }

    if (mysqli_num_rows($poliklinik_db) > 0) {
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data nama poliklinik sudah ada harap masukkan lainnya!.
            </div>
        </div>';
        header('location:' . base_url("poliklinik/jml_tambah.php") . '');
        exit();
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $uuid = Uuid::uuid4()->toString();
            $nama_poliklinik = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik-' . $i]))));
            $gedung = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['gedung-' . $i]))));
            $query_tambah = "INSERT INTO tb_poliklinik VALUES ('$uuid','$nama_poliklinik','$gedung')";
            $query = mysqli_query($conn, $query_tambah);
        }
        // $query = false;

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            ' . $jumlah . ' Data poliklinik berhasil ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('poliklinik/data.php') . "");
            exit();
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data poliklinik gagal ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('poliklinik/tambah.php') . "");
            exit();
        }
    }
} elseif (isset($_POST['edit'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $nama_poliklinik = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_poliklinik'][$i]))));
        $gedung = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['gedung'][$i]))));
        $query_edit = "UPDATE tb_poliklinik SET nama_poliklinik='$nama_poliklinik', gedung='$gedung' WHERE id_poliklinik='$id'";
        $query = mysqli_query($conn, $query_edit);
    }
    // $query = false;
    if ($query) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Info</div>
        ' . count($_POST['id']) . ' Data poliklinik berhasil diedit.
        </div>
    </div>';
        header("location:" . base_url('poliklinik/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data Poliklinik gagal diedit.
        </div>
    </div>';
        header("location:" . base_url('poliklinik/edit.php') . "");
        exit();
    }
}
