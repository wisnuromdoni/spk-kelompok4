<?php

include('../helper/connection.php');

$sql = "DELETE FROM matrix";

mysqli_query($connection, $sql);

header('location:index.php');
