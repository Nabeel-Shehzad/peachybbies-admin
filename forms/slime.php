<?php

if (isset($_POST['submit'])) {
    include_once ('../connection.php');
    $firstname = $_POST['slimeName'];
    $lastname = $_POST['texture'];
    $sql = "INSERT INTO slime (slime_name, slime_texture) VALUES ('$firstname', '$lastname')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../addSlime.php?success=1");
    } else {
        header("Location: ../addSlime.php?success=0");
    }
}

?>