<?php
session_start();
require_once '../helper/connection.php';

$id_nilai = $_POST['id_nilai'];
$nilai1 = $_POST['nilai1'];
$nilai2 = $_POST['nilai2'];
$nilai1 = $_POST['nilai3'];
$nilai2 = $_POST['nilai4'];
$nilai1 = $_POST['nilai5'];

$query = mysqli_query($connection, "UPDATE nilai set niali1='$nilai1', nilai2='$nilai2', nilai3='$nilai3', nilai4='$nilai4', nilai5='$nilsi5' WHERE id_nilai='$id_nilai'");
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
