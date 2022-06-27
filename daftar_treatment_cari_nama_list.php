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
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nomor RM</th>
                        <th class="text-center" scope="col">Nama Pasien</th>
                        <th class="text-center" scope="col">Tempat,Tgl Lahir</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $nama = $_POST['nama'];

                    $no = 1;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE nama LIKE '%' '$nama' '%'");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <th class="text-center" scope="row"><?= $no++; ?></th>
                            <th class="text-center" scope="row"><?= $d['id_customer']; ?></th>
                            <th class="text-center" scope="row"><?= $d['nama']; ?></th>
                            <th class="text-center" scope="row"><?= $d['tempat_lahir'] . ',&nbsp;' . date('d m Y', strtotime($d['tgl_lahir'])); ?></th>
                            <th class="text-center" scope="row">
                                <a href="daftar_treatment_form.php?id_customer=<?= $d['id_customer']; ?>" type="button" class="btn btn-primary btn-sm">Pilih</a>
                            </th>
                            </ </tr>

                        <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>