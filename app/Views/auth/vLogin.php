<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= getTabTitle(); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/login/images/icons/favicon.jpg" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/css/main.css">
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="post" class="login100-form validate-form" action="<?= base_url('magang/Login/login'); ?>" role="form">
                    <span class="login100-form-title p-b-43">
                        LOGIN<br>
                        <p>Silahkan login</p>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid username is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn mb-5 mt-5">
                        <button type="submit" class="login100-form-btn">
                            Sign In
                        </button>
                    </div>

                    <div class="login100-form-social flex-c-m mb-5">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>

                    </div>
                    <p class="text-center">Copyright © 2021 Fakultas Hukum UII</p>
                </form>

                <div class="login100-more" style="background-image: url('<?= base_url(); ?>/login/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/animsition/js/animsition.min.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>/login/vendor/countdowntime/countdowntime.js"></script>
    <script src="<?= base_url(); ?>/login/js/main.js"></script>

</body>

</html>