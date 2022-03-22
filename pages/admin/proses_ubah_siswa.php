<?php
// Proses update
if($_POST){
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no_telp'];

    include "koneksi.php";
    $update = mysqli_query($conn, "UPDATE siswa SET nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no' WHERE siswa.nisn='$nisn'");
        if($update){
            echo "<script>alert('Sukses mengupdate siswa');location.href='tampil_siswa.php';</script>";
        }else{
            echo "<script>alert('Gagal mengupdate siswa');location.href='ubah_siswa.php';</script>";
        }
}
?>