<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$result=[];
// $result = mysqli_query($connection, "SELECT * FROM matrix");
$result = mysqli_query($connection, "SELECT * FROM nilai, mahasiswa where mahasiswa.nim = mahasiswa.nim");
// $result = mysqli_query($connection, "SELECT * FROM mahasiswa");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Nilai</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Nilai 1</th>
                  <th>Nilai 2</th>
                  <th>Nilai 3</th>
                  <th>Nilai 4</th>
                  <th>Nilai 5</th>
                  <!-- <th style="width: 150">Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <tr class="text-center">
                    <td><?= $no ?></td>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nilai1'] ?></td>
                    <td><?= $data['nilai2'] ?></td>
                    <td><?= $data['nilai3'] ?></td>
                    <td><?= $data['nilai4'] ?></td>
                    <td><?= $data['nilai5'] ?></td>
                    <!-- <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['id'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td> -->
                  </tr>

                <?php
                  $no++;
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>