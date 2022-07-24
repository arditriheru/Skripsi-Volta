<?php

include 'templates/koneksi.php';

$id_produk  = $_POST['id_produk'];
$harga      = $_POST['harga'];
$jumlah     = $_POST['jumlah'];
$tanggal    = date('Y-m-d');
$jam        = date('H:i:s');

$insert = mysqli_query($koneksi, "INSERT INTO produk_pembelian(id_produk_pembelian, id_produk, harga, jumlah, tanggal, jam)VALUES('','$id_produk','$harga','$jumlah','$tanggal','$jam')");

if ($insert) {
    echo '<script>alert("Berhasil menambah stok!");</script>
			<script>window.location.href="produk_tambah_form.php";</script>';
} else {

    echo '<script>alert("Gagal menambah stok!");</script>
			<script>window.location.href="produk_tambah_form.php";</script>';
}
