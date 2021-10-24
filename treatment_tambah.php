<?php

include 'templates/koneksi.php';

$id_treatment   = $_POST['id_treatment'];
$produk   = $_POST['produk'];
$dosis   = $_POST['dosis'];

for ($i = 0; $i < sizeof($produk); $i++) {

    $insert = mysqli_query($koneksi, "INSERT INTO treatment_detail(id_treatment_detail, id_treatment, id_produk, dosis)VALUES('','$id_treatment','" . $produk[$i] . "','" . $dosis[$i] . "')");
}

// if ($insert) {
//     echo '<script>alert("Berhasil registrasi!");</script>
// 			<script>javascript:history.go(-1)</script>';
// } else {

//     echo '<script>alert("Gagal registrasi!");</script>
// 			<script>javascript:history.go(-1)</script>';
// }
