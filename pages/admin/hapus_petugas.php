<<?php
if($_GET['id_petugas']){
include "koneksi.php";
$qry_hapus=mysqli_query($conn,"DELETE FROM petugas WHERE id_petugas='".$_GET['id_petugas']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus petugas');location.href='tampil_petugas.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus petugas');location.href='tampil_petugas.php';</script>";
}
}
?>