<?php

include 'koneksi.php';

$username   = $_POST['username'];
$email      = $_POST['email'];

$a = mysqli_query($koneksi, "SELECT id_user
			FROM user
			WHERE username='$username'
			AND email='$email'");
while ($b = mysqli_fetch_array($a)) {
    $id_user     = $b['id_user'];
    $nama_user   = $b['nama_user'];
}

$cek = mysqli_num_rows($a);
if ($cek > 0) {

    session_start();
    $_SESSION['id_user'] = $id_user;
    header("location:dashboard.php");
} else {

    echo '<script>alert("Username atau Password Salah!");</script>
			<script>window.location.href="index.php";</script>';
}
