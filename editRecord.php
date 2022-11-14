<?php
    session_start();
    ob_start();
    include('connection.php');
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    $userID = $_GET['id'];
    $sql = "SELECT employee.id AS emp_id,employee.first_name,
                                    employee.last_name,slime.id AS slime_id, slime.slime_name,
                                    slime.slime_texture, data.* FROM `data` 
                                JOIN employee
                                ON 
                                employee.id = data.username
                                JOIN slime 
                                ON 
                                slime.id = data.sku_packed
                                WHERE data.id = '$userID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST['submit'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $date = $_POST['date'];
        $start_time = preg_replace('/\s+/','',$_POST['start_time']);
        $end_time = preg_replace('/\s+/','',$_POST['end_time']);
        $total_working_time = preg_replace('/\s+/','',$_POST['total_working_time']);
        $target_working_time = preg_replace('/\s+/','',$_POST['target_working_time']);
        $bathroom_break = preg_replace('/\s+/','',$_POST['bathroom_break']);
        $general_break = preg_replace('/\s+/','',$_POST['general_break']);
        $shelving_break = preg_replace('/\s+/','',$_POST['shelving_products']);
        $meal_break = preg_replace('/\s+/','',$_POST['meal_break']);
        $other_break = preg_replace('/\s+/','',$_POST['other_break']);
        $target_quota = preg_replace('/\s+/','',$_POST['target_quota']);
        $actual_quota = preg_replace('/\s+/','',$_POST['actual_packed']);
        $sku_packed = preg_replace('/\s+/','',$_POST['sku']);

        $fist_name = explode(" ", $username)[0];
        $last_name = explode(" ", $username)[1];

        $change = "UPDATE employee SET first_name = '$fist_name', last_name = '$last_name' WHERE id = '" . $_POST['emp_id'] ."'";
        $nameResult = $conn->query($change);

        $sql = "UPDATE data SET date = '$date', 
                    start_time = '$start_time', end_time = '$end_time', 
                    total_working_time = '$total_working_time', target_working_time = '$target_working_time', 
                    bathroom_break = '$bathroom_break', general_break = '$general_break', 
                    shelving_break = '$shelving_break', meal_break = '$meal_break', other_break = '$other_break', 
                    target_quota = '$target_quota', actual_quota = '$actual_quota', sku_packed = '$sku_packed' WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result && $nameResult) {
            header("Location: records.php?success=1");
        }else{
            header("Location: records.php?error=1");
        }
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
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo "<div class='alert alert-danger' role='alert'>
                <a href=''#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Something went wrong. Please try again.
                </div>";
    }
}
?><div class="container">
    <div class="row my-2">
        <div class="col-12 col-md-12">
            <h2 class="text-center">Edit Record</h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form method="post" action="editRecord.php">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-12 text-center">
                <label class="col-3 col-md-3"> ID
                    <input type="number" class="form-control" name="id" value="<?php echo $userID ?>" readonly/>
                </label>
                <label class="col-3 col-md-3 mx-3">Username
                    <input type="text" class="form-control" name="username"
                           value="<?php echo $row['first_name'] . " ". $row['last_name'] ?>"/>
                    <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'] ?>">
                </label>
                <label class="col-3 col-md-3">Date
                    <input type="Date" class="form-control" name="date" value="<?php echo $row['date'] ?>" readonly/>
                </label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 text-center">
                <label class="col-3 col-md-3"> Start Time
                    <input type="text" class="form-control" name="start_time"
                           value="<?php echo $row['start_time'] ?> " />
                </label>
                <label class="col-3 col-md-3 mx-3">End Time
                    <input type="text" class="form-control" name="end_time"
                           value="<?php echo $row['end_time'] ?> "/>
                </label>
                <label class="col-3 col-md-3">Total Working Time
                    <input type="text" class="form-control" name="total_working_time"
                           value="<?php echo $row['total_working_time'] ?> "/>
                </label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 text-center">
                <label class="col-3 col-md-3"> Target Working Time
                    <input type="text" class="form-control" name="target_working_time"
                           value="<?php echo $row['target_working_time'] ?> "/>
                </label>
                <label class="col-3 col-md-3 mx-3">Bathroom pause
                    <input type="text" class="form-control" name="bathroom_break"
                           value="<?php echo $row['bathroom_break'] ?> "/>
                </label>
                <label class="col-3 col-md-3">General Break Time
                    <input type="text" class="form-control" name="general_break"
                           value="<?php echo $row['general_break'] ?> "/>
                </label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 text-center">
                <label class="col-3 col-md-3"> Shelving Products Pause
                    <input type="text" class="form-control" name="shelving_products"
                           value="<?php echo $row['shelving_break'] ?> "/>
                </label>
                <label class="col-3 col-md-3 mx-3">Meal Pause
                    <input type="text" class="form-control" name="meal_break"
                           value="<?php echo $row['meal_break'] ?> "/>
                </label>
                <label class="col-3 col-md-3">Other Task Pause
                    <input type="text" class="form-control" name="other_break"
                           value="<?php echo $row['other_break'] ?> "/>
                </label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 text-center">
                <label class="col-3 col-md-3"> Target Quota
                    <input type="text" class="form-control" name="target_quota"
                           value="<?php echo $row['target_quota'] ?> "/>
                </label>
                <label class="col-3 col-md-3 mx-3">Actual Packed
                    <input type="text" class="form-control" name="actual_packed"
                           value="<?php echo $row['actual_quota'] ?> "/>
                </label>
                <label class="col-3 col-md-3">SKU Packed
                    <select class="form-control" name="sku">
                        <option value="<?php echo $row['slime_id'] ?>" selected> <?php echo $row['sku_packed'] . " ".
                            $row['slime_name'] ." ". $row['slime_texture']?></option>
                        <?php
                            $sql = "SELECT * FROM `slime`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['id'] . " " . $row['slime_name'] . " " . $row['slime_texture'] . "</option>";
                            }
                        ?>
                    </select>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 text-center">
                <input type="submit" class="col-4 col-md-4 btn btn-outline-primary" name="submit" value="Update Record"/>
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-12">
            <h5 class="text-center text-muted">Please use format for Time:
                <span class="text-danger"> HH:MM:SS</span> </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <h5 class="text-center text-muted">Please use format for Date Time:
                <span class="text-danger">YYYY-MM-DD HH:MM:SS</span> </h5>
        </div>
    </div>
</div>

<?php include('js/links.php') ?>
</body>
</html>
