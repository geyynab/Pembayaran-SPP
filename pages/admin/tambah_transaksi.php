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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Transaksi</h4>
                  <form action="proses_tambah_transaksi.php" method="POST">
                  <p class="card-description">
                    Masukkan Data Transaksi di sini.
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label>Petugas</label>
                      <select name="id_petugas" class="form-control">
                          <option value="not_option">Pilih Petugas</option>
                          <?php include "koneksi.php"; 
                          $qry_petugas=mysqli_query($conn, "SELECT * FROM petugas ORDER BY id_petugas");
                          while($dt_petugas=mysqli_fetch_array($qry_petugas)){
                            echo '<option value="'.$dt_petugas['id_petugas'].'">'.$dt_petugas['nama_petugas'].'</option>';
                          }
                          ?>`
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NISN</label>
                      <input type="text" name="nisn" class="form-control" placeholder="NISN">
                    </div>
                    <div class="form-group">
                      <label>Nama Siswa</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                    </div>
                    <!-- <div class="form-group">
                      <label>Tanggal Bayar</label>
                      <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal Bayar">
                    </div> -->
                    <div class="form-group">
                      <label>Bulan</label>
                      <select class="form-control" name="bulan_dibayar">
                        <option>Pilih Bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                  </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun Bayar</label>
                      <input type="number" name="tahun_dibayar" class="form-control" placeholder="Tahun Bayar">
                    </div>
                    <div class="form-group">
                      <label>SPP</label>
                      <select name="id_spp" class="form-control">
                          <option value="not_option">Pilih Angkatan</option>
                          <?php include "koneksi.php"; 
                          $qry_spp=mysqli_query($conn, "SELECT * FROM spp ORDER BY id_spp");
                          while($dt_spp=mysqli_fetch_array($qry_spp)){
                            echo '<option value="'.$dt_spp['id_spp'].'">'.$dt_spp['angkatan']. " | " .$dt_spp['nominal'].'</option>'; 
                          }
                          ?>`
                      </select>
                    </div>
                    <!-- <div class="form-group">
                      <label>Jumlah Bayar</label>
                      <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar">
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </form>
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
