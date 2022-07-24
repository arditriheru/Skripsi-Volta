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
                <p>Pembelian Produk</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Beauty Lux
            </figcaption>
        </figure>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="produk_tambah.php" class="row g-3" enctype="multipart/form-data">
                <div class="col-12">
                    <label><b>Nama Produk</b></label>
                    <select name="id_produk" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih</option>
                        <?php
                        $no = 0;
                        include 'templates/koneksi.php';
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
                    <label><b>Harga</b></label>
                    <input type="number" name="harga" class="form-control" placeholder="Tuliskan.." required>
                </div>
                <div class="col-12">
                    <label><b>Jumlah</b></label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Tuliskan.." required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover table-light table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    include 'templates/koneksi.php';
                    $query = mysqli_query($koneksi, "
                        SELECT * 
                        FROM produk_pembelian
                        JOIN produk
                        ON produk_pembelian.id_produk = produk.id_produk
                        ORDER BY id_produk_pembelian DESC 
                        LIMIT 100
                    ");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>

                        <tr>
                            <td class="text-center" scope="row"><?= date('d-m-Y', strtotime($d['tanggal'])) . '&nbsp;' . $d['jam']; ?></td>
                            <td class="text-left" scope="row"><?= $d['nama_produk']; ?></td>
                            <td class="text-center" scope="row">
                                <?php echo $d['jumlah']; ?>
                            </td>
                            </ </tr>

                        <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>