<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id']; 
$query = mysqli_query($connection, "SELECT * FROM kriteria WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Kriteria</h1>
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
                  <td>ID Kriteria</td>
                  <td><input class="form-control" required value="<?= $row['id'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Kriteria</td>
                  <td><input class="form-control"  type="text" name="nama" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Bobot</td>
                  <td><input class="form-control" type="number" name="bobot" required value="<?= $row['bobot'] ?>"></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>
                    <select class="form-control" name="jenis" id="jenis" required>
                      <option value="Benefit" <?php if ($row['jenis'] == "Benefit") {
                                              echo "selected";
                                            } ?>>Benefit</option>
                      <option value="Cost" <?php if ($row['jenis'] == "Cost") {
                                                echo "selected";
                                              } ?>>Cost</option>
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