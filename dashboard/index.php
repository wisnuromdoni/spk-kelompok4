<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nama = mysqli_query($connection, "SELECT COUNT(*) FROM mahasiswa");
$username = mysqli_query($connection, "SELECT COUNT(*) FROM login");
$nama_kriteria = mysqli_query($connection, "SELECT COUNT(*) FROM kriteria");

$total_mahasiswa = mysqli_fetch_array($nama)[0];
$total_kriteria = mysqli_fetch_array($nama_kriteria)[0];
$total_user = mysqli_fetch_array($username)[0];
;
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            <div class="card-body">
              <?= $total_user ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Mahasiswa</h4>
            </div>
            <div class="card-body">
              <?= $total_mahasiswa ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kriteria</h4>
            </div>
            <div class="card-body">
              <?= $total_kriteria ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>