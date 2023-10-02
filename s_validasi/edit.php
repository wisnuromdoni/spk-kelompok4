<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_nilai = $_GET['id_nilai'];
$nim = $_GET['nim'];

$query = mysqli_query($connection, "SELECT * FROM nilai WHERE id_nilai='$id_nilai'");
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
              <!-- <input type="hidden" name="id_nilai" value="<?= $row['id_nilai'] ?>"> -->
              <table cellpadding="8" class="w-100">
              <tr>
                  <td>ID</td>
                  <td><input class="form-control" type="number" name="id_nilai" required value="<?= $row['id_nilai'] ?>"></td>
                </tr>
                <tr>
                  <td>Nilai 1</td>
                  <td><input class="form-control" type="number" name="nilai1" required value="<?= $row['nilai1'] ?>"></td>
                </tr>
                <tr>
                  <td>Nilai 2</td>
                  <td><input class="form-control" type="number" name="nilai2" required value="<?= $row['nilai2'] ?>"></td>
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