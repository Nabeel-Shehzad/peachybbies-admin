<?php
    session_start();
    ob_start();
    include_once('connection.php');
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
      <?php include('header/header.php'); ?>
  </head>
  <body>
  <?php include ('navbar.php')?>
    <div class="container-fluid mt-5">
        <!-- set content in center -->
        <div class="row justify-content-center">
            <div class="col-12">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php require 'connection.php' ?>

                    <?php
                        $sql = "SELECT * FROM `data` GROUP BY `username`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["username"] ?></td>
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
                                            <a class="btn btn-primary btn-sm" href="generate_excel.php?id=<?php echo $row['username'] ?>">Export As CSV</a>
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