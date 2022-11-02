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
        <div class="row">
            <div class="col-12 col-md-12">
                <table id="employee_data" class="table table-responsive table-striped table-bordered" cellspacing="0">
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
                        $sql = "SELECT employee.first_name,employee.last_name,slime.slime_name,slime.slime_texture, data.* FROM `data` 
                                JOIN employee
                                    ON 
                                    employee.id = data.username
                                JOIN slime 
                                    ON 
                                    slime.id = data.sku_packed
                                GROUP BY data.username";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["first_name"] ." ". $row["last_name"] ?></td>
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
                                        <td><?php echo $row["slime_name"] ." ". $row["slime_texture"] ?></td>
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