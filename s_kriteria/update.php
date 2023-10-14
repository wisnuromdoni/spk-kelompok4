<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$jenis = $_POST['jenis'];

$query = mysqli_query($connection, "UPDATE kriteria SET nama= '$nama', bobot = '$bobot', jenis = '$jenis'  WHERE id = '$id'");
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
