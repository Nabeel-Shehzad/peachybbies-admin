<?php
session_start();
ob_start();
include('../connection.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include('../header/header.php'); ?>
</head>

<body>
<?php include('navbar.php') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 mt-2 text-center">
            <h2>Average Break Time over Selected Time period</h2>
        </div>
    </div>
    <form method="post" action="breakTime.php">
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>Choose user</p>
            </div>
            <div class="form-group col-md-4">
                <select id="inputState" class="form-control" name="user">
                    <option selected>Choose...</option>
                    <?php
                    include('../connection.php');
                    $sql = "SELECT * FROM employee WHERE status = 0";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['first_name'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>Start Date</p>
            </div>
            <div class="form-group col-md-4">
                <input id="startDatePicker" name="start_Date"/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>End Date</p>
            </div>
            <div class="form-group col-md-4">
                <input id="endDatePicker" name="end_Date"/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>Select Break</p>
            </div>
            <div class="form-group col-md-4">
                <select id="inputState" class="form-control" name="break">
                    <option selected>Choose...</option>
                    <option value="bathroom_break">Bathroom break</option>
                    <option value=general_break"">General break</option>
                    <option value="shelving_break">Social Media break</option>
                    <option value="mockups">Mock ups break</option>
                    <option value="meal_break">Meal break</option>
                    <option value="other_break">Other break</option>
                </select>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-12 col-sm-12">
                <input type="submit" name="submit" value="Generate Average" class="col-md-4 btn btn-primary">
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $startDate = $_POST['start_Date'];
        $endDate = $_POST['end_Date'];
        $break = $_POST['break'];
        if($startDate > $endDate) {
            echo "<div class='row text-center mt-5'>
                    <div class='col-12 col-md-12 col-sm-12'>
                        <div class='alert alert-danger' role='alert'>
                        <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            Please select valid range!
                        </div>
                    </div>
                </div>";
        }else {
            $sql = "SELECT employee.first_name,employee.last_name, 
                    SUM(TIME_TO_SEC('$break')) / DATEDIFF('$endDate','$startDate') 
                    as time 
                    FROM `data` 
                    JOIN employee ON employee.id = data.username
                    WHERE '$username' = employee.first_name  AND 
                    date BETWEEN '$startDate' AND '$endDate'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='row text-center mt-5'>
                            <div class='col-12 col-md-12'>
                                <h3> <span class='text-danger'>" . $row['first_name'] . " ".$row['last_name']. "</span> 
                                    's Average break time is 
                                      <span class='text-danger'>
                                      " . gmdate('H:i:s',ROUND($row['time'])) . "
                                      </span> per day</h3>
                            </div>
                      </div>";
                }
            }else{
                echo "<div class='row text-center mt-5'>
                    <div class='col-12 col-md-12 col-sm-12'>
                        <div class='alert alert-danger' role='alert'>
                        <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            No Result
                        </div>
                    </div>
                </div>";
            }
        }
    }

    ?>
</div>



<script>
    $('#startDatePicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: "yyyy-mm-dd"
    });
    $('#endDatePicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: "yyyy-mm-dd"
    });
</script>
<?php include('../js/links.php') ?>

</body>
</html>
