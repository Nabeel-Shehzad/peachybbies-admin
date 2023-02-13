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
<?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        echo "<div class='alert alert-success' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Successfully added slime!
                </div>";
    } else if ($_GET['success'] == 3) {
        echo "<div class='alert alert-danger' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Slime Deleted!
                </div>";
    } else if ($_GET['success'] == 4) {
        echo "<div class='alert alert-success' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Slime Updated
                </div>";
    } else{
        echo "<div class='alert alert-success' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Something went wrong. Try again later.
                </div>";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 mt-2 text-center">
            <h1>Add Slime</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 col-sm-12">
            <form method="post" action="forms/slime.php">
                <input type="text" class="form-control" name="slimeName" placeholder="Slime Name"
                       required="required"/>
                <br>
                <input type="text" class="form-control" name="texture" placeholder="Slime Texture"
                       required="required"/>
                <br>
                <input type="number" class="form-control" name="multiplier" placeholder="Slime Multiplier %"
                       required="required"/>
                <br>
                <input class="btn btn-outline-primary form-control" name="submit" type="submit" value="Add Slime"/>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <!-- set content in center -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-sm-12">
            <table id="employee_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Slime Name</th>
                    <th>Slime Texture</th>
                    <th>Slime Multiplier (%)</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php require 'connection.php' ?>

                <?php
                $sql = "SELECT * FROM `slime` WHERE status = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["slime_name"] ?></td>
                            <td><?php echo $row["slime_texture"] ?></td>
                            <td><?php echo $row["multiplier"] . '%' ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm"
                                   href="forms/deleteSlime.php?id=<?php echo $row['id'] ?>">Delete</a>
                                <a class="btn btn-primary btn-sm"
                                   href="averages/editSlime.php?id=<?php echo $row['id'] ?>">Edit</a>
                            </td>
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
                    <th>Slime Multiplier (%)</th>
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
