<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// $kelas = mysqli_query($connection, "SELECT * FROM kelas");
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
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
            <!-- <tr>
                <td>ID</td>
                <td><input class="form-control" type="text" name="id"></td>
              </tr> -->
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