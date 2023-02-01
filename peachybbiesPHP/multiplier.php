<?php
    include_once('connection.php');
    $packer = $_POST['packer'];
    $slime = $_POST['slime'];
    $$hours = $_POST['hours'];
    $perHour = $_POST['perHour'];

    $sql = "INSERT INTO multiplier (packer, slime, hours, perHour) 
    VALUES ('$packer', '$slime', '$hours', '$perHour')";
    if (mysqli_query($conn, $sql)) {
        echo "submitted";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>