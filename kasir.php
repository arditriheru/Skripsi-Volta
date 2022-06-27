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
                <p>Pembayaran</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Bagian Kasir
            </figcaption>
        </figure>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">No.Register</th>
                        <th class="text-center" scope="col">Registrasi</th>
                        <th class="text-center" scope="col">Nomor RM</th>
                        <th class="text-center" scope="col">Nama Pasien</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                    SELECT *,
                    CASE
                    WHEN treatment.status = 0 THEN 'Proses konsultasi'
                    WHEN treatment.status = 1 THEN 'Farmasi'
                    WHEN treatment.status = 2 THEN 'Kasir'
                    WHEN treatment.status = 3 THEN 'Terbayar'
                    END AS nm_status
                    FROM detail_penjualan
                    JOIN treatment
                    ON detail_penjualan.id_treatment = treatment.id_treatment
                    JOIN customer
                    ON treatment.id_customer = customer.id_customer
                    GROUP BY detail_penjualan.id_treatment
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= $no++; ?></td>
                            <td class="text-center" scope="row"><?= $d['id_treatment']; ?></td>
                            <td class="text-center" scope="row"><span class="badge bg-primary"><?= $d['nm_status']; ?></span><br><?= date('d/m/Y H:i:s', strtotime($d['tanggal'])); ?></td>
                            <td class="text-center" scope="row"><?= $d['id_customer']; ?></td>
                            <td class="text-right" scope="row"><?= $d['nama']; ?></td>
                            <td class="text-center" scope="row">
                                <a href="kasir_nota.php?id_treatment=<?= $d['id_treatment']; ?>&nama=<?= $d['nama']; ?>" type="button" class="btn btn-success btn-sm">Nota</a>
                            </td>
                        </tr>

                    <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>