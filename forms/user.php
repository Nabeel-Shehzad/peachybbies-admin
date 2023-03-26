<?php

if (isset($_POST['submit'])) {
    include_once('../connection.php');
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $joinDate = $_POST['joinDate'];
    $hourlyRate = $_POST['hourlyRate'];
    $sql = "INSERT INTO employee (first_name, last_name,join_date,hourly_rate) 
                    VALUES ('$firstname', '$lastname', '$joinDate', '$hourlyRate')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../addUser.php?success=1");
    } else {
        header("Location: ../addUser.php?success=0");
    }
}

?>