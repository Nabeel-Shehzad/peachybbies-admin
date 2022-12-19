<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"UPDATE break SET status = 1 WHERE id ='$id'");
header("Location: ../addBreak.php?success=3");