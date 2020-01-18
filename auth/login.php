<?php

    session_start();
    include '../conn.php';

    if(isset($_SESSION['auth']) == true){
        header("location:../admin/index.php");
    }

    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username = '".$user."' AND password = '".$pass."'";
        $data = mysqli_query($conn, $query);
        while($result = mysqli_fetch_assoc($data)){
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $result['username'];
            header("location:../admin/index.php");
        }
    }
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="../index.html"><img class="logo-img" src="../assets/assets/images/logo.png" alt="logo"></a>
                <span class="splash-description">Login</span>
            </div>
            <div class="card-body">
                <form  action="" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>