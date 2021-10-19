<?php include 'header.php'; ?>

<?php include 'menu.php'; ?>

<div class="container">
    <section id="form_login">
        <div class="row">
            <div class="col-md-6">
                <div class="login-form">
                    <h2 align="center">Pasien Lama</h2>
                    <form action="penonton_simpan.php" method="post" enctype="multipart/form-data" />
                    <input type="text" name="id_penonton" size="35" placeholder="ID *isi sesuai No.KTP/ kartu pelajar" />
                    <input type="text" name="nama" size="35" placeholder="Nama Lengkap" />
                    <input type="text" name="username" size="30" placeholder="Username" />
                    <input type="password" name="password" size="30" placeholder="Password" />
                    <div align="center">
                        <span>
                            <button name="submit" type="submit" class="btn btn-default">Daftar</button>
                        </span>
                    </div>
                    </form>
                </div><br>
            </div>
            <div class="col-md-6">
                <div class="login-form">
                    <h2 align="center">Pasien Baru</h2>
                    <form action="penonton_simpan.php" method="post" enctype="multipart/form-data" />
                    <input type="text" name="id_penonton" size="35" placeholder="ID *isi sesuai No.KTP/ kartu pelajar" />
                    <input type="text" name="nama" size="35" placeholder="Nama Lengkap" />
                    <input type="text" name="username" size="30" placeholder="Username" />
                    <input type="password" name="password" size="30" placeholder="Password" />
                    <div align="center">
                        <span>
                            <button name="submit" type="submit" class="btn btn-default">Daftar</button>
                        </span>
                    </div>
                    </form>
                </div><br>
            </div>
        </div>
        <br>
    </section>
    <!--/form-->
</div>

<?php include 'footer.php'; ?>