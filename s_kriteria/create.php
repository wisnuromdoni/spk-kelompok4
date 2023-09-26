<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kriteria = mysqli_query($connection, "SELECT * FROM kriteria");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Kriteria</h1>
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
                <td>Kriteria</td>
                <td><input class="form-control" type="text" name="kriteria"></td>
              </tr>
              <tr>
                <td>Bobot</td>
                <td><input class="form-control" type="number" name="bobot"></td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>
                  <select class="form-control" name="kategori" id="kategori" required>
                    <option value="">--Pilih Kategori--</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                  </select>
                </td>
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