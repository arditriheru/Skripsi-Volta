<?php
session_start();
if (empty($_SESSION["id_user"])){
    header("location:index.php");
}
?>
<div class="row">
    <div class="col-md-8">
        <ul class="nav nav-pills">

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="dashboard.php">BERANDA</a>
            </li>

            <?php if ($_SESSION["login_as"] == 'admin') : ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">PENDAFTARAN</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="daftar_treatment.php">Daftar Treatment</a></li>
                    <li><a class="dropdown-item" href="registrasi_baru.php">Registrasi Baru</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="kasir.php">KASIR</a>
            </li>

            <?php elseif ($_SESSION["login_as"] == 'farmasi') : ?>

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="farmasi.php">FARMASI</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">PRODUK</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="produk.php">Lihat Stok</a></li>
                    <li><a class="dropdown-item" href="produk_keluar.php">Stok Keluar</a></li>
                    <li><a class="dropdown-item" href="produk_tambah_form.php">Stok Masuk</a></li>
                </ul>
            </li>

            <?php elseif ($_SESSION["login_as"] == 'dokter') : ?>

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="treatment.php">POLIKLINIK</a>
            </li>

            <?php endif; ?>

        </ul>
    </div>
    <div class="col-md-4">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link text-danger" aria-current="page" href="logout.php">LOGOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"
                    aria-current="page"><?= $_SESSION["nama_user"] . ' (' . strtoupper($_SESSION["login_as"]) . ')'; ?></a>
            </li>
        </ul>
    </div>
</div>
<hr>