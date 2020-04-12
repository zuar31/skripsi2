<?php

include "config/koneksi.php";

//if(!isset($_SESSION))session_start())

// Bagian Home
if ($_GET['module'] == 'home') {
    include"modules/home/home.php";
} else

// Bagian users
if ($_GET['module'] == 'users') {
    include"modules/users/users.php";
}else

// Bagian monitoring_ids
if ($_GET['module'] == 'monitoring_ids') {
    include"modules/monitoring_ids/monitoring_ids.php";
}else
    
// Bagian  clustering_kmeans
if ($_GET['module'] == 'clustering_kmeans') {
//    include"modules/clustering_kmeans/clustering_kmeans.php";
    include"modules/clustering_kmeans/clustering_kmeanstes1.php";
}
else

// Bagian rekap
if ($_GET['module'] == 'rekap') {
    include"modules/rekap/rekap.php";
}

// Apabila modul tidak ditemukan
else {
    echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
