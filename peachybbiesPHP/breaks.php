<?php
    include_once('connection.php');
    $sql = "SELECT * FROM break where status = 0";
    $result = mysqli_query($DB,$sql);
    $array = array();
    $array['data'] = array();
    while($row = mysqli_fetch_array($result)){
        $index['id'] = $row['id'];
        $index['slimeName'] = $row['name'];
        array_push($array['data'],$index);
    }
    $array['success'] = 1;
    echo json_encode($array);
?>