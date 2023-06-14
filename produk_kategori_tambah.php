<?php

include 'templates/koneksi.php';

$id_produk_kategori     = $_POST['id_produk_kategori'];
$nama_produk            = $_POST['nama_produk'];
$harga                  = $_POST['harga'];

$insert = mysqli_query($koneksi, "INSERT INTO produk(id_produk_kategori, nama_produk, harga)VALUES('$id_produk_kategori','$nama_produk','$harga')");

if ($insert) {
    echo '<script>alert("Berhasil menambah item!");</script>
			<script>window.location.href="produk.php?action=add";</script>';
} else {

    echo '<script>alert("Gagal menambah item!");</script>
			<script>window.location.href="produk.php?action=add";</script>';
}
