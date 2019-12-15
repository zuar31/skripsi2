<?php

include "config/koneksi.php";
$username = $_POST['username'];
$pass     = md5($_POST['password']);


$login=mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);


//echo $pass;
//print_r($r);
//die();


// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[id_student]      = $r[id_student];
  $_SESSION[username]     = $r[username];
  header('location:module.php?module=home');
}
else{
    header('location:module.php?module=home');

  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir<br>";
  echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";

}

?>
