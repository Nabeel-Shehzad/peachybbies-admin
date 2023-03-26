<?php
session_start();
ob_start();
include_once('connection.php');
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
    <div class="row">
        <div class="col-12 col-md-12">
            <table id="employee_data" class="table table-responsive table-striped table-bordered" cellspacing="0">
                <thead>
                <?php require 'connection.php' ?>
                <?php
                $sql = "Select * FROM slime ";
                $result = $conn->query($sql);
                $columns = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $columns[] = $row['slime_name'];

                }
                ?>
                <tr>
                    <th>Username</th>
                    <?php foreach ($columns as $column) { ?>
                        <th><?php echo $column; ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>



                <?php $conn->close(); ?>
                </tbody>
                <tfoot>
                <tr>
                <tr>
                    <th>Username</th>
                    <?php foreach ($columns as $column) { ?>
                        <th><?php echo $column; ?></th>
                    <?php } ?>
                </tr>
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