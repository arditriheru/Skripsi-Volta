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

            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>SPK</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Surat Perintah Kerja
                </figcaption>
            </figure>

            <table class="table table-hover table-light table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Dosis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_treatment = $_GET['id_treatment'];
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
                        </tr>

                    <?php } ?>
            </table>


            <?php

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
                        <label><b>Dokter</b></label>
                        <input type="text" name="" class="form-control" value="<?= $d['dokter']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label><b>Konsultasi</b></label>
                        <input type="text" name="" class="form-control" value="<?= $d['konsultasi']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label><b>Kondisi Awal</b></label>
                        <div class="form-floating">
                            <textarea class="form-control" style="height: 100px" readonly><?= $d['note']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <label><b>Kesimpulan Dokter</b></label>
                        <div class="form-floating">
                            <textarea class="form-control" style="height: 100px" readonly><?= $d['kesimpulan']; ?></textarea>
                        </div>
                    </div>
                </form>

            <?php } ?>

        </div>
        <div class="col-md-6">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Input Data</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Bagian Farmasi
                </figcaption>
            </figure>

            <form method="post" action="farmasi_tambah.php" class="row g-3" enctype="multipart/form-data">
                <div class="col-12">
                    <input type="hidden" name="id_treatment" class="form-control" value="<?= $_GET['id_treatment']; ?>" readonly>
                    <label><b>Nama Produk</b></label>
                    <select name="id_produk" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih</option>
                        <?php
                        $no = 0;
                        $data = mysqli_query(
                            $koneksi,
                            "SELECT * FROM produk;"
                        );
                        while ($d = mysqli_fetch_array($data)) { ?>

                            <option value="<?= $d['id_produk']; ?>"><?= $d['nama_produk']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-12">
                    <label><b>Jumlah</b></label>
                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </div>
            </form>

            <br>
            <table class="table table-hover table-light table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Jumlah</th>
                        <th class="text-center" scope="col">Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $grandtotal = 0;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                    SELECT *
                    FROM detail_penjualan
                    JOIN produk
                    ON detail_penjualan.id_produk = produk.id_produk
                    WHERE detail_penjualan.id_treatment = '$id_treatment'
                    ");
                    while ($d = mysqli_fetch_array($query)) {

                        $subtotal =  $d['harga_satuan'] * $d['jumlah'];
                        $grandtotal += $subtotal;
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= $no++; ?></td>
                            <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                            <td class="text-center" scope="row"><?= $d['jumlah']; ?></td>
                            <td class="text-center" scope="row"><?= $d['harga_satuan']; ?></td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td class="text-center" scope="row" colspan="3"><b>TOTAL</b></td>
                        <td class="text-center" scope="row">Rp <?php echo number_format($grandtotal); ?></td>
                    </tr>
            </table>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>