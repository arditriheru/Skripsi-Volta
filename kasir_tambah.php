<?php

include 'templates/koneksi.php';

$id_treatment   = $_POST['id_treatment'];
$total          = $_POST['total'];

$insert = mysqli_query($koneksi, "INSERT INTO penjualan(id_penjualan, id_treatment, total)VALUES('','$id_treatment','$total')");

if ($insert) {
  mysqli_query($koneksi, "UPDATE treatment 
      SET status='3' WHERE id_treatment='$id_treatment'");
  echo '<script>alert("Berhasil dibuat!");</script>';
  header('location: kasir.php');
} else {

  echo '<script>alert("Gagal dibuat!");</script>';
  header('location: kasir.php');
}
