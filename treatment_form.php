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
            WHERE id_treatment=$id_treatment");
            while ($d = mysqli_fetch_array($query)) {
            ?>

                <form method="post" action="treatment_tambah.php" class="row g-3" enctype="multipart/form-data">
                    <h4 class="text-center">Form SPK</h4>
                    <div class="col-12">
                        <input type="hidden" name="id_treatment" class="form-control" value="<?= $d['id_treatment']; ?>" readonly>
                        <label><b>Nomor RM</b></label>
                        <input type="text" name="" class="form-control" value="<?= $d['id_customer']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label><b>Nama Lengkap</b></label>
                        <input type="text" name="" class="form-control" value="<?= $d['nama']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <?php
                            $no = 0;
                            $data = mysqli_query(
                                $koneksi,
                                "SELECT * FROM produk;"
                            );
                            while ($d = mysqli_fetch_array($data)) { ?>

                                <input class="form-check-input" name="produk[]" type="checkbox" value="<?= $d['id_produk']; ?>" id="<?= 'label' . $no++; ?>">
                                <label class="form-check-label" for="<?= 'label' . $no++; ?>">
                                    <?= $d['nama_produk']; ?>
                                </label>
                                <input type="text" name="dosis[]" class="form-control mt-2 mb-3" placeholder="Dosis">

                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Daftar</button>
                    </div>
                </form>

            <?php } ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>