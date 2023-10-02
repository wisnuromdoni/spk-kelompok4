<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <!-- Sidebar Logo and Brand -->
    <!-- ... (kode logo) ... -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../"><i class="fas fa-fire"></i> <span>Home</span></a></li>

      <!-- Menu untuk Admin -->
      <?php if ($_SESSION['status'] == "Admin") : ?>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i> <span>Kelola User</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_kelolauser/index.php">List User</a></li>
            <li><a class="nav-link" href="../s_kelolauser/create.php">Tambah Akun User</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Alternatif</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_alternatif/index.php">List Alternatif</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kriteria</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_kriteria/index.php">List Kriteria</a></li>
            <li><a class="nav-link" href="../s_kriteria/create.php">Tambah Data Kriteria</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Matriks</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_matriks/index.php">Matriks</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hasil</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_hasik/index.php">Hasil Keputusan</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <!-- Menu untuk PJ Mapres -->
      <?php if ($_SESSION['status'] == "PJMapres") : ?>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Validasi Mapres</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_validasi/index.php">List Mapres</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <!-- Menu untuk Mahasiswa -->
      <?php if ($_SESSION['status'] == "Mahasiswa") : ?>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Nilai Keputusan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_nilai/create.php">Nilai</a></li>
            <li><a class="nav-link" href="../s_nilai/index.php">Nilai Mahasiswa</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hasil</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="../s_hasik/index.php">Hasil Keputusan</a></li>
          </ul>
        </li>
      <?php endif; ?>
    </ul>
    <!-- ... (kode lainnya) ... -->
  </aside>
</div>