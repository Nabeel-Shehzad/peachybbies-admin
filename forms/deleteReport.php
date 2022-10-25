<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"DELETE FROM `data` WHERE id ='$id'");
header("Location: ../reportCreator.php");
