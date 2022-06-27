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
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Harga Satuan</th>
                        <th class="text-center" scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                    SELECT * FROM produk
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= $no++; ?></td>
                            <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                            <td class="text-center" scope="row"><?= $d['harga']; ?></td>
                            <td class="text-center" scope="row">
                                <?php
                                echo $d['stok'];
                                if ($d['stok'] <= 30) :
                                    echo '&nbsp;<span class="badge bg-danger">Stok menipis</span>';
                                endif;
                                ?>
                            </td>
                            </ </tr>

                        <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>