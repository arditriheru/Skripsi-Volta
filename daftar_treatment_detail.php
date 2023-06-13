<?php include('templates/header.php'); ?>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <img src="img/header.jpg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="row mt-3 mb-2">
        <div class="col">
            <?php include('menu.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <?php
            $id_treatment = $_GET['id_treatment'];

            $no = 1;
            include 'templates/koneksi.php';
            $query = mysqli_query($koneksi, "
            SELECT *
            FROM treatment
            JOIN customer
            ON treatment.id_customer = customer.id_customer
            WHERE id_treatment = '$id_treatment'
            ");
            while ($d = mysqli_fetch_array($query)) {
            ?>

            <form method="post" action="daftar_treatment_tambah.php" class="row g-3">
                <div class="col-12">
                    <a href="daftar_treatment.php" type="submit" class="btn btn-warning float-end">Kembali</a>
                </div>
                <h4 class="text-center">Detail Treatment</h4>
                <div class="col-12">
                    <label><b>Nomor RM</b></label>
                    <input type="text" name="" class="form-control" value="<?= $d['id_customer']; ?>" readonly>
                </div>
                <div class="col-12">
                    <label><b>Nama Lengkap</b></label>
                    <input type="text" name="" class="form-control" value="<?= $d['nama']; ?>" readonly>
                </div>
                <div class="col-12">
                    <label><b>Dokter</b></label>
                    <input type="text" name="" class="form-control" value="<?= $d['dokter']; ?>" readonly>
                </div>
                <div class="col-12">
                    <label><b>Konsultasi</b></label>
                    <input type="text" name="" class="form-control" value="<?= $d['konsultasi']; ?>" readonly>
                </div>
                <div class="col-12">
                    <label><b>Catatan Khusus</b></label>
                    <input type="text" name="" class="form-control" value="<?= $d['note']; ?>" readonly>
                </div>
            </form>

            <?php } ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>