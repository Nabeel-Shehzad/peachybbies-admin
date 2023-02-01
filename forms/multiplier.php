<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"UPDATE multiplier SET status = 1 WHERE id ='$id'");
header("Location: ../multiplier.php?success=1");
