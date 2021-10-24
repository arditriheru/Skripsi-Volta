<?php
session_start();
include 'templates/koneksi.php';

$id_customer    = $_POST['id_customer'];
$dokter         = $_POST['dokter'];
$id_user        = $_SESSION['id_user'];

$insert = mysqli_query($koneksi, "INSERT INTO daftar(id_daftar, id_customer, id_user, dokter)VALUES('','$id_customer','$id_user','$dokter')");

if ($insert) {
    echo '<script>alert("Berhasil registrasi!");</script>
			<script>window.location.href="daftar_treatment.php";</script>';
} else {

    echo '<script>alert("Gagal registrasi!");</script>
			<script>window.location.href="daftar_treatment.php";</script>';
}
