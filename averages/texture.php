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
            <h2>Average slimes packed per hour by Texture</h2>
        </div>
    </div>
    <form method="post" action="#">
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
        <div class="row text-center">
            <div class="col-12 col-md-12 col-sm-12">
                <input type="submit" name="submit" value="Generate Average" class="col-md-4 btn btn-primary">
            </div>
        </div>
    </form>
    <div class="container-fluid mt-5">
        <!-- set content in center -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-sm-12">
                <table id="employee_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>SKU</th>
                        <th>Average</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php require '../connection.php' ?>

                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['user'];
                        $sql = "SELECT username,sku_packed, (SUM(actual_quota) / SUM(HOUR(TIMEDIFF(TIME(end_time), TIME(start_time))))) AS Average
                                FROM data 
                                WHERE username = '$username'
                                GROUP BY sku_packed;";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row["username"] ?></td>
                                    <td><?php echo $row["sku_packed"] ?></td>
                                    <td><?php echo ROUND($row["Average"]) ?></td>
                                </tr>
                                <?php
                            }
                        }
                    } ?>

                    <?php $conn->close(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>SKU</th>
                        <th>Average</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>
<?php include('../js/links.php') ?>

</body>
</html>
