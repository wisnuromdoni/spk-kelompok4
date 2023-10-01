<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM matrix");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Hasil Keputusan Berdasarkan TOPSIS</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="card">
                    <?php
                        $hasil = $_SESSION['skor'];
                        $skor = $hasil['skor'];
                        $i_best = array_keys($skor, max($skor))[0];
                        ?>
                    <form action="buat_surat.php" method="post">
                        <div class="card-header">
                            <h2><?php echo $hasil['nama'][$i_best]; ?></h2>
                            <input type="hidden" name="nama" value="<?php echo $hasil['nama'][$i_best]; ?>" />
                        </div>
                        <div class="card-body">
                            <span>Skor :</span>
                            <h2><?php echo $skor[$i_best]; ?></h2>
                            <input type="hidden" name="skor" value="<?php echo $skor[$i_best]; ?>" />
                        </div>
                        <div class="card-footer">
                            <center>
                                <div class="mb-3">
                                    <input class="form-control" name="nomor" type="text"
                                        placeholder="Masukkan nomor surat" />
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="periode" type="text"
                                        placeholder="Masukkan mahasiswa berprestasi" />
                                </div>

                                <button type="submit" name="download" class="btn btn-primary">Unduh Surat
                                    Keputusan</button>
                            </center>
                        </div>
                    </form>
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
<script src="../assets/js/assets/js/bootstrap.min.js"></script>