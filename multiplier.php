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
<body>
<?php include('navbar.php') ?>
<div class="container-fluid mt-5">
    <!-- set content in center -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-sm-12">
            <table id="employee_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Packer Name</th>
                    <th>Slime Name</th>
                    <th>No of Hours Worked</th>
                    <th>Slimes per Hour</th>
                </tr>
                </thead>
                <tbody>

                <?php require 'connection.php' ?>

                <?php
                $sql = "SELECT multiplier.*,slime.slime_name, employee.first_name,employee.last_name 
                        FROM `multiplier` 
                        JOIN slime ON slime.id = multiplier.slime
                        JOIN employee ON employee.id = multiplier.packer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["first_name"] . " ". $row['last_name'] ?></td>
                            <td><?php echo $row["slime_name"] ?></td>
                            <td><?php echo $row["hours"] ?></td>
                            <td><?php echo $row["perHour"] ?></td>
                        </tr>
                        <?php
                    }
                } ?>

                <?php $conn->close(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Slime Name</th>
                    <th>Slime Texture</th>
                    <th>Slime Multiplier</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include('js/links.php') ?>
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>
</body>
</html>
