<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"UPDATE employee SET status = 1 WHERE id ='$id'");
header("Location: ../addUser.php?success=3");