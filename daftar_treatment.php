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
    <div class="row mb-5">
        <div class="col-md-6">
            <form method="post" action="daftar_treatment_cari_nama_list.php" class="row g-3">
                <div class="col-12">
                    <label><b>Nama Lengkap</b></label>
                    <input type="text" name="nama" class="form-control" placeholder="Tuliskan nama lengkap..">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="get" action="daftar_treatment_form.php" class="row g-3">
                <div class="col-12">
                    <label><b>Nomor RM</b></label>
                    <input type="text" name="id_customer" class="form-control" placeholder="Tuliskan nomor RM..">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Registrasi</th>
                        <th class="text-center" scope="col">Nomor RM</th>
                        <th class="text-center" scope="col">Nama Pasien</th>
                        <th class="text-center" scope="col">Tempat,Tgl Lahir</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                    SELECT *
                    FROM daftar
                    JOIN customer
                    ON daftar.id_customer = customer.id_customer
                    ORDER BY daftar.id_daftar DESC
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= $no++; ?></td>
                            <td class="text-center" scope="row"><?= date('d/m/Y H:i:s', strtotime($d['tanggal'])); ?></td>
                            <td class="text-center" scope="row"><?= $d['id_customer']; ?></td>
                            <td class="text-right" scope="row"><?= $d['nama']; ?></td>
                            <td class="text-center" scope="row"><?= $d['tempat_lahir'] . ',&nbsp;' . date('d m Y', strtotime($d['tgl_lahir'])); ?></td>
                            <td class="text-center" scope="row">
                                <a href="daftar_treatment_form.php?id_customer=<?= $d['id_customer']; ?>" type="button" class="btn btn-primary">Detail</a>
                            </td>
                            </ </tr>

                        <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>