<?php
// Proses Ubah
if($_POST){
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    if(empty($nama_kelas)){
        echo "<script>alert('Nama Kelas Tidak Boleh Kosong');location.href='tampil_kelas.php';</script>";
    } else if(empty($kompetensi_keahlian)){
        "<script>alert('Kompetensi Keahlian Tidak Boleh Kosong');location.href='tampil_kelas.php';</script>";
    } else{
        include "koneksi.php";
        $update = mysqli_query($conn,"UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian'WHERE kelas.id_kelas='$id_kelas'");
        if($update){
            echo "<script>alert('Sukses mengupdate kelas');location.href='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate kelas');location.href='tampil_kelas.php';</script>";
        }
    }
}
?>