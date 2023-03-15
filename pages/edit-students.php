<?php 
if(!isset($_REQUEST['stu_id'])){
    header('location:view-students.php');
}
$page_title = "Edit Students";
$student_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');

$stu_data = $_REQUEST['stu_id'];
$olddata_sql = "SELECT * FROM students WHERE st_id='$stu_data'";
$olddata_query = $conn->query($olddata_sql);
$olddata = mysqli_fetch_assoc($olddata_query);
// Old Data 
$old_name = $olddata['st_name'];
$old_ac_year = $olddata['acadamic_year'];
$old_admited_class = $olddata['st_class'];
$old_roll = $olddata['st_roll'];
$old_group = $olddata['st_group'];
$old_sex = $olddata['st_sex'];
$old_birthday = $olddata['st_birthday'];
$old_relegion = $olddata['st_religion'];
$old_address = $olddata['st_address'];
$old_shift = $olddata['st_shift'];
$old_gurdian = $olddata['gurdian_name'];
$old_relation = $olddata['gurdian_relation'];
$old_mobile = $olddata['gurdian_mobile'];
$old_photo = $olddata['st_photo'];

// New Data 
if(isset($_POST['update'])){
    $st_name = $_POST['name'];
    $acadamic_year = $_POST['ac_year'];
    $st_class = $_POST['admited_class'];
    $st_roll = $_POST['roll'];
    $st_group = $_POST['group'];
    $st_sex = $_POST['sex'];
    $st_birthday = $_POST['birthday'];
    $st_religion = $_POST['relegion'];
    $st_address = $_POST['address'];
    $st_shift = $_POST['shift'];
    $gurdian_name = $_POST['parrent_name'];
    $gurdian_relation = $_POST['parrent_relation'];
    $gurdian_mobile = $_POST['parrent_mobile'];
    $modyfy_user = $s_data['u_fullname'];
    $modyfy_date = date("Y-m-d");

    // File Uplaod Details 
    $photo_name =  $_FILES['st_image']['name'];
    $photo_size = $_FILES['st_image']['size'];
    $photo_tmp = $_FILES['st_image']['tmp_name'];
    // File  Extension
    $photex = explode('.',$photo_name);
    $photoextention = end($photex);

    if(!empty($photoextention)) {
        $new_name = "StudentPhoto".uniqid().".".$photoextention;
    }else if($old_photo == 'dummy.jpg'){
        $new_name = 'dummy.jpg';
    }else if($old_photo != 'dummy.jpg'){
        $new_name = $old_photo;
    }
    move_uploaded_file($photo_tmp,'../assets/images/students/'.$new_name);
    
    $sql = "UPDATE students SET st_name='$st_name', acadamic_year='$acadamic_year' , st_class='$st_class' , st_roll='$st_roll' , st_group='$st_group', st_photo='$new_name' , st_sex='$st_sex' , st_birthday='$st_birthday' , st_religion='$st_religion' , st_address='$st_address' , st_shift='$st_shift' , gurdian_name='$gurdian_name' , gurdian_relation='$gurdian_relation' , gurdian_mobile='$gurdian_mobile' , modyfy_user='$modyfy_user' , modyfy_date='$modyfy_date' WHERE st_id='$stu_data'";
    $query = $conn->query($sql);
    if($query){
        header("location:student-profile.php?stu_id=$stu_data");
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
                    <h2 class="pageheader-title">Edit <?php echo $olddata['st_name'];?> Data</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="view-students.php">View Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
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
                                <div class="col-md-8 col-sm-12 col-12 ">
                                    <label>
                                        <p>Student Name</p>
                                        <input type="text" class="form-control" value="<?php echo $old_name;?>" name="name"
                                            required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Acadamic Year</p>
                                        <select class="form-control" id="input-select" name="ac_year" required>
                                            <option value="2020" <?php if($old_ac_year == "2020"){ echo "selected";}?>>2020</option>
                                            <option value="2021" <?php if($old_ac_year == "2021"){ echo "selected";}?>>2021</option>
                                            <option value="2022" <?php if($old_ac_year == "2022"){ echo "selected";}?>>2022</option>
                                            <option value="2023"  <?php if($old_ac_year == "2023"){ echo "selected";}?>>2023</option>
                                            <option value="2024" <?php if($old_ac_year == "2024"){ echo "selected";}?>>2024</option>
                                            <option value="2025" <?php if($old_ac_year == "2025"){ echo "selected";}?>>2025</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-12 col-12 ">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-12 ">
                                            <label>
                                                <p>Admited Class</p>
                                                <select class="form-control" id="input-select" name="admited_class"
                                                    required>
                                                    <option value="Play" <?php if($old_admited_class == "Play"){ echo "selected";}?>>Play</option>
                                                    <option value="One" <?php if($old_admited_class == "One"){ echo "selected";}?>>One</option>
                                                    <option value="Two" <?php if($old_admited_class == "Two"){ echo "selected";}?>>Two</option>
                                                    <option value="Three" <?php if($old_admited_class == "Three"){ echo "selected";}?>>Three</option>
                                                    <option value="Four" <?php if($old_admited_class == "Four"){ echo "selected";}?>>Four</option>
                                                    <option value="Five" <?php if($old_admited_class == "Five"){ echo "selected";}?>>Five</option>
                                                    <option value="Six" <?php if($old_admited_class == "Six"){ echo "selected";}?>>Six</option>
                                                    <option value="Seven" <?php if($old_admited_class == "Seven"){ echo "selected";}?>>Seven</option>
                                                    <option value="Eight" <?php if($old_admited_class == "Eight"){ echo "selected";}?>>Eight</option>
                                                    <option value="Nine" <?php if($old_admited_class == "Nine"){ echo "selected";}?>>Nine</option>
                                                    <option value="Ten" <?php if($old_admited_class == "Ten"){ echo "selected";}?>>Ten</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 ">
                                            <label>
                                                <p>Student Sex</p>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="sex" class="custom-control-input" value="Male" <?php if($old_sex == "Male"){ echo "checked";}?>>
                                                    <span class="custom-control-label">Male</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="sex" class="custom-control-input" value="Female" <?php if($old_sex == "Female"){ echo "checked";}?>><span
                                                        class="custom-control-label">Female</span>
                                                </label>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Student Roll</p>
                                                <input type="text" class="form-control" value="<?php echo $old_roll; ?>" name="roll" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Birthday</p>
                                                <input type="date" class="form-control" value="<?php echo $old_birthday; ?>"
                                                    name="birthday" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Relegion</p>
                                                <select class="form-control" id="input-select" name="relegion" required>
                                                    <option value="Islam" <?php if($old_relegion == "Islam"){ echo "selected";}?>>Islam</option>
                                                    <option value="Hindu" <?php if($old_relegion == "Hindu"){ echo "selected";}?>>Hindu</option>
                                                    <option value="Adibasi" <?php if($old_relegion == "Adibasi"){ echo "selected";}?>>Adibasi</option>
                                                    <option value="Kristan" <?php if($old_relegion == "Kristan"){ echo "selected";}?>>Kristan</option>
                                                    <option value="Bouddho" <?php if($old_relegion == "Bouddho"){ echo "selected";}?>>Bouddho</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Group</p>
                                                <select class="form-control" id="input-select" name="group" required>
                                                    <option value="Genarel" <?php if($old_group == "Genarel"){ echo "selected";}?>>Genarel</option>
                                                    <option value="Science" <?php if($old_group == "Science"){ echo "selected";}?>>Science</option>
                                                    <option value="Arts" <?php if($old_group == "Arts"){ echo "selected";}?>>Arts</option>
                                                    <option value="Commerce" <?php if($old_group == "Commerce"){ echo "selected";}?>>Commerce</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Address</p>
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="address" value="<?php echo $old_address; ?>" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Shift</p>
                                                <select class="form-control" id="input-select" name="shift" required>
                                                    <option value="Morning" <?php if($old_shift == "Morning"){ echo "selected";}?>>Morning</option>
                                                    <option value="Afternoon" <?php if($old_shift == "Afternoon"){ echo "selected";}?>>Afternoon</option>
                                                    <option value="Evening" <?php if($old_shift == "Evening"){ echo "selected";}?>>Evening</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label class="cabinet center-block">
                                        <figure>
                                            <img src="../assets/images/students/<?php echo $old_photo; ?>" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                            <figcaption><i class="fa fa-camera"></i></figcaption>
                                        </figure>
                                            <input type="file" class="item-img file center-block" name="st_image"/>
									</label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Gurdian Name</p>
                                        <input type="text" class="form-control" placeholder="Parrent Name"
                                            name="parrent_name" value="<?php echo $old_gurdian; ?>" required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Relarion with gurdian</p>
                                        <select class="form-control" id="input-select" name="parrent_relation" required>
                                            <option value="Father" <?php if($old_relation == "Father"){ echo "selected";}?>>Father</option>
                                            <option value="Mother" <?php if($old_relation == "Mother"){ echo "selected";}?>>Mother</option>
                                            <option value="Brother" <?php if($old_relation == "Brother"){ echo "selected";}?>>Brother</option>
                                            <option value="Sister" <?php if($old_relation == "Sister"){ echo "selected";}?>>Sister</option>
                                            <option value="Uncle" <?php if($old_relation == "Uncle"){ echo "selected";}?>>Uncle</option>
                                            <option value="Aunty" <?php if($old_relation == "Aunty"){ echo "selected";}?>>Aunty</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Gurdian Mobile</p>
                                        <input type="text" class="form-control" placeholder="01761xxxxxx" value="<?php echo $old_mobile; ?>"
                                            name="parrent_mobile" required>
                                    </label>
                                </div>
                            </div>
                            <!-- RowEnd -->
                            <div class="form-row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button name="update" class="btn btn-primary" type="submit">Update Student Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../inc/footer.php');?>