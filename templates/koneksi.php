<?php
date_default_timezone_set("Asia/Jakarta");
$koneksi = mysqli_connect("localhost", "root", "", "db_superglow");
if (mysqli_connect_error()) {
    echo "Database not connected : " . mysqli_connect_error();
}
