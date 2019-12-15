<?php


date_default_timezone_set("Asia/Jakarta");
//error_reporting(0);

$koneksi = mysqli_connect("localhost", "root", "1", "spk");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit();
}
?>