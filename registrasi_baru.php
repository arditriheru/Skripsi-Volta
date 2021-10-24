<?php include('templates/header.php'); ?>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <img src="img/header.jpg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="row mt-3 mb-5">
        <div class="col">
            <?php include('menu.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="registrasi_baru_tambah.php" class="row g-3">
                <h4 class="text-center">Registrasi Pasien Baru</h4>
                <div class="col-12">
                    <label><b>Nama Lengkap</b></label>
                    <input type="text" name="nama" class="form-control" placeholder="Tuliskan nama lengkap..">
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <label><b>Tempat Lahir</b></label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tuliskan tempat lahir..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">
                        <label><b>Tanggal Lahir</b></label>
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tuliskan tanggal lahir..">
                    </div>
                </div>
                <div class="col-12">
                    <label><b>Kontak</b></label>
                    <input type="number" name="no_hp" class="form-control" placeholder="Tuliskan kotak..">
                </div>
                <div class="col-12">
                    <label><b>Alamat Lengkap</b></label>
                    <div class="form-floating">
                        <textarea class="form-control" name="alamat" placeholder="Tuliskan alamat lengkap.." id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Tuliskan alamat lengkap..</b></label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>