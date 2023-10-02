<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM mahasiswa");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Matriks</h1>
  </div>
   <div class="card mb-3">
            <h2 class="card-header py-5 text-center">TABEL NILAI KEPUTUSAN</h2>
            <div class="card-body">
                <table class="table nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <?php

                                    $sql = "SELECT * FROM kriteria";

                                    $result = mysqli_query($connection, $sql);

                                    $bobot = array();
                                    $kategori = array();

                                    while ($row = mysqli_fetch_array($result)) {
                                        array_push($bobot, $row['bobot']);
                                        array_push($kategori, $row['kategori']);

                                    ?>

                            <th scope="col"><?php echo $row['id_kriteria']; ?></th>

                            <?php

                                    }

                                    ?>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                $sql_t = "SELECT
                                            mahasiswa.nim, mahasiswa.nama";

                                for ($i = 1; $i <= $_SESSION['num_rows']; $i++) {
                                    $sql_t = $sql_t . ", SUM(CASE WHEN (matrix.id_kriteria='K" . $i . "') THEN matrix.nilai END) AS K" . $i . "";
                                }

                                $sql_t = $sql_t . " FROM matrix INNER JOIN mahasiswa ON matrix.nim=mahasiswa.nim GROUP BY mahasiswa.nama";

                                echo '<br/>';

                                $result = mysqli_query($connection, $sql_t);

                                $matriks = array();

                                $no = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $tmp_matriks = array();
                                ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $row['nama'] ?></td>
                            <?php
                                        for ($i = 1; $i <= $_SESSION['num_rows']; $i++) {
                                            array_push($tmp_matriks, $row['K' . $i]);
                                        ?>
                            <td><?php echo $row['K' . $i] ?></td>
                            <?php
                                        }
                                        array_push($matriks, $tmp_matriks);
                                        ?>
                            <td><a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit<?php echo $row['id']; ?>"><i
                                        class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>"><i
                                        class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1"
                            aria-labelledby="modelEditLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="edit.php">
                                        <div class="modal-body">
                                            <?php
                                                        $id = $row['id'];
                                                        $sql1 = "SELECT matrix.id AS matrix_id, mahasiswa.nim AS mahasiswa_nim, mahasiswa.nama AS mahasiswa, kriteria.nama_kriteria AS kriteria, matrix.nilai
                                                        FROM matrix
                                                        INNER JOIN mahasiswa ON matrix.nim = mahasiswa.nim
                                                        INNER JOIN kriteria ON matrix.id_kriteria = kriteria.id_kriteria
                                                        WHERE mahasiswa.nim = '$id'";

                                                        $result1 = mysqli_query($connection, $sql1);

                                                        $mahasiswa = '';
                                                        $i = 1;
                                                        while ($row1 = mysqli_fetch_array($result1)) {
                                                        ?>

                                            <input type="hidden" name="mahasiswa"
                                                value="<?php echo $row1['mahasiswa_nim']; ?>" />
                                            <div class="mb-3">
                                                <label class="form-label"><?php echo $row1['kriteria'] ?></label>
                                                <input class="form-control" name="nilai<?php echo $i++; ?>"
                                                    type="number" value="<?php echo $row1['nilai'] ?>" />
                                            </div>
                                            <?php
                                                        }
                                                        ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
                $suma = array();
                foreach ($matriks as $r) {
                    $tmp_suma = array();
                    foreach ($r as $s) {
                        array_push($tmp_suma, pow($s, 2));
                    }
                    array_push($suma, $tmp_suma);
                }
                // print_r($suma);
                echo '<br/>';

                $sumb = array();
                foreach ($suma as $row) {
                    foreach ($row as $i => $val) {
                        $sumb[$i] = isset($sumb[$i]) ? $sumb[$i] + $val : $val;
                    }
                }

                // print_r($sumb);

                ?>

        <div class="card mb-3">
            <h2 class="card-header py-5 text-center">MATRIKS TERNORMALISASI</h2>
            <div class="card-body">
                <table class="table nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <?php

                                    $result = mysqli_query($connection, $sql);

                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>

                            <th scope="col"><?php echo $row['id']; ?></th>

                            <?php

                                    }

                                    ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                $result = mysqli_query($connection, $sql_t);

                                for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {

                                    $sum_k = 0;
                                    $data = array();
                                    while ($row_k = mysqli_fetch_array($result)) {
                                        $sum_k = $sum_k + pow($row_k['K' . $j], 2);
                                        $data[] = $row_k;
                                    }

                                    $i = 1;
                                    foreach ($data as $d) {
                                ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $d['nama'] ?></td>
                            <?php
                                            for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {
                                            ?>
                            <td><?php echo $d['K' . $j] / sqrt($sumb[$j - 1]) ?></td>
                            <?php
                                            }
                                            ?>
                        </tr>
                        <?php
                                    }
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <h2 class="card-header py-5 text-center">MATRIKS TERBOBOT</h2>
            <div class="card-body">
                <table class="table nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <?php

                                    $result = mysqli_query($connection, $sql);

                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>

                            <th scope="col"><?php echo $row['id']; ?></th>

                            <?php

                                    }

                                    ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                $result = mysqli_query($connection, $sql_t);

                                $a_w = array();
                                $a_b = array();

                                $matriks_terbobot = array();

                                for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {

                                    $sum_k = 0;
                                    $data = array();
                                    while ($row_k = mysqli_fetch_array($result)) {
                                        $sum_k = $sum_k + pow($row_k['K' . $j], 2);
                                        $data[] = $row_k;
                                    }

                                    $i = 1;
                                    foreach ($data as $d) {
                                ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $d['nama'] ?></td>
                            <?php
                                            $tmp_matriks_terbobot = array();
                                            for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {
                                                $row = ($d['K' . $j] / sqrt($sumb[$j - 1])) * $bobot[$j - 1];
                                                array_push($tmp_matriks_terbobot, $row);
                                            ?>
                            <td><?php echo $row; ?></td>
                            <?php
                                            }
                                            array_push($matriks_terbobot, $tmp_matriks_terbobot);
                                            ?>
                        </tr>
                        <?php
                                    }
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php

                $rows = count($matriks_terbobot);
                $ridx = 0;
                $cidx = 0;

                // print_r($matriks_terbobot);

                $t_matriks_terbobot = array();

                foreach ($matriks_terbobot as $key => $subarr) {
                    foreach ($subarr as $subkey => $subvalue) {
                        $t_matriks_terbobot[$subkey][$key] = $subvalue;
                    }
                }

                // echo '<br/><br/>';

                // print_r($out);

                // foreach ($matriks_terbobot as $rowidx => $row) {
                //     foreach ($row as $colidx => $val) {
                //         $t_matriks_terbobot[$ridx][$cidx] = $val;
                //         $ridx++;
                //         if ($ridx >= $rows) {
                //             $cidx++;
                //             $ridx = 0;
                //         }
                //     }
                // }

                // print_r($t_matriks_terbobot);

                for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {
                    if ($jenis[$j - 1] == 'benefit') {
                        array_push($a_w, min($t_matriks_terbobot[$j - 1]));
                        array_push($a_b, max($t_matriks_terbobot[$j - 1]));
                    } else if ($jenis[$j - 1] == 'cost') {
                        array_push($a_w, max($t_matriks_terbobot[$j - 1]));
                        array_push($a_b, min($t_matriks_terbobot[$j - 1]));
                    }
                }


                ?>
        <div class="card mb-3">
            <h2 class="card-header py-5 text-center">SOLUSI ALTERNATIF</h2>
            <div class="card-body">
                <table class="table nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Solusi Alternatif Terbaik</th>
                            <th scope="col">Solusi Alternatif Terburuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                for ($i = 1; $i <= $_SESSION['num_rows']; $i++) {
                                ?>
                        <tr>
                            <th scope="row"><?php echo "K$i"; ?></th>
                            <td><?php echo $a_b[$i - 1] ?></td>
                            <td><?php echo $a_w[$i - 1] ?></td>
                        </tr>
                        <?php
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <h2 class="card-header py-5 text-center">JARAK</h2>
            <div class="card-body">
                <table class="table nowrap" style="width: 100%;">
                    <?php

                            $result = mysqli_query($connection, $sql_t);

                            $s_w = array();
                            $s_b = array();

                            for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {

                                $sum_k = 0;
                                $data = array();
                                while ($row_k = mysqli_fetch_array($result)) {
                                    $sum_k = $sum_k + pow($row_k['K' . $j], 2);
                                    $data[] = $row_k;
                                }

                                $i = 1;
                                foreach ($data as $d) {

                                    $sum_s_w = 0;
                                    $sum_s_b = 0;
                                    for ($j = 1; $j <= $_SESSION['num_rows']; $j++) {
                                        $matriks_terbobot = ($d['K' . $j] / sqrt($sumb[$j - 1])) * $bobot[$j - 1];
                                        $sum_s_w = $sum_s_w + pow(($matriks_terbobot - $a_w[$j - 1]), 2);
                                        $sum_s_b = $sum_s_b + pow(($matriks_terbobot - $a_b[$j - 1]), 2);
                                    }
                                    array_push($s_w, sqrt($sum_s_w));
                                    array_push($s_b, sqrt($sum_s_b));
                                }
                            }

                            ?>
                    <thead>
                        <tr>
                            <th scope="col">Alternatif</th>
                            <th scope="col">Jarak ke Solusi Terbaik</th>
                            <th scope="col">Jarak ke Solusi Terburuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                for ($i = 0; $i < count($s_b); $i++) {
                                ?>
                        <tr>
                            <th scope="col"><?php echo $data[$i]['nama'] ?></th>
                            <td><?php echo $s_b[$i] ?></td>
                            <td><?php echo $s_w[$i] ?></td>
                        </tr>
                        <?php
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <h2 class="card-header py-5 text-center">URUTAN PERINGKAT</h2>
            <div class="card-body">
                <table id="peringkat" class="table nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $i = 1;
                                $skor_arr = array(
                                    'nama' => array(),
                                    'skor' => array()
                                );
                                foreach ($data as $d) {
                                    $skor = $s_w[$i - 1] / ($s_w[$i - 1] + $s_b[$i - 1]);
                                    array_push($skor_arr['nama'], $d['nama']);
                                    array_push($skor_arr['skor'], $skor);
                                ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $d['nama'] ?></td>
                            <td><?php echo $skor ?></td>
                        </tr>
                        <?php
                                }
                                $_SESSION['skor'] = $skor_arr;
                                ?>
                    </tbody>
                </table>
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
