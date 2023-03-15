<?php 
    require_once('inc/connection.php');
    
        
    if(isset($_POST['login_submit'])){
        $u_name = $_POST['username'];
        $u_pass = md5($_POST['userpass']);

        $sql = "SELECT * FROM user WHERE u_name='$u_name'";
        $row = $conn->query($sql); 
        
        if(mysqli_num_rows($row) == 1){
            $data = mysqli_fetch_assoc($row);
            if($u_pass == $data['u_pass']){
                session_start();
                $_SESSION['login'] = $data['u_name'];
                $_SESSION['id'] = $data['u_id'];
                header('location:pages/dashboard.php');
            }else {
                $error = 'Wrong Password!';
            }
        }else {
            $error = 'Wrong Username!';
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
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
            <div class="card-header text-center"><h1>LLCG-SMS</h1><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <input name="username" class="form-control form-control-lg" id="username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="userpass" class="form-control form-control-lg" id="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button name="login_submit" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    <?php
                        if(isset($error)){
                            echo '<p class="text-danger mt-4">'.$error.'</p>';
                        }elseif(isset($_REQUEST['wrong_info'])){
                            echo '<p class="text-danger mt-4">Please Login First!</p>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>