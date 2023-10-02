<?php
session_start();
require_once '../helper/connection.php';

// $nim = $_POST['nim'];
// $matkul = $_POST['matkul'];
// $semester = $_POST['semester'];
$nilai = $_POST['nilai'];

$query = mysqli_query($connection, "insert into nilai (nilai1, nilai2, nilai3, nilai4, nilai5) value('$nilai1', '$nilai2', '$nilai3','$nilai4','$nilai5')");

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
