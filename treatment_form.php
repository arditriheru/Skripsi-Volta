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
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Form SPK</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Beauty Lux
            </figcaption>
        </figure>
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
                        <label><b>Nama Produk</b></label>
                        <select name="id_produk" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <?php
                            $no = 0;
                            $data = mysqli_query(
                                $koneksi,
                                "SELECT * FROM produk;"
                            );
                            while ($a = mysqli_fetch_array($data)) { ?>

                                <option value="<?= $a['id_produk']; ?>"><?= $a['nama_produk']; ?></option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-12">
                        <label><b>Dosis</b></label>
                        <input type="text" name="dosis" class="form-control" placeholder="Tuliskan.." required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Tambah</button>
                    </div>
                </form>

        </div>
        <div class="col-md-6">
            <form method="post" action="treatment_tambah_kesimpulan.php" class="row g-3 mb-5" enctype="multipart/form-data">
                <div class="col-12">
                    <input type="hidden" name="id_treatment" class="form-control" value="<?= $d['id_treatment']; ?>" readonly>
                    <label><b>Kesimpulan Konsultasi</b></label>
                    <textarea class="form-control" name="kesimpulan" rows="4" cols="50" placeholder="Tuliskan.."></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </div>
            </form>

        <?php } ?>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nama Produk</th>
                    <th class="text-center" scope="col">Dosis</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                include 'templates/koneksi.php';
                $query = mysqli_query($koneksi, "
                    SELECT *
                    FROM treatment_detail
                    JOIN produk
                    ON treatment_detail.id_produk = produk.id_produk
                    WHERE treatment_detail.id_treatment = '$id_treatment'
                    ");
                while ($d = mysqli_fetch_array($query)) {
                ?>

                    <tr>
                        <td class="text-center" scope="row"><?= $no++; ?></td>
                        <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                        <td class="text-center" scope="row"><?= $d['dosis']; ?></td>
                        <td class="text-center" scope="row">
                            <a href="treatment_form.php?id_produk=<?= $d['id_produk']; ?>" type="button" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>

                <?php } ?>

        </table>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>