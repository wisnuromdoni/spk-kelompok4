<?php
session_start();
require_once '../helper/connection.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

$query = mysqli_query($connection, "UPDATE mahasiswa set nama='$nama', kelas='$kelas', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE nim='$nim'");
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
