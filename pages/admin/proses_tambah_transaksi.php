<?php
// Proses Simpan
if($_POST){
    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $nama=$_POST['nama'];
    // $tgl_bayar = $_POST['tgl_bayar'];
    $bulan = $_POST['bulan_dibayar'];
    $tahun = $_POST['tahun_dibayar'];
    $id_spp = $_POST['id_spp'];
    // $jumlah_bayar= $_POST['jumlah_bayar'];

    if(empty($id_petugas)){
      echo "<script>alert('Petugas tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
   } elseif(empty($nisn)){
      echo "<script>alert('NISN tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($bulan)){
        echo "<script>alert('Bulan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($tahun)){
        echo "<script>alert('Tahun Pembayaran tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($id_spp)){
        echo "<script>alert('SPP tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
   } else {
      include "koneksi.php";
      $insert=mysqli_query($conn, "INSERT INTO pembayaran (id_petugas, nisn, bulan_dibayar, tahun_dibayar, id_spp) VALUES ('".$id_petugas."','".$nisn."','".$bulan."','".$tahun."','".$id_spp."')");
   if($insert){
      echo "<script>alert('Sukses menambahkan transaksi');location.href='list_kelas.php';</script>";
  } else {
        echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
      }
      }
     }
     ?>