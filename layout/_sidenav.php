<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">
        <img src="https://polsub.ac.id/wp-content/uploads/2021/12/logoPOLSUB-HD.png" alt="logo" width="60" height="60">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">EF</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../"><i class="fas fa-fire"></i> <span>Home</span></a></li>
      <?php
      if ($_SESSION['status'] == "Admin"){ ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kelola User</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_kelolauser/index.php">List User</a></li>
          <li><a class="nav-link" href="../s_kelolauser/create.php">Tambah Akun User</a></li>
        </ul>
      </li>
      <?php } ?>
      <li class="menu-header">Main Feature</li>
      <?php
      if ($_SESSION['status'] == "Admin"){ ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Alternatif</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_alternatif/index.php">List Alternatif</a></li>
          <li><a class="nav-link" href="../s_alternatif/create.php">Tambah Data Alternaitf</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kriteria</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_kriteria/index.php">List Kriteria</a></li>
          <li><a class="nav-link" href="../s_kriteria/create.php">Tambah Data Kriteria</a></li>
        </ul>
      </li>
      <?php } ?>
      <?php
      if ($_SESSION['status'] == "PJMapres"){ ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Validasi Mapres</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_alternatif/index.php">List Mapres</a></li>
          <li><a class="nav-link" href="../s_alternatif/create.php">Tambah Data Alternaitf</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kriteria</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_kriteria/index.php">List Kriteria</a></li>
          <li><a class="nav-link" href="../s_kriteria/create.php">Tambah Data Kriteria</a></li>
        </ul>
      </li>
      <?php } ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Nilai Keputusan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_nilai/create.php">Nilai</a></li>
        </ul>
      </li>
      <?php
      if ($_SESSION['status'] == "Admin"){ ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Matriks</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_matriks/index.php">Matriks</a></li>
        </ul>
      </li>
      <?php } ?>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hasil</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../s_nilai/index.php">List</a></li>
          <li><a class="nav-link" href="../s_nilai/create.php">Tambah Data</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>