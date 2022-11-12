<?php
session_start();
ob_start();
include('connection.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include('header/header.php'); ?>
</head>

<?php include('navbar.php') ?>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo "<div class='alert alert-danger' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Please provide Date or username!
                </div>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Create Report</h1>
        </div>
    </div>
    <form method="post" action="reportCreator.php">
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>Choose user</p>
            </div>
            <div class="form-group col-md-4">
                <select id="inputState" class="form-control" name="user">
                    <option selected>Choose...</option>
                    <?php
                    $sql = "SELECT * FROM employee WHERE status = 0";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['first_name'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="checkbox" class="form-check-input ml-1" name="no_user">
                <label class="form-check-label ml-4">No User</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 col-md-4">
                <p>Select Day</p>
            </div>
            <div class="form-group col-md-4">
                <input id="datepicker" name="date"/>
                <input type="checkbox" class="form-check-input ml-1" name="check">
                <label class="form-check-label ml-4">No Limit</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <input type="submit" name="submit" value="Generate report" class="col-4 offset-4 btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div class="container-fluid mt-5">
    <!-- set content in center -->
    <div class="row">
        <div class="col-12 col-md-12">
            <table id="employee_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Working Time</th>
                    <th>Target Working Time</th>
                    <th>Bathroom Pause</th>
                    <th>General Break Pause</th>
                    <th>Shelving Product Pause</th>
                    <th>Meal Pause</th>
                    <th>Other Task Pause</th>
                    <th>Target Quota</th>
                    <th>Actual Packed</th>
                    <th>SKU Packed</th>
                    <th>Delete</th>
                    <th>Export</th>
                </tr>
                </thead>
                <tbody>

                <?php require 'connection.php' ?>

                <?php
                if (isset($_POST['submit'])) {
                    $date = "";
                    $sql = "";
                    $username = $_POST['user'];
                    $firstName = explode(" ", $username)[0];

                    if (($_POST['check'] && $_POST['no_user'])) {
                        header("Location: reportCreator.php?error=1");
                    }else if (!$_POST['no_user'] && !$_POST['check']) {
                        $date = date("Y-m-d", strtotime($_POST['date']));
                        $sql = "SELECT employee.*, data.* FROM data
                                JOIN employee ON employee.id = data.username
                                JOIN slime ON slime.id = data.sku_packed
                                WHERE employee.first_name = '$firstName'
                                  AND date = '" . $date . "'";
                    } else if (!$_POST['no_user'] && $_POST['check']) {
                        $sql = "SELECT employee.*, data.* FROM data
                                JOIN employee ON employee.id = data.username
                                JOIN slime ON slime.id = data.sku_packed
                                WHERE employee.first_name = '$firstName'";
                    } else if ($_POST['no_user'] && !$_POST['check']) {
                        $date = date("Y-m-d", strtotime($_POST['date']));
                        $sql = "SELECT employee.*, data.* FROM data
                                JOIN employee ON employee.id = data.username
                                JOIN slime ON slime.id = data.sku_packed
                                WHERE date = '" . $date . "'";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["first_name"] . " " . $row["last_name"] ?></td>
                                <td><?php echo $row["date"] ?></td>
                                <td><?php echo $row["start_time"] ?></td>
                                <td><?php echo $row["end_time"] ?></td>
                                <td><?php echo $row["total_working_time"] ?></td>
                                <td><?php echo $row["target_working_time"] ?></td>
                                <td><?php echo $row["bathroom_break"] ?></td>
                                <td><?php echo $row["general_break"] ?></td>
                                <td><?php echo $row["meal_break"] ?></td>
                                <td><?php echo $row["shelving_break"] ?></td>
                                <td><?php echo $row["other_break"] ?></td>
                                <td><?php echo $row["target_quota"] ?></td>
                                <td><?php echo $row["actual_quota"] ?></td>
                                <td><?php echo $row["sku_packed"] ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       href="forms/deleteReport.php?id=<?php echo $row['id'] ?>">Delete Record</a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href="export.php?ids=<?php echo $row['id'] ?>">Export Record</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Working Time</th>
                    <th>Target Working Time</th>
                    <th>Bathroom Pause</th>
                    <th>General Break Pause</th>
                    <th>Shelving Product Pause</th>
                    <th>Meal Pause</th>
                    <th>Other Task Pause</th>
                    <th>Target Quota</th>
                    <th>Actual Packed</th>
                    <th>SKU Packed</th>
                    <th>Delete</th>
                    <th>Export</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
<?php include('js/links.php') ?>
</html>