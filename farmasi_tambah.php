<?php

include 'templates/koneksi.php';

// Membuat Trigger
// BEGIN

//    UPDATE produk SET stok = stok - NEW.jumlah
//    WHERE id_produk = NEW.id_produk;

// END

$id_treatment   = $_POST['id_treatment'];
$id_produk      = $_POST['id_produk'];
$harga          = $_POST['harga'];
$jumlah         = $_POST['jumlah'];

$cek_harga = mysqli_query(
    $koneksi,
    "SELECT harga FROM produk WHERE id_produk = '$id_produk';"
);
while ($d = mysqli_fetch_array($cek_harga)) {
    $harga_satuan = $d['harga'];
}

$insert = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_detail_penjualan, id_treatment, id_produk, harga_satuan, jumlah)VALUES('','$id_treatment','$id_produk','$harga_satuan','$jumlah')");

if ($insert) {
    echo '<script>alert("Berhasil dibuat!");</script>';
    header('location: farmasi_form_tambah.php?id_treatment=' . $id_treatment);
} else {

    echo '<script>alert("Gagal dibuat!");</script>';
    header('location: farmasi_form_tambah.php?id_treatment=' . $id_treatment);
}
