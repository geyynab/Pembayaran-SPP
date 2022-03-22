<?php
// Proses Simpan
if($_POST){
    $tahun= $_POST['tahun'];
    $angkatan= $_POST['angkatan'];
    $nominal= $_POST['nominal'];
    if(empty($tahun)){
        echo "<script>alert('Tahun masuk tidak boleh kosong');location.href='tambah_spp.php';</script>";
    } else if(empty($angkatan)){
        "<script>alert('Angkatan tidak boleh kosong');location.href='tambah_spp.php';</script>";
    } else{
        include "koneksi.php";
        $insert = mysqli_query($conn,"INSERT INTO spp (tahun, angkatan, nominal) value ('".$tahun."','".$angkatan."','".$nominal."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan SPP');location.href='tampil_spp.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan SPP');location.href='tambah_spp.php';</script>";
        }
    }
}
?>