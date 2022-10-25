<?php
include_once("../connection.php");
$id = $_GET['id'];
$sql = mysqli_query($conn,"DELETE FROM `slime` WHERE id ='$id'");
header("Location: ../addSlime.php?success=3");