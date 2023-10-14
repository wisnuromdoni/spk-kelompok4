<?php
session_start(); // Penting untuk menggunakan session

include('../helper/connection.php');

// Periksa apakah 'id_alternatif' ada dalam permintaan POST
if (isset($_POST['id_alternatif'])) {
    $id = $_POST['id_alternatif'];
    $rows = $_POST['num_rows'];

    // Periksa apakah data sudah ada di database
    if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM matrix WHERE id_alternatif=$id")) > 0) {
        $_SESSION['pesan'] = "Data sudah ada, silahkan input data yang lain";
    } else {
        $sql = "INSERT INTO matrix VALUES";

        for ($i = 1; $i <= $rows; $i++) {
            $nilai = $_POST['nilai_K' . $i];
            $sql = $sql . " (NULL, $id, 'K" . $i . "', $nilai), ";
        }

        $sql = rtrim($sql, ', '); // Menghapus tanda koma terakhir
        mysqli_query($connection, $sql);

        // Setelah berhasil memasukkan data, Anda dapat melakukan tindakan lain (misalnya, redirect atau pesan sukses).
        $_SESSION['pesan'] = "Data berhasil disimpan"; // Pesan sukses
    }
} else {
    $_SESSION['pesan'] = "ID alternatif tidak ditemukan dalam permintaan POST"; // Pesan error jika 'id_alternatif' tidak ada
}

header('Location: ./nilai_keputusan.php'); // Redirect ke halaman lain
