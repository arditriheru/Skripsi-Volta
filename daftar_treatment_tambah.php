<?php
session_start();
include 'templates/koneksi.php';

$id_customer    = $_POST['id_customer'];
$id_user        = $_SESSION["id_user"];
$dokter         = $_POST['dokter'];
$konsultasi     = $_POST['konsultasi'];
$note           = $_POST['note'];

$insert = mysqli_query($koneksi, "INSERT INTO treatment(id_treatment, id_customer, id_user, dokter, konsultasi, note)VALUES('','$id_customer','$id_user','$dokter','$konsultasi','$note')");

if ($insert) {
    echo '<script>alert("Berhasil registrasi!");</script>
			<script>window.location.href="daftar_treatment.php";</script>';
} else {

    echo '<script>alert("Gagal registrasi!");</script>
			<script>window.location.href="daftar_treatment.php";</script>';
}
