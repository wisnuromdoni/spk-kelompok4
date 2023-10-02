<?php

require_once '../helper/connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM matrix WHERE nim='$id'";

mysqli_query($connectiion, $sql);

header('location:index.php');
