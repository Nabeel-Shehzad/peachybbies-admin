<?php
session_start();
ob_start();
include('../connection.php');
$slime_id = $_GET['id'];
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
} else if (isset($_POST['submit'])) {
    $slimeName = $_POST['slimeName'];
    $texture = $_POST['texture'];
    $multiplier = $_POST['multiplier'];
    $sql = "Update slime SET slime_name = '$slimeName', slime_texture = '$texture', 
                 multiplier = '$multiplier' WHERE id = '$slime_id'";
    $result = $conn->query($sql);
    if ($result) {
        header("Location: ../addSlime.php?success=4");
    } else {
        header("Location: ../addSlime.php?error=1");
    }
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
            <h1>Edit Slime</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6 col-sm-12">
            <form method="post" action="editSlime.php?id=<?php echo $slime_id ?>">
                <?php
                $sql = "SELECT * FROM slime WHERE id = '$slime_id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <input type="text" class="form-control" name="slimeName" placeholder="Slime Name"
                       required="required" value="<?php echo $row['slime_name']?>"/>
                <br>
                <input type="text" class="form-control" name="texture" placeholder="Slime Texture"
                       required="required" value="<?php echo $row['slime_texture']?>" />
                <br>
                <input type="number" class="form-control" name="multiplier" placeholder="Slime Multiplier"
                       required="required" value="<?php echo $row['multiplier'] ?>"/>
                <br>
                <input class="btn btn-outline-primary form-control" name="submit" type="submit" value="Update Slime"/>
            </form>
        </div>
    </div>
</div>

<?php include('../js/links.php') ?>
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script>
</body>
</html>
