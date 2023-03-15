<?php 

$student_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');

if(!isset($_REQUEST['stu_id'])){
    header('location:view-students.php');
}
$stu_data = $_REQUEST['stu_id'];
$sql = "SELECT * FROM students WHERE st_id='$stu_data'";
$query = $conn->query($sql);
$data = mysqli_fetch_assoc($query);
$page_title = $data['st_name']."'s Profile";

require_once('../inc/header.php');
?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="mb-2"><?php echo $data['st_name'];?></h3>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="view-students.php" class="breadcrumb-link">View Students</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $data['st_name'];?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- profile -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- card profile -->
                    <!-- ============================================================== -->
                    <div class="card profile-pic">
                        <div class="card-body border-bottom">
                            <div class="user-avatar text-center d-block">
                                <img src="../assets/images/students/<?php
                                        if($data['st_photo'] == 'dummy.jpg'){
                                            echo 'dummy.jpg';
                                        }else{
                                            echo $data['st_photo'];
                                        }
                                        ?>" alt="User Avatar"
                                    class="rounded-circle user-avatar-xxl">
                            </div>
                            <div class="text-center">
                                <h2 class="font-24 mb-0"><?php echo $data['st_name'];?></h2>
                                <p><?php echo "Class - ". $data['st_class'];?></p>
                            </div>
                        </div>
                        <div class="card-footer p-0 text-center">
                            <div class="card-footer-item card-footer-item-bordered">
                                <a href="edit-students.php?stu_id=<?php echo $data['st_id'];?>" class="card-link">Edit This Profile</a>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end card profile -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end profile -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- campaign data -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- campaign tab one -->
                    <!-- ============================================================== -->
                    <div class="influence-profile-content pills-regular">
                        <div class="card">
                            <h5 class="card-header">Genarel Info</h5>
                            <div class="card-body">
                                <table class="table profile-table">
                                    <tbody>
                                        <tr>
                                            <td>Roll:</td>
                                            <td><?php echo $data['st_roll'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Group:</td>
                                            <td><?php echo $data['st_group'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Shift:</td>
                                            <td><?php echo $data['st_shift'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Academic Year:</td>
                                            <td><?php echo $data['acadamic_year'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Personal Info</h5>
                            <div class="card-body">
                                <table class="table profile-table">
                                    <tbody>
                                        <tr>
                                            <td>Sex:</td>
                                            <td><?php echo $data['st_sex'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td><?php echo $data['st_birthday'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><?php echo $data['st_address'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Parents Info</h5>
                            <div class="card-body">
                                <table class="table profile-table">
                                    <tbody>
                                        <tr>
                                            <td><?php echo $data['gurdian_relation'];?> Name:</td>
                                            <td><?php echo $data['gurdian_name'];?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $data['gurdian_relation'];?> Mobile:</td>
                                            <td><?php echo $data['gurdian_mobile'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign tab one -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end campaign data -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end content -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a
                        href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper -->
<!-- ============================================================== -->
<?php require_once('../inc/footer.php');?>