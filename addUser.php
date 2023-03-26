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
                Successfully added user!
                </div>";
    } else if ($_GET['success'] == 3) {
        echo "<div class='alert alert-danger' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>          
                User Deleted!
                </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Failed to add user!
                </div>";
    }
}
?>
<div class="container">
    <div class="row text-center mt-3">
        <div class="col-12 col-md-12 col-sm-12">
            <h3>Add User</h3>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        <div class="col-12 col-md-6 col-sm-12">
            <form action="forms/user.php" method="post">
                <input type="text" class="form-control" name="firstName" placeholder="First Name"
                       required="required"/>
                <br>
                <input type="text" class="form-control" name="lastName" placeholder="Last Name"
                       required="required"/>
                <br>
                <input type="date" class="form-control" name="joinDate" placeholder="Join Date" required="required">
                <br>
                <input type="number" step="0.1" class="form-control" name="hourlyRate" placeholder="Hourly Rate"
                       required="required">
                <br>
                <input class="btn btn-outline-primary form-control" name="submit" type="submit" value="Add User"/>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Join Date</th>
                    <th>Hourly Rate</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php require 'connection.php' ?>

                <?php
                $sql = "SELECT * FROM `employee` where status = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["first_name"] ?></td>
                            <td><?php echo $row["last_name"] ?></td>
                            <td><?php echo $row["join_date"] ?></td>
                            <td><?php echo $row["hourly_rate"] ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm"
                                   href="forms/deleteUser.php?id=<?php echo $row['id'] ?>">Delete</a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Join Date</th>
                    <th>Hourly Rate</th>
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
