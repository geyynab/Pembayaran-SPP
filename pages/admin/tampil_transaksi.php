<?php
session_start();
if($_SESSION['status_login']!=true){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
<?php 
include "navbar.php"; 
?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index_admin.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Siswa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="siswa">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tampil_siswa.php">Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="tampil_kelas.php">Kelas</a></li>
                <li class="nav-item"> <a class="nav-link" href="tampil_spp.php">SPP</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_petugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Data Petugas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="list_kelas.php">Pembayaran</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">History</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./petugas/login.php"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="logout.php"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
     
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="card-tittle">Profil Siswa</h4>
                  <img src="https://www.seekpng.com/png/detail/966-9665493_my-profile-icon-blank-profile-image-circle.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                  <?php include "koneksi.php";
                  $qry_siswa=mysqli_query($conn,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.nisn=" .$_GET['nisn']);
                  $dt_siswa= mysqli_fetch_array($qry_siswa);?>
                  <h6 class="my-3"><?=$dt_siswa['nama']?></h6>
                  <p class="text-muted mb-1"><?=$dt_siswa['nama_kelas']?> <?=$dt_siswa['kompetensi_keahlian']?>
                    <div class="d-flex justify-content-center mb-2"></div>
                    <td><a href="cetak.php?nisn=<?=$dt_siswa['nisn']?>" class="btn btn-primary" target="_blank">Cetak Laporan Transaksi</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card mb-4">
                <div class="card-body">
                  <!-- <h4 class="card-tittle">Profile Siswa</h4> -->
                  <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">NISN</pISN>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['nisn']?></p>
                  </div>
                </div><hr>
                  <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nama</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['nama']?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">NIS</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['nis']?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Kelas</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['nama_kelas']?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Kompetensi Keahlian</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['kompetensi_keahlian']?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Alamat</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['alamat']?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">No. Telp</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$dt_siswa['no_telp']?></p>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transaksi</h4>
                  <p class="card-description">
                    Transaksi dan Histori Transaksi
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>NO</th><th>ID PETUGAS</th><th>NISN</th><th>TGL BAYAR</th><th>SPP</th><th>BULAN</th><th>TAHUN</th><th>JMLH BAYAR</th><th>STATUS</th><th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include "koneksi.php";
                        $qry_transaksi=mysqli_query($conn,"SELECT * FROM pembayaran JOIN spp ON spp.id_spp=pembayaran.id_spp WHERE pembayaran.nisn=" .$_GET['nisn']);
                        $no=0;
                        while($dt_transaksi=mysqli_fetch_array($qry_transaksi)){
                            $no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$dt_transaksi['id_petugas']?></td>
                                <td><?=$dt_transaksi['nisn']?></td>
                                <td><?=$dt_transaksi['tgl_bayar']?></td>
                                <td><?=$dt_transaksi['nominal']?></td>
                                <td><?=$dt_transaksi['bulan_dibayar']?></td>
                                <td><?=$dt_transaksi['tahun_dibayar']?></td>
                                <td><?=$dt_transaksi['jumlah_bayar']?></td>
                                <td><?php
                                if($dt_transaksi['tgl_bayar']=='0000-00-00'){ 
                                    echo "<a class='btn btn-primary btn-sm' href='proses_transaksi.php?id_pembayaran=$dt_transaksi[id_pembayaran]&nisn=$dt_transaksi[nisn]'>Bayar</a> ";
                                } else {
                                    echo "<span class= 'badge badge-success'>LUNAS</span>";
                                }?>
                                            
                                <td><a href="hapus_transaksi.php?id_pembayaran=<?=$dt_transaksi['id_pembayaran']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a></td>
                            </tr>
                            <?php } ?>
                            <?php
                            ?>
                      </tbody>
                    </table>
                    <br><td><a href="tambah_transaksi.php" class="btn btn-outline-primary">Tambah Transaksi</a>
                  </div>
                </div>
          </div>
        </div>
      </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>