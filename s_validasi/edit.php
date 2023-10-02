<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$nim = $_GET['nim'];

$query = mysqli_query($connection, "SELECT * FROM nilai WHERE id='$id'");
$query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim='$nim'");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Validasi nilai Mahasiswa</h1>
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
              <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" n required value="<?= $row['id'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nilai 1</td>
                  <td><input class="form-control" type="text" name="nilai1" required value="<?= $row['nilai1'] ?>"></td>
                </tr>
                <tr>
                  <td>Nilai 2</td>
                  <td><input class="form-control" type="text" name="nilai2" required value="<?= $row['nilai2'] ?>"></td>
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