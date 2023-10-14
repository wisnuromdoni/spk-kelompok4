<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

?>

<section class="section">

    <?php
    if (empty($_SESSION['status'])) {
    ?>
    <main class="container py-5">
        <span>Anda belum login, silahkan login terlebih dahulu</span>
    </main>
    <?php
    } else if ($_SESSION['status'] == 'Admin') {
    ?>
    <main class="container py-5">
        <span>Hanya mahasiswa yang dapat mengakses halaman ini</span>
    </main>
    <?php
    } else if ($_SESSION['status'] == "Mahasiswa") {
    ?>
    <main class="container py-5">
        <form class="card" method="post" action="store.php">
            <h2 class="card-header py-5 text-center">INPUT NILAI</h2>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Alternatif</label>
                    <select class="form-select" name="id_alternatif">
                        <?php

                            include('../helper/connection.php');

                            $sql = 'SELECT * FROM alternatif';
                            $result = mysqli_query($connection, $sql);

                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $sql1 = 'SELECT * FROM matrix WHERE id_alternatif = ';
                                $sql1 = $sql1 . $row['id'];
                                $result1 = mysqli_query($connection, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    continue;
                                } else {

                            ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>


                        <?php
                                }
                            }

                            ?>
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Jenis</th>
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
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['bobot'] ?></td>
                            <td><?php echo $row['jenis'] ?></td>
                            <td><input class="form-control" type="number" name="nilai_<?php echo $row['id'] ?>" /></td>
                        </tr>

                        <?php

                            }

                            ?>
                        <!-- Num rows -->
                        <input type="hidden" name="num_rows" value="<?php echo mysqli_num_rows($result) ?>" />
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="bi bi-save-fill"></i>
                    Simpan</button>
            </div>
        </form>
    </main>
</section>
    <?php
    }
    ?>

<?php
require_once '../layout/_bottom.php';
?>

    <script src="assets/js/bootstrap.min.js"></script>
