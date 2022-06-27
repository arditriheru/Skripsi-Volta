<?php include('templates/header.php'); ?>
<div class="container">
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
                <p>Riwayat Rekam Medik</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Beauty Lux
            </figcaption>
        </figure>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-hover table-light table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">No.Register</th>
                        <th class="text-center" scope="col">Registrasi</th>
                        <th class="text-center" scope="col">Nomor RM</th>
                        <th class="text-center" scope="col">Nama Pasien</th>
                        <th class="text-center" scope="col">Konsultasi</th>
                        <th class="text-center" scope="col">Kondisi Awal</th>
                        <th class="text-center" scope="col">Kesimpulan</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $id_customer = $_GET['id_customer'];
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                    SELECT *,
                    CASE
                    WHEN treatment.status = 0 THEN 'Proses konsultasi'
                    WHEN treatment.status = 1 THEN 'Farmasi'
                    WHEN treatment.status = 2 THEN 'Kasir'
                    WHEN treatment.status = 3 THEN 'Terbayar'
                    END AS nm_status
                    FROM treatment
                    JOIN customer
                    ON treatment.id_customer = customer.id_customer
                    WHERE customer.id_customer = '$id_customer'
                    ORDER BY treatment.id_treatment ASC
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= $no++; ?></td>
                            <td class="text-center" scope="row"><?= $d['id_treatment']; ?></td>
                            <td class="text-center" scope="row"><span class="badge bg-primary"><?= $d['nm_status']; ?></span><br><?= date('d/m/Y H:i:s', strtotime($d['tanggal'])); ?></td>
                            <td class="text-center" scope="row"><?= $d['id_customer']; ?></td>
                            <td class="text-right" scope="row"><?= $d['nama']; ?></td>
                            <td class="text-center" scope="row"><?= $d['konsultasi']; ?></td>
                            <td class="text-center" scope="row"><?= $d['note']; ?></td>
                            <td class="text-center" scope="row"><?= $d['kesimpulan']; ?></td>
                            <td class="text-center" scope="row">
                                <a href="registrasi_riwayat.php?id_customer=<?= $d['id_customer']; ?>&id_treatment=<?= $d['id_treatment']; ?>" type="button" class="btn btn-success btn-sm">Detail</a>
                            </td>
                            </ </tr>

                        <?php } ?>

            </table>

            <?php if (!empty($_GET['id_treatment'])) : ?>

                <h5 class="mt-5">Detail Pembelian Produk</h5>
                <table class="table table-hover table-light table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Registrasi</th>
                            <th class="text-center" scope="col">Konsultasi</th>
                            <th class="text-center" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Jumlah</th>
                            <th class="text-center" scope="col">Kesimpulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_treatment = $_GET['id_treatment'];
                        $no = 1;
                        include 'templates/koneksi.php';
                        $query = mysqli_query($koneksi, "
                        SELECT *
                        FROM detail_penjualan
                        JOIN produk
                        ON detail_penjualan.id_produk = produk.id_produk
                        JOIN treatment
                        ON detail_penjualan.id_treatment=treatment.id_treatment
                        JOIN treatment_detail
                        ON detail_penjualan.id_produk = treatment_detail.id_produk
                        WHERE detail_penjualan.id_treatment = '$id_treatment'
                    ");
                        while ($d = mysqli_fetch_array($query)) {
                        ?>

                            <tr>
                                <td class="text-center" scope="row"><?= $no++; ?></td>
                                <td class="text-center" scope="row"><?= date('d/m/Y H:i:s', strtotime($d['tanggal'])); ?></td>
                                <td class="text-center" scope="row"><?= $d['konsultasi']; ?></td>
                                <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                                <td class="text-center" scope="row"><?= $d['dosis']; ?></td>
                                <td class="text-center" scope="row"><?= $d['kesimpulan']; ?></td>
                            </tr>

                        <?php } ?>
                </table>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>