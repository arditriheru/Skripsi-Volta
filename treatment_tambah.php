<?php

include 'templates/koneksi.php';

$id_treatment   = $_POST['id_treatment'];
$id_produk      = $_POST['id_produk'];
$dosis          = $_POST['dosis'];


$insert = mysqli_query($koneksi, "INSERT INTO treatment_detail(id_treatment_detail, id_treatment, id_produk, dosis)VALUES('','$id_treatment','$id_produk','$dosis')");

if ($insert) {
  mysqli_query($koneksi, "UPDATE treatment 
      SET status='1' WHERE id_treatment='$id_treatment'");
  echo '<script>alert("Berhasil dibuat!");</script>';
  header('location: treatment_form.php?id_treatment=' . $id_treatment);
} else {

  echo '<script>alert("Gagal dibuat!");</script>';
  header('location: treatment_form.php?id_treatment=' . $id_treatment);
}
