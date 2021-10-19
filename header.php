<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:index.php');
} else {
    $id_user = $_SESSION['id_user'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">

<head profile="http://gmpg.org/xfn/11">
    <title>Elja Ticket</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="imagetoolbar" content="no" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/layout_admin.css" type="text/css" />
    <link rel="stylesheet" href="styles/contoh-gambar-zoom.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style-responsive.css">

    <script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="scripts/jquery.timers.1.2.js"></script>
    <script type="text/javascript" src="scripts/jquery.galleryview.2.1.1.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.galleryview.setup.js"></script>
</head>

<body id="top">
    <div class="wrapper">
        <div id="header">
            <div class="fl_left">
                <h1><img src='images/header.jpg' width=1000 height=100></h1>
            </div>
        </div>
    </div>