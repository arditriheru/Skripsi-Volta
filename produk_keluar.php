<?php include('templates/header.php'); ?>
<div class="container">
    <div class="row noprint">
        <div class="col-md-12">
            <img src="img/header.jpg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="row mt-3 mb-2 noprint">
        <div class="col">
            <?php include('menu.php'); ?>
        </div>
    </div>
    <div class="row">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Laporan Stok Keluar</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Beauty Lux
            </figcaption>
        </figure>
    </div>
    <div class="row mt-5 noprint">
        <form method="get" action="" class="row g-3">
            <h4 class="text-left">Masukkan periode</h4>
            <div class="col-md-3">
                <label><b>Tanggal Awal</b></label>
                <input type="date" name="tgl_awal" class="form-control" require>
            </div>
            <div class="col-md-3">
                <label><b>Tanggal Akhir</b></label>
                <input type="date" name="tgl_akhir" class="form-control" require>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Tampilkan Data</button>
            </div>
        </form>
    </div>

    <?php
    if (!empty($_GET['tgl_awal'])) :
        $awal   = $_GET['tgl_awal'];
        $akhir  = $_GET['tgl_akhir'];
    ?>
        <script>
            window.print();
        </script>

        <div class="row mb-5">
            <div class="col-md-12">
                <a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn btn-success btn-sm mt-3 mb-3 noprint"><i class="fa-solid fa-print"></i> Print</a>
                <p>Periode : <?= date('d-m-Y', strtotime($awal)) . ' - ' . date('d-m-Y', strtotime($akhir)); ?></p>
                <table class="table table-hover table-light table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Tanggal</th>
                            <th class="text-center" scope="col">Keluar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        include 'templates/koneksi.php';
                        $query = mysqli_query($koneksi, "
                        SELECT detail_penjualan.*, SUM(detail_penjualan.jumlah) AS terjual, produk.nama_produk
                        FROM detail_penjualan
                        JOIN produk
                        ON detail_penjualan.id_produk = produk.id_produk
                        WHERE detail_penjualan.tanggal BETWEEN '$awal' AND '$akhir'
                        GROUP BY detail_penjualan.id_produk
                    ");
                        while ($d = mysqli_fetch_array($query)) {
                        ?>

                            <tr>
                                <td class="text-center" scope="row"><?= $no++; ?></td>
                                <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                                <td class="text-center" scope="row"><?= date('d-m-Y', strtotime($d['tanggal'])) . '&nbsp;' . $d['jam']; ?></td>
                                <td class="text-center" scope="row">
                                    <?php echo $d['terjual']; ?>
                                </td>
                                </ </tr>

                            <?php } ?>

                </table>
            </div>
        </div>

    <?php endif; ?>

</div>

<?php include('templates/footer.php'); ?>