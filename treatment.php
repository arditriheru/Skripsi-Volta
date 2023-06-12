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
                <p>Pasien Treatment</p>
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
                    WHEN treatment.status = 0 THEN 'Treatment'
                    WHEN treatment.status = 1 THEN 'Farmasi'
                    WHEN treatment.status = 2 THEN 'Kasir'
                    WHEN treatment.status = 3 THEN 'Terbayar'
                    END AS nm_status
                    FROM treatment
                    JOIN customer
                    ON treatment.id_customer = customer.id_customer
                    ORDER BY treatment.id_treatment ASC
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                    <tr>
                        <td class="text-center" scope="row"><?= $no++; ?></td>
                        <td class="text-center" scope="row"><?= $d['id_treatment']; ?></td>
                        <td class="text-center" scope="row">
                            <span class="badge bg-primary"><?= $d['nm_status']; ?></span>

                            <!-- jika kesimpulan konsultasi belum diisi -->
                            <?php if(empty($d['kesimpulan'])){
                                echo '<span class="badge bg-danger">Kesimpulan belum diisi!</span>';
                            } ?>

                            <br><?= date('d/m/Y H:i:s', strtotime($d['tanggal'])); ?>
                        </td>
                        <td class="text-center" scope="row"><?= $d['id_customer']; ?></td>
                        <td class="text-right" scope="row"><?= $d['nama']; ?></td>
                        <td class="text-center" scope="row"><?= $d['konsultasi']; ?></td>
                        <td class="text-center" scope="row"><?= $d['note']; ?></td>
                        <td class="text-center" scope="row">
                            <a href="treatment_form.php?id_treatment=<?= $d['id_treatment']; ?>" type="button"
                                class="btn btn-success btn-sm">Buat SPK</a>
                            <a href="registrasi_riwayat.php?id_customer=<?= $d['id_customer']; ?>" type="button"
                                class="btn btn-warning btn-sm" target="_blank">Riwayat RM</a>
                        </td>
                        </ </tr>

                        <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>