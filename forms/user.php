<?php

    if (isset($_POST['submit'])) {
        include_once ('../connection.php');
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $sql = "INSERT INTO employee (first_name, last_name) VALUES ('$firstname', '$lastname')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../addUser.php?success=1");
        } else {
                header("Location: ../addUser.php?success=0");
        }
    }

?>