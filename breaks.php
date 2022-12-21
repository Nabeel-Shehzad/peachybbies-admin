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
                    <th>Date</th>
                    <th>Username</th>
                    <th>Break Type</th>
                    <th>Time Taken</th>
                </tr>
                </thead>
                <tbody>

                <?php require 'connection.php' ?>

                <?php
                $id = $_GET['id'];
                $sql = "
                        SELECT break.*, break_taken.*, employee.first_name,
                                employee.last_name, slime.slime_name,slime.slime_texture, data.* 
                                FROM `data` 
                                    JOIN employee ON 
                                        employee.id = data.username 
                                    JOIN slime ON 
                                        slime.id = data.sku_packed 
                                    LEFT JOIN break_taken ON 
                                        data.username = break_taken.employee_id 
                                    LEFT JOIN break ON 
                                        break_taken.break_id = break.id 
                                    WHERE data.username LIKE '$id';";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row["date"] ?></td>
                            <td><?php echo $row["first_name"] ." ". $row["last_name"]?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["time"] ?></td>
                        </tr>
                        <?php
                    }
                } ?>

                <?php $conn->close(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Break Type</th>
                    <th>Time Taken</th>
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
