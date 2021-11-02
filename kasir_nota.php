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
        <div class="col-md-8">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Nota Pembayaran</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Bagian Kasir
                </figcaption>
            </figure>
            <a href="kasir.php" type="submit" class="btn btn-warning float-end">Kembali</a>
            <br><br>
            <table class="table table-success table-stripe">
                <thead>
                    <tr>
                        <td class="text-center"><b>Nama Pasien : <?= $_GET['nama']; ?></b></td>
                    </tr>
                </thead>
            </table>
            <table class="table table-success table-stripe">
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
                    $id_treatment = $_GET['id_treatment'];

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
                        <td class="text-center" scope="row">
                            <b><?php echo 'Rp ' . number_format($grandtotal); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <form method="post" action="kasir_tambah.php" class="row g-3">
                                <div class="col-12">
                                    <input type="hidden" name="id_treatment" class="form-control" value="<?php echo $_GET['id_treatment']; ?>" readonly>
                                    <input type="hidden" name="total" class="form-control" value="<?php echo $grandtotal; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary float-end">Bayar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
            </table>

        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>