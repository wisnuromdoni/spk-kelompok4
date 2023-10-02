<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Variabel untuk menyimpan status yang dipilih oleh pengguna (diinisialisasi dengan "Mahasiswa" agar tabel ditampilkan secara default)
$statusPengguna = "Mahasiswa";
$showMahasiswaFields = true; // Menampilkan field Mahasiswa secara default

if (isset($_POST['status'])) {
  $statusPengguna = $_POST['status'];

  // Jika status bukan "Mahasiswa," sembunyikan field Mahasiswa
  if ($statusPengguna !== "Mahasiswa") {
    $showMahasiswaFields = false;
  }
}
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah User</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Username</td>
                <td><input class="form-control" type="text" name="username"></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input class="form-control" type="password" name="password"></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>
                  <select class="form-control" name="status" id="status" required>
                    <option value="">--Pilih Status User--</option>
                    <option value="Admin">Admin</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="PJMapres">PJ Mapres</option>
                  </select>
                </td>
              </tr>
              <?php if ($showMahasiswaFields) { ?>
                <tr>
                  <td>NIM</td>
                  <td><input class="form-control" type="number" name="nim"></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama"></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td>
                    <select class="form-control" name="kelas" required>
                      <option value="">--Pilih Kelas--</option>
                      <option value="SI 1A">SI 1A</option>
                      <option value="SI 1B">SI 1B</option>
                      <option value="SI 2A">SI 2A</option>
                      <option value="SI 2B">SI 2B</option>
                      <option value="SI 3A">SI 3A</option>
                      <option value="SI 3B">SI 3B</option>
                      <option value="TRPL">TRPL</option>
                    </select>
                  </td>
                </tr>
              <?php } ?>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Dapatkan elemen select status
  const statusSelect = document.getElementById("status");

  // Dapatkan elemen input NIM, Nama, dan Kelas
  const nimInput = document.querySelector("input[name='nim']");
  const namaInput = document.querySelector("input[name='nama']");
  const kelasSelect = document.querySelector("select[name='kelas']");

  // Fungsi untuk menampilkan atau menyembunyikan field Mahasiswa berdasarkan status
  function toggleMahasiswaFields() {
    if (statusSelect.value === "Mahasiswa") {
      nimInput.parentElement.parentElement.style.display = "table-row"; // Tampilkan input NIM
      namaInput.parentElement.parentElement.style.display = "table-row"; // Tampilkan input Nama
      kelasSelect.parentElement.parentElement.style.display = "table-row"; // Tampilkan select Kelas
    } else {
      nimInput.parentElement.parentElement.style.display = "none"; // Sembunyikan input NIM
      namaInput.parentElement.parentElement.style.display = "none"; // Sembunyikan input Nama
      kelasSelect.parentElement.parentElement.style.display = "none"; // Sembunyikan select Kelas
    }
  }

  // Panggil fungsi saat halaman dimuat dan saat status berubah
  toggleMahasiswaFields();
  statusSelect.addEventListener("change", toggleMahasiswaFields);
</script>

<?php
require_once '../layout/_bottom.php';
?>