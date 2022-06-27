<?php

include 'templates/koneksi.php';

$id_treatment   = $_POST['id_treatment'];
$kesimpulan   = $_POST['kesimpulan'];


$query = mysqli_query($koneksi, "UPDATE treatment SET kesimpulan='$kesimpulan' WHERE id_treatment='$id_treatment'");;

if ($query) {
    echo '<script>alert("Berhasil dibuat!");</script>';
    header('location: treatment.php');
} else {

    echo '<script>alert("Gagal dibuat!");</script>';
    header('location: treatment_form.php?id_treatment=' . $id_treatment);
}
