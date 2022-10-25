<?php
    session_start();
    ob_start();
    if (isset($_POST['Login'])){
        include_once('connection.php');
        $username = $_SESSION['username'] = $_POST['username'];
        $password = $_SESSION['password'] = $_POST['password'];
        $data = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
        $Query = mysqli_query($conn, $data);
        $ROW = mysqli_fetch_assoc($Query);
        if ($ROW){
            if($ROW['access'] == 0) {
                $_SESSION['username'] = $ROW['username'];
                $_SESSION['name'] = $ROW['name'];
                header("Location: home.php");
            }else{
                session_destroy();
                header("Location: index.php?Error=1");
            }
        }else{
            session_destroy();
            header("Location: index.php?Error=1");
        }
    }
?>

<!Doctype html>
<html>
<head>
    <?php include('header/header.php'); ?>
</head>
<body>
    <nav class="navbar shadow-sm navbar-expand-lg py-3 py-lg-0 px-lg-5">
        <a href="home.php" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5 text-dark"><span class="text-primary">Peachy</span>Bbies</h1>
        </a>
    </nav>
    <div class="container">
        <div class="row my-5">
            <div class="col-12 col-md-12 col-sm-12 text-center">
                <h1 class="text-dark">Login</h1>
                <?php
                if(isset($_GET['Error']) && $_GET['Error'] ==1){
                    echo "<p class='text-danger'>Invalid Username or password</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-sm-12">
                <form action="index.php" method="post" >
                    <input type="text" class="form-control" name="username" placeholder="Username"
                           required="required" />
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password"
                           required="required" />
                    <br>
                    <input class="btn btn-outline-primary form-control" name="Login" type="submit" value="Login"/>
                </form>
            </div>
        </div>
    </div>



    <?php include('js/links.php') ?>
</body>


</html>