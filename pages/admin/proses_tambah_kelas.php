<?php
// Proses Simpan
if($_POST){
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    if(empty($nama_kelas)){
        echo "<script>alert('nama kelas tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    } else if(empty($kompetensi_keahlian)){
        "<script>alert('kompetensi keahlian tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    } else{
        include "koneksi.php";
        $insert = mysqli_query($conn,"INSERT INTO kelas (nama_kelas, kompetensi_keahlian) value ('".$nama_kelas."','".$kompetensi_keahlian."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan kelas');location.href='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan kelas');location.href='tambah_kelas.php';</script>";
        }
    }
}
?>