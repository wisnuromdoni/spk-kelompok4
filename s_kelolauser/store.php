<?php
session_start();
require_once '../helper/connection.php';

// Data dari form tambah user
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

$query1 = mysqli_query($connection, "INSERT INTO login (username, password, status) VALUES ('$username','$password','$status')");

if (!$query1) {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
  exit; // Hentikan eksekusi jika query pertama gagal
}

// Jika status adalah "Mahasiswa," tambahkan data mahasiswa
if ($status === 'Mahasiswa') {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $email = $_POST['email'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];

  $query2 = mysqli_query($connection, "INSERT INTO mahasiswa (nim, nama, kelas, tempat_lahir, tgl_lahir, email, no_hp, alamat) VALUES ('$nim', '$nama', '$kelas', '$tempat_lahir', '$tgl_lahir', '$email', '$no_hp', '$alamat')");

  if (!$query2) {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => mysqli_error($connection)
    ];
    header('Location: ./index.php');
    exit; // Hentikan eksekusi jika query kedua gagal
  }
}

$_SESSION['info'] = [
  'status' => 'success',
  'message' => 'Berhasil menambah data'
];

header('Location: ./index.php');
