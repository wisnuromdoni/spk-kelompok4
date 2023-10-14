<?php
include('../helper/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM matrix WHERE id='$id'";

mysqli_query($connectiion, $sql);

header('location:index.php');
