<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"DELETE FROM `employee` WHERE id ='$id'");
header("Location: ../addUser.php?success=3");