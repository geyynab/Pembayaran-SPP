<<?php
if($_GET['id_pembayaran']){
include "koneksi.php";
$qry_hapus=mysqli_query($conn,"DELETE FROM pembayaran WHERE id_pembayaran='".$_GET['id_pembayaran']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses hapus transaksi');location.href='list_kelas.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus transaksi');location.href='tampil_transaksi.php';</script>";
}
}
?>