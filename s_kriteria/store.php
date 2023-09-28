<?php
session_start();
require_once '../helper/connection.php';

$id_kriteria = $_POST['id_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot = $_POST['bobot'];
$kategori = $_POST['kategori'];

$query = mysqli_query($connection, "insert into kriteria (id_kriteria, nama_kriteria, bobot, kategori) value('$id_kriteria', '$nama_kriteria', '$bobot', '$kategori')");
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
