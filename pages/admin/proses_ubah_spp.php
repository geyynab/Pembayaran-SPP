<?php
// Proses Ubah
if($_POST){
    $id_spp = $_POST['id_spp'];
    $nominal = $_POST['nominal'];
    if(empty($nominal)){
        echo "<script>alert('Nominal Pembayaran Tidak Boleh Kosong');location.href='ubah_spp.php';</script>";
    } else{
        include "koneksi.php";
        $update = mysqli_query($conn,"UPDATE spp SET nominal='$nominal' WHERE id_spp='$id_spp'");
        if($update){
            echo "<script>alert('Sukses mengupdate spp');location.href='tampil_spp.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate spp');location.href='tampil_spp.php';</script>";
        }
    }
}
?>