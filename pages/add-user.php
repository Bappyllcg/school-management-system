<?php 
$page_title = "Add User";
$user_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');


if(isset($_POST['adduser'])){
    $name = $_POST['name'];
    $roal = $_POST['roal'];
    $uname = $_POST['uname'];
    $upass = md5($uname);

    $all_user_sql = "SELECT * FROM user WHERE u_name='$uname'";
    $all_user_query = $conn->query($all_user_sql);
    if(mysqli_num_rows($all_user_query) == 1){
        $error = 'Username Already Exiest!';
    }elseif($roal == 'null'){
        $error = 'Select An User Roal!';
    }
    else{
        $new_user_sql = "INSERT INTO user(u_fullname,u_name,u_pass,u_roal) VALUES('$name','$uname','$upass','$roal')";
        $new_user_query = $conn->query($new_user_sql);
        $success = 'User Add Successfully!';
    }
    
    if(isset($filter_sql)){
        $filter_query = $conn->query($filter_sql);
    }
}

?>

<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add New User</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add new user</h5>
                    <div class="card-body">
                        <form class="needs-validation" method="POST">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Name</p>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Roal</p>
                                        <select class="form-control" id="input-select" name="roal" required>
                                            <option value="null" selected>Select Roal</option>
                                            <option value="admin">Admin</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="accountant">Accountant</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Username</p>
                                        <input type="text" name="uname" class="form-control" placeholder="Username" required>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p><br></p>
                                        <button class="btn btn-primary" type="submit" name="adduser">Add User</button>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error;?></strong>
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <?php endif;?>

                <?php if(isset($success)) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $success;?></strong>
                    <hr>
                    <strong>Username: </strong> <?php echo $uname;?> <br>
                    <strong>Password: </strong> <?php echo $uname;?> <br>
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php require_once('../inc/footer.php');?>