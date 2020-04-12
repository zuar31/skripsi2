<?php session_start();

//include "../../config/koneksi.php";
//
//
//$module=$_GET['module'];
//$act=$_GET['act'];
//
////print_r($_POST);
////print_r($_GET);
////
////die();
////echo $module;
////die();
//// Hapus college_schedule
//if ($module=='clustering_kmeanstes1' AND $act=='input'){
//  
//  mysqli_query($koneksi,"DELETE FROM admin WHERE id='$_GET[id_rekap]'");
//  header('location:../../module.php?module='.$module);
// 
//}
//
//// Input college_schedule
//elseif ($module=='users' AND $act=='input'){
//  $pass = md5($_POST[password]);
//  mysqli_query($koneksi,"INSERT INTO rekap_kmeans(periode_awal,periode_akhir,hight,medium,low) VALUES('$_POST[periode_awal]','$_POST[periode_akhir]','$_POST[hight]','$_POST[medium])");
//  header('location:../../module.php?module='.$module);
//}
//
//// Update Kategori
//elseif ($module=='users' AND $act=='update'){
//    
//    if(empty($_POST[password])){
//        
//  mysqli_query($koneksi,"UPDATE admin SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',username = '$_POST[username]' WHERE id = '$_POST[id]'");
// 
//    }else{
//        $pass = md5($_POST[password]);
//  mysqli_query($koneksi,"UPDATE admin SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',username = '$_POST[username]',password = '$pass' WHERE id = '$_POST[id]'");
// 
//    }
//   header('location:../../module.php?module='.$module);
//}
?>