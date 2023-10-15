<?php
include('../helper/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM matrix WHERE id_alternatif='$id'";

mysqli_query($connection, $sql);

header('location:index.php');
