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
        <div class="col-md-6">

            <?php
            $id_customer = $_GET['id_customer'];

            $no = 1;
            include 'templates/koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer=$id_customer");
            while ($d = mysqli_fetch_array($query)) {
            ?>

                <form method="post" action="daftar_treatment_tambah.php" class="row g-3">
                    <h4 class="text-center">Daftar Treatment</h4>
                    <div class="col-12">
                        <label><b>Nomor RM</b></label>
                        <input type="text" name="id_customer" class="form-control" value="<?= $d['id_customer']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label><b>Nama Lengkap</b></label>
                        <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label><b>Nama Dokter</b></label>
                        <select name="dokter" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="dr. Ullya Nor Rosyidah">dr. Ullya Nor Rosyidah</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label><b>Konsultasi</b></label>
                        <select name="konsultasi" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label><b>Kondisi Awal</b></label>
                        <input type="text" name="note" class="form-control" placeholder="Tambahkan catatan jika perlu.." required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Daftarkan</button>
                    </div>
                </form>

            <?php } ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>