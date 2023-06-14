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
                <p>Stok Produk</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Beauty Lux
            </figcaption>
        </figure>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 mb-3">

            <?php if(isset($_GET['action']) &&  $_GET['action'] == 'add'){ ?>

                <form method="post" action="produk_kategori_tambah.php" class="row g-3" enctype="multipart/form-data">
                    <div class="col-4">
                        <label><b>Nama Produk</b></label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Contoh : LUX ACNE SERUM" required>
                    </div>
                    <div class="col-4">
                        <label><b>Nama Produk</b></label>
                        <select name="id_produk_kategori" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <?php
                            $no = 0;
                            include 'templates/koneksi.php';
                            $data = mysqli_query(
                                $koneksi,
                                "SELECT * FROM produk_kategori;"
                            );
                            while ($a = mysqli_fetch_array($data)) { ?>

                            <option value="<?= $a['id_produk_kategori']; ?>"><?= $a['nama_kategori']; ?></option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-2">
                        <label><b>Harga</b></label>
                        <input type="number" name="harga" class="form-control" placeholder="50000" required>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary float-left mt-4">Tambah</button>
                    </div>
                </form>

            <?php } ?>

</div>
        <div class="col-md-12">
            <a href="?action=add" class="btn btn-success btn-sm mb-3 noprint"><i
                    class="fa-solid fa-plus"></i> Produk Item</a>
            <a href="?print=t" class="btn btn-primary btn-sm mb-3 noprint"><i class="fa-solid fa-print"></i> Print
                Stok</a>

            <?php if (!empty($_GET['print'])) : ?>
            <script>
            window.print();
            </script>
            <?php endif; ?>

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
                    SELECT * FROM produk ORDER BY nama_produk ASC
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
                                    echo '&nbsp;<span class="badge bg-danger">Menipis</span>';
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