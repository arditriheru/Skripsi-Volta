<?php

session_start();
include 'templates/koneksi.php';

$username   = $_POST['username'];
$password   = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT *
			FROM user
			WHERE username='$username'
			AND password='$password'");
while ($d = mysqli_fetch_array($query)) {
    $id_user     = $d['id_user'];
    $nama_user   = $d['nama_user'];
}

$cek = mysqli_num_rows($query);
if ($cek > 0) {

    $_SESSION['id_user']     = $id_user;
    $_SESSION['nama_user']   = $nama_user;
    header("location:dashboard.php");
} else {

    echo '<script>alert("Username atau Password Salah!");</script>
			<script>window.location.href="index.php";</script>';
}
