<?php 
if(!isset($_REQUEST['u_id'])){
    header('location:view-user.php');
}
$page_title = "Edit User";
$user_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');

$u_data = $_REQUEST['u_id'];
$olddata_sql = "SELECT * FROM user WHERE u_id='$u_data'";
$olddata_query = $conn->query($olddata_sql);
$olddata = mysqli_fetch_assoc($olddata_query);
// Old Data 
$old_name = $olddata['u_fullname'];
$old_uname = $olddata['u_name'];
$old_roal = $olddata['u_roal'];

// New Data 
if(isset($_POST['update'])){
    $new_name = $_POST['fname'];
    $new_uname = $_POST['uname'];
    $new_roal = $_POST['roal'];
    $new_pass = $_POST['pass'];
    $new_repass = $_POST['repass'];

    if($new_pass == $new_repass){
        $finall_pass = md5($new_pass);
        $sql = "UPDATE user SET u_fullname='$new_name', u_name='$new_uname', u_pass='$finall_pass' , u_roal='$new_roal' WHERE u_id='$u_data'";
        $query = $conn->query($sql);
        if($query){
            $success = 'User Update Success!';
        }
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
                    <h2 class="pageheader-title">Edit <?php echo $olddata['u_fullname'];?> Data</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="view-user.php">View User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                <?php if(isset($success)) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $success;?></strong>
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                <?php endif;?>
                <div class="card">
                    <h5 class="card-header">Edit Student</h5>
                    <div class="card-body">
                        <form method="POST" class="needs-validation"  enctype="multipart/form-data">
                            <!-- Row Start  -->
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>User Fullname</p>
                                        <input type="text" class="form-control" value="<?php echo $old_name;?>" name="fname"
                                            required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Username</p>
                                        <input type="text" class="form-control" value="<?php echo $old_uname;?>" name="uname"
                                            required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>User Roal (<span style="text-transform: capitalize;"><?php echo $old_roal; ?></span>)</p>
                                        <select class="form-control" id="input-select" name="roal" required>
                                            <option value="admin" <?php if($old_roal == 'admin'){ echo 'selected';} ?>>Admin</option>
                                            <option value="teacher" <?php if($old_roal == 'teacher'){ echo 'selected';} ?>>Teacher</option>
                                            <option value="accountant" <?php if($old_roal == 'accountant'){ echo 'selected';} ?>>Accountant</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 ">
                                    <label>
                                        <p>Password</p>
                                        <input type="password" class="form-control"  name="pass" required>
                                    </label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 ">
                                    <label>
                                        <p>Retype Password</p>
                                        <input type="password" class="form-control"  name="repass" required>
                                    </label>
                                </div>
                                
                            </div>
                            <!-- RowEnd -->
                            <div class="form-row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button name="update" class="btn btn-primary" type="submit">Update User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../inc/footer.php');?>