<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// $kelas = mysqli_query($connection, "SELECT * FROM kelas");
?>

<section class="section"> 
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Alternatif Mahasiswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>NIM</td>
                <td><input class="form-control" type="number" name="nim"></td>
              </tr>
              <tr>
                <td>Nama Mahasiswa</td>
                <td><input class="form-control" type="text" name="nama"></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>
                  <select class="form-control" name="kelas" id="kelas" required>
                    <option value="">--Pilih Kelas--</option>
                    <option value="SI 1A">SI 1A</option>
                    <option value="SI 1B">SI 1B</option>
                    <option value="SI 2A">SI 2A</option>
                    <option value="SI 2B">SI 2B</option>
                    <option value="SI 3A">SI 3A</option>
                    <option value="SI 3B">SI AB</option>
                    <option value="TRPL">TRPL</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Tempat Lahir</td>
                <td><input class="form-control" type="text" name="tempat_lahir" size="20"></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><input class="form-control" type="date" id="datepicker" name="tgl_lahir"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><textarea class="form-control" name="email" ></textarea></td>
              </tr>
              <tr>
                <td>Nomor HP</td>
                <td><input class="form-control" type="text" name="no_hp"></td>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="Alamat"></td>
              </tr>
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
</section>

<?php
require_once '../layout/_bottom.php';
?>