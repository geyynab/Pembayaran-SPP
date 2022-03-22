<!DOCTYPE html>
<html>
    <head>
          <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <style>
      h4{
        margin:0 150px;
        padding-top: 10px;
      }
  </style>
    </head>
    <body>
        <center>
            <h2>LAPORAN PEMBAYARAN SPP</h2>
            <h4>SMK TELKOM MALANG</h4></p>
        </center>
        <?php
        include "koneksi.php";
        $qry_siswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn=" .$_GET['nisn']);
        $dt_siswa=mysqli_fetch_array($qry_siswa);
        ?>
        <tr>
            <th>NISN :</th>
            <td><?=$dt_siswa['nisn']?><br>
        </tr>
        <tr>
            <th>Nama Siswa :</th>
            <td><?=$dt_siswa['nama']?><br>
        </tr>
        <tr>
            <th>Kelas :</th>
            <td><?=$dt_siswa['nama_kelas']?><br>
        </tr>
        <tr>
            <th>Kompetensi Keahlian :</th>
            <td><?=$dt_siswa['kompetensi_keahlian']?><br>
        </tr>
        <tr>
            <th>Alamat :</th>
            <td><?=$dt_siswa['alamat']?><br>
        </tr>
        <tr>
            <th>No. Telp :</th>
            <td><?=$dt_siswa['no_telp']?></br>
        </tr>
        <?php
        include "koneksi.php";
        ?>
        <br>
        <table class="table table-bordered">
            <thead>
                <th>NO</th>
                <th>Tanggal Bayar</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah Bayar</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php include "koneksi.php";
                $qry_laporan=mysqli_query($conn, "SELECT * FROM pembayaran WHERE nisn=" .$_GET['nisn']);
                $no=0;
                while($dt_laporan=mysqli_fetch_array($qry_laporan)){
                    if($dt_laporan['tgl_bayar']!=='0000-00-00'){
                        $no++;?>
                        <tr>
                                <td><?=$no?></td>
                                <td><?=$dt_laporan['tgl_bayar']?></td>
                                <td><?=$dt_laporan['bulan_dibayar']?></td>
                                <td><?=$dt_laporan['tahun_dibayar']?></td>
                                <td><?=$dt_laporan['jumlah_bayar']?></td>
                                <td><?php
                                if($dt_laporan['tgl_bayar']=='0000-00-00'){ 
                                    echo "Belum Lunas";
                                } else {
                                    echo "Lunas";
                                }
                                ?>
                            </tr>
                            <?php } 
                            }?>
                            <?php
                            ?>
            </tbody>
        </table>
        <script>window.print();</script>
    </body>
</html>