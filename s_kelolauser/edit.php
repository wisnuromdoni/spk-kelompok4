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
                  <td>Kelas</td>
                  <td>
                    <select class="form-control" name="status" id="status" required>
                      <option value="Admin" <?php if ($row['status'] == "Admin") {
                                              echo "selected";
                                            } ?>>Admin</option>
                      <option value="Mahasiswa" <?php if ($row['status'] == "Mahasiswa") {
                                                echo "selected";
                                              } ?>>Mahasiswa</option>
                      <option value="PJ Mapres" <?php if ($row['kelas'] == "SI 2A") {
                                              echo "selected";
                                            } ?>>SI 2A</option>
                      <option value="SI 2B" <?php if ($row['kelas'] == "S2 1B") {
                                                echo "selected";
                                              } ?>>SI 2B</option>
                      <option value="SI 3A" <?php if ($row['kelas'] == "SI 3A") {
                                              echo "selected";
                                            } ?>>SI 3A</option>
                      <option value="SI 3B" <?php if ($row['kelas'] == "SI 3B") {
                                                echo "selected";
                                              } ?>>SI 3B</option>   
                      <option value="TRPL" <?php if ($row['kelas'] == "TRPL") {
                                                echo "selected";
                                              } ?>>TRPL</option>                 
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input class="form-control" type="text" name="tempat_lahir" required value="<?= $row['tempat_lahir'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><input class="form-control" type="date" name="tgl_lahir" required value="<?= $row['tgl_lahir'] ?>"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td colspan="3"><textarea class="form-control" name="email" id="email" required><?= $row['email'] ?></textarea></td>
                </tr>
                <tr>
                <tr>
                  <td>Nomor HP</td>
                  <td colspan="3"><textarea class="form-control" name="no_hp" id="np_hp" required><?= $row['no_hp'] ?></textarea></td>
                </tr>
                  <td>Alamat</td>
                  <td colspan="3"><textarea class="form-control" name="alamat" id="alamat" required><?= $row['alamat'] ?></textarea></td>
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