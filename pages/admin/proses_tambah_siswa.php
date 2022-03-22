
<?php
// Proses Simpan
if($_POST){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no_telp'];
    $id_spp= $_POST['id_spp'];

    if(empty($nisn)){
      echo "<script>alert('NISN tidak boleh kosong');location.href='tambah_siswa.php';</script>";
   } elseif(empty($nis)){
      echo "<script>alert('NIS tidak boleh kosong');location.href='tambah_siswa.php';</script>";
   } elseif(empty($nama)){
      echo "<script>alert('Nama Siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
   } else {
      include "koneksi.php";
      $insert=mysqli_query($conn,"INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUE ('".$nisn."', '".$nis."', '".$nama."', '".$kelas."', '".$alamat."', '".$no."', '".$id_spp."')");
   if($insert){
      echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_siswa.php';</script>";
  } else {
      echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_siswa.php';</script>";
      }
      }
     }
     ?>