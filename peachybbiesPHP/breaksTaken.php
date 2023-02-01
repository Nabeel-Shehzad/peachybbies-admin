<?php
    include_once('connection.php');
    $date = $_POST['date'];
    $break_id = $_POST['break_id'];
    $employee_id = $_POST['employee_id'];
    $time = $_POST['time'];

    $sql = "INSERT INTO break_taken (date,break_id, employee_id, time) 
            VALUES ('$date','$break_id', '$employee_id', '$time')";
    $result = mysqli_query($DB,$sql);
    
    if($result){
        echo "submitted";
    }else{
        echo "Something went wrong";
    }
?>