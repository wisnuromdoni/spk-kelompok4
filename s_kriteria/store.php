<?php
session_start();
require_once '../helper/connection.php';

$kriteria = $_POST['kriteria'];
$bobot = $_POST['bobot'];
$kategori = $_POST['kategori'];

$query = mysqli_query($connection, "insert into kriteria (kriteria, bobot, kategori) value('$kriteria', '$bobot', '$kategori')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
