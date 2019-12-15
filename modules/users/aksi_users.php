<?php
session_start();

include "../../config/koneksi.php";


$module=$_GET['module'];
$act=$_GET['act'];

//print_r($_POST);
//print_r($_GET);
//
//die();
//echo $module;
//die();
// Hapus college_schedule
if ($module=='users' AND $act=='delete'){
  
  mysqli_query($koneksi,"DELETE FROM admin WHERE id='$_GET[id]'");
  header('location:../../module.php?module='.$module);
 
}

// Input college_schedule
elseif ($module=='users' AND $act=='input'){
  $pass = md5($_POST[password]);
  mysqli_query($koneksi,"INSERT INTO admin(nama,alamat,username,password) VALUES('$_POST[nama]','$_POST[alamat]','$_POST[username]','$pass')");
  header('location:../../module.php?module='.$module);
}

// Update Kategori
elseif ($module=='users' AND $act=='update'){
    
    if(empty($_POST[password])){
        
  mysqli_query($koneksi,"UPDATE admin SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',username = '$_POST[username]' WHERE id = '$_POST[id]'");
 
    }else{
        $pass = md5($_POST[password]);
  mysqli_query($koneksi,"UPDATE admin SET nama = '$_POST[nama]',alamat = '$_POST[alamat]',username = '$_POST[username]',password = '$pass' WHERE id = '$_POST[id]'");
 
    }
   header('location:../../module.php?module='.$module);
}
?>