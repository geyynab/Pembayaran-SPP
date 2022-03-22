<<?php
if($_GET['id_spp']){
include "koneksi.php";
$qry_hapus=mysqli_query($conn,"DELETE FROM spp WHERE id_spp='".$_GET['id_spp']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus spp');location.href='tampil_spp.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus spp');location.href='tampil_spp.php';</script>";
}
}
?>