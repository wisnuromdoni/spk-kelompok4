<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$mahasiswa = mysqli_query($connection, "SELECT nim,nama FROM mahasiswa");
$matkul = mysqli_query($connection, "SELECT kode_matkul,nama_matkul FROM matakuliah");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Nilai</h1>
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
                <td>Nama Mahasiswa</td>
                <td>
                  <select class="form-control" name="nim" id="nim" required>
                    <option value="">--Pilih Mahasiswa--</option>
                    <?php
                    while ($r = mysqli_fetch_array($mahasiswa)) :
                    ?>
                      <option value="<?= $r['nim'] ?>"><?= $r['nama'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
                </td>
              </tr>
            </table>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $sql = 'SELECT * FROM kriteria';
                            $result = mysqli_query($connection, $sql);

                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {

                            ?>

                        <tr>
                            <th scope="row"><?php echo $row['id_kriteria'] ?></th>
                            <td><?php echo $row['nama_kriteria'] ?></td>
                            <td><?php echo $row['bobot'] ?></td>
                            <td><?php echo $row['kategori'] ?></td>
                            <td><input class="form-control" type="number" name="nilai_<?php echo $row['id_kriteria'] ?>" /></td>
                        </tr>

                        <?php

                            }

                            ?>
                        <!-- Num rows -->
                        <input type="hidden" name="num_rows" value="<?php echo mysqli_num_rows($result) ?>" />
                    </tbody>
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