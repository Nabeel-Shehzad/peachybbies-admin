<?php

if (isset($_POST['submit'])) {
    include_once ('../connection.php');
    $name = $_POST['break'];
    $sql = "INSERT INTO break (name) VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../addBreak.php?success=1");
    } else {
        header("Location: ../addBreak.php?success=0");
    }
}

?>