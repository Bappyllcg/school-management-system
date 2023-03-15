<?php 
$page_title = "Profile";
$dash_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
if(isset($_POST['changeinfo'])){
    $old_pass = $s_data['u_pass'];
    $new_name = $_POST['name'];
    $new_username = $_POST['uname'];
    $new_formpass = md5($_POST['formpass']);
    if($old_pass != $new_formpass){
        $info_error = "Old password don't match!";
        $error = "0";
    }else {
        $info_sql = "UPDATE user SET u_fullname='$new_name', u_name='$new_username'";
        $query = $conn->query($info_sql);
        header('location:user-profile.php');
    }
}
if(isset($_POST['changepass'])){
    $uold_pass = $s_data['u_pass'];
    $old_pass = md5($_POST['oldpass']);
    $new_formpass = $_POST['newpassform'];
    $repass = $_POST['repass'];
    if($old_pass != $uold_pass){
        $pass_error = "Old password don't match!";
        $error = "0";
    }else if($new_formpass != $repass){
        $pass_error = "New password and retype don't match!";
        $error = "0";
    }else{
        $finall_pass = md5($new_formpass);
        $pass_sql = "UPDATE user SET u_pass='$finall_pass'";
        $query = $conn->query($pass_sql);
        session_destroy();
        header('location:../index.php');
    }
}
require_once('../inc/header.php');
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
                    <h2 class="pageheader-title">Hello <?php echo $s_data['u_fullname'];?></h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
                        sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 offset-md-2">
                        <div class="simple-card">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(!isset($error)){echo "active";}?> border-left-0"
                                        id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab"
                                        aria-controls="home" aria-selected="true">Your
                                        Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($info_error)){echo "active";}?>"
                                        id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                                        aria-controls="profile" aria-selected="false">Change Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($pass_error)){echo "active";}?>" id="contact-tab-simple" data-toggle="tab" href="#contact-simple"
                                        role="tab" aria-controls="contact" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade <?php if(!isset($error)){echo "show active";}?>"
                                    id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                                    <table class="table profile-table">
                                        <tbody>
                                            <tr>
                                                <td>Your Name:</td>
                                                <td><?php echo $s_data['u_fullname'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td><?php echo $s_data['u_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td class="text-secondary"><small>This Information is hidden</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Your Roal:</td>
                                                <td><?php echo $s_data['u_roal'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade <?php if(isset($info_error)){echo "show active";}?>"
                                    id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                    <form method="POST" id="form">
                                        <div class="form-group row">
                                            <label for="name" class="col-3 col-lg-2 col-form-label text-right">Full
                                                Name</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="name" type="text" value="<?php echo $s_data['u_fullname'];?>"
                                                    placeholder="Type your Name" class="form-control" name="name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="uname"
                                                class="col-3 col-lg-2 col-form-label text-right">Username</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="uname" type="text" value="<?php echo $s_data['u_name'];?>"
                                                    placeholder="Type new username!" class="form-control" name="uname"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="oldpass" class="col-3 col-lg-2 col-form-label text-right">Old
                                                Password</label>
                                            <div class="col-9 col-lg-10">
                                                <input id="oldpassinfo" type="password" placeholder="Old Password"
                                                    class="form-control" name="formpass" required>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <p class="text-danger"><?php if(isset($info_error)){echo $info_error;}?></p>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button name="changeinfo" type="submit"
                                                        class="btn btn-space btn-primary">Update Info</button>
                                                    <a href="dashboard.php"
                                                        class="btn btn-space btn-secondary">Cancel</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade <?php if(isset($pass_error)){echo "show active";}?>" id="contact-simple" role="tabpanel"
                                    aria-labelledby="contact-tab-simple">
                                    <form method="POST" id="form">
                                        <div class="form-group row">
                                            <label for="oldpass" class="col-4 col-lg-3 col-form-label text-right">Old
                                                password</label>
                                            <div class="col-8 col-lg-9">
                                                <input id="oldpassform" type="password" placeholder="Your old password" class="form-control" name="oldpass" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="newpass" class="col-4 col-lg-3 col-form-label text-right">New password</label>
                                            <div class="col-8 col-lg-9">
                                                <input id="newpass" type="password" placeholder="Your new password" class="form-control" name="newpassform" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="repass" class="col-4 col-lg-3 col-form-label text-right">Retype password</label>
                                            <div class="col-8 col-lg-9">
                                                <input id="repass" type="password" placeholder="Retype new password" class="form-control" name="repass" required>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            <p class="text-danger"><?php if(isset($pass_error)){echo $pass_error;}?></p>
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button name="changepass" type="submit"
                                                        class="btn btn-space btn-primary">Update Password</button>
                                                    <a href="dashboard.php"
                                                        class="btn btn-space btn-secondary">Cancel</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../inc/footer.php');?>