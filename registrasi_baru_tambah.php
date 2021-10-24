<?php

include 'templates/koneksi.php';

$nama           = $_POST['nama'];
$tempat_lahir   = $_POST['tempat_lahir'];
$tgl_lahir      = $_POST['tgl_lahir'];
$no_hp          = $_POST['no_hp'];
$alamat         = $_POST['alamat'];

$insert = mysqli_query($koneksi, "INSERT INTO customer(id_customer, nama, tgl_lahir, tempat_lahir, alamat, no_hp)VALUES('','$nama','$tgl_lahir','$tempat_lahir','$alamat','$no_hp')");

if ($insert) {
    echo '<script>alert("Berhasil registrasi!");</script>
			<script>window.location.href="registrasi_baru.php";</script>';
} else {

    echo '<script>alert("Gagal registrasi!");</script>
			<script>window.location.href="registrasi_baru.php";</script>';
}
