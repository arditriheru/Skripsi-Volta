<?php include('templates/header.php'); ?>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <img src="img/header.jpg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <form method="post" action="login_proses.php" class="row g-3">
                    <h4 class="text-center">Silahkan Login</h4>
                    <div class="col-12">
                        <label><b>Username</b></label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username anda..">
                    </div>
                    <div class="col-12">
                        <label><b>Password</b></label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Masukkan password anda..">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>