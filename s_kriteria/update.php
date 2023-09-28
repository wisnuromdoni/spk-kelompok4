<?php
session_start();
require_once '../helper/connection.php';

$id_kriteria = $_POST['id_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot = $_POST['bobot'];
$kategori = $_POST['kategori'];

$query = mysqli_query($connection, "UPDATE kriteria SET nama_kriteria = '$nama_kriteria', bobot = '$bobot', kategori = '$kategori'  WHERE id_kriteria = '$id_kriteria'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
