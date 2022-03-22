<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "select * from petugas where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    if($data['level'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        $_SESSION['status_login']=true;
        //mengalihkan ke halaman admin
        header("location: index_admin.php");
    } else if ($data['level'] == "petugas"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        $_SESSION['status_login']=true;
        //mengalihkan ke halaman petugas
        header("location: ../petugas/index_petugas.php");
    } else {
        //mengalihkan ke halaman login kembali
        header("location: login.php?pesan=gagal login");
    }
} else {
    echo "<script>alert('Username atau Password salah');location.href='login.php';</script>";
}
?>
