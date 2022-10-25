<?php
session_start();
ob_start();
include('../connection.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
                    $sql = "SELECT * FROM employee";
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
        </div>s
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>End Date</p>
            </div>
            <div class="form-group col-md-4">
                <input id="endDatePicker" name="end_Date"/>
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
            $sql = "SELECT username, (SUM(actual_quota) / SUM(HOUR(TIMEDIFF(TIME(end_time), TIME(start_time))))) AS Average
                    FROM data 
                    WHERE username = '$username'
                    GROUP BY username;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='row text-center mt-5'>
                            <div class='col-12 col-md-12'>
                                <h3> <span class='text-danger'>" . $row['username'] . "</span> 
                                    Pack <span class='text-danger'> " . ROUND($row['Average']) . "</span> 
                                    Slimes per hour by Texture </h3>
                            </div>
                      </div>";
                }
            }
        }
    }

    ?>
</div>



<script>
    $('#startDatePicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#endDatePicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
<?php include('../js/links.php') ?>

</body>
</html>
