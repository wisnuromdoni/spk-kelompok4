<?php

require_once '../layout/_top.php';
include('../helper/connection.php');

$alternatif = $_POST['mahasiswa'];

$sql = "UPDATE matrix SET nilai = nilai WHERE nim = nim AND id_kriteria = id_kriteria";

for ($i = 1; $i <= $_SESSION['num_rows']; $i++) {
    $nilai = 'nilai';
    $kriteria = 'K';

    $nilai = $_POST[$nilai . $i];
    $kriteria = $kriteria . $i;

    $sql = "UPDATE matrix SET nilai = $nilai WHERE id_kriteria = '$kriteria' AND id_alternatif = '$alternatif'";
    echo $sql;
    mysqli_query($conn, $sql);
    header('location:matriks.php');
}