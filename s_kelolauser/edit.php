<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM login WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Akun</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" required value="<?= $row['id'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><input class="form-control" type="text" name="username" required value="<?= $row['username'] ?>"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input class="form-control" type="password" name="password" required value="<?= $row['password'] ?>"></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>
                    <select class="form-control" name="status" id="status" required>
                      <option value="Admin" <?php if ($row['status'] == "Admin") {
                                              echo "selected";
                                            } ?>>Admin</option>
                      <option value="Mahasiswa" <?php if ($row['status'] == "Mahasiswa") {
                                                echo "selected";
                                              } ?>>Mahasiswa</option>
                      <option value="PJMapres" <?php if ($row['status'] == "PJMapres") {
                                              echo "selected";
                                            } ?>>PJ Mapres</option>                 
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>