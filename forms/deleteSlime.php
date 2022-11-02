<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"UPDATE slime SET status = 1 WHERE id ='$id'");
header("Location: ../addSlime.php?success=3");