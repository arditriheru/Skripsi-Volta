<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Helocho">

    <title>Helocho</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="wrapper">
                <div id="header">
                    <div class="fl_left">
                        <h1><img src='images/header.jpg' width=1000 height=100></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/ .header -->
        <section id="form_login">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    <div class="login-form">
                        <!--login form-->
                        <h2 align="center">LOGIN</h2>
                        <form method="post" action="login_proses.php">
                            <input name="username" type="text" placeholder="Username"> </tr>
                            <input name="email" type="password" placeholder="Email">
                            <span>
                                <button name="submit" type="submit" class="btn btn-default">Login</button>
                            </span>

                        </form>
                    </div>
                    <!--/login form-->
                </div>
            </div>
        </section>
    </div>

</body>

</html>