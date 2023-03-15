<?php 
$page_title = "Add Students";
$student_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');

if(isset($_POST['submit'])){
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

    if(empty($photoextention)){
        $new_name = 'dummy.jpg';
    }else {
        $new_name = "StudentPhoto".uniqid().".".$photoextention;
    }
    move_uploaded_file($photo_tmp,'../assets/images/students/'.$new_name);
    
    $sql = "INSERT INTO students(st_name,acadamic_year,st_class,st_roll,st_group,st_photo,st_sex,st_birthday,st_religion,st_address,st_shift,gurdian_name,gurdian_relation,gurdian_mobile,modyfy_user,modyfy_date) VALUES('$st_name','$acadamic_year','$st_class','$st_roll','$st_group','$new_name','$st_sex','$st_birthday','$st_religion','$st_address','$st_shift','$gurdian_name','$gurdian_relation','$gurdian_mobile','$modyfy_user','$modyfy_date')";
    $query = $conn->query($sql);
    $success = "Student Added Successfuly!";

    
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
                    <h2 class="pageheader-title">Add Students</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Students</li>
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
                    <h5 class="card-header">Add New Student</h5>
                    <div class="card-body">
                        <form method="POST" class="needs-validation"  enctype="multipart/form-data">
                            <!-- Row Start  -->
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-12 ">
                                    <label>
                                        <p>Student Name</p>
                                        <input type="text" class="form-control" placeholder="Student Name" name="name"
                                            required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Acadamic Year</p>
                                        <select class="form-control" id="input-select" name="ac_year" required>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
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
                                                    <option value="Play">Play</option>
                                                    <option value="One">One</option>
                                                    <option value="Two">Two</option>
                                                    <option value="Three">Three</option>
                                                    <option value="Four">Four</option>
                                                    <option value="Five">Five</option>
                                                    <option value="Six">Six</option>
                                                    <option value="Seven">Seven</option>
                                                    <option value="Eight">Eight</option>
                                                    <option value="Nine">Nine</option>
                                                    <option value="Ten">Ten</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 ">
                                            <label>
                                                <p>Student Sex</p>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="sex" class="custom-control-input" value="Male" checked>
                                                    <span class="custom-control-label">Male</span>
                                                </label>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="sex" class="custom-control-input" value="Female"><span
                                                        class="custom-control-label">Female</span>
                                                </label>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Student Roll</p>
                                                <input type="text" class="form-control" placeholder="Roll No"
                                                    name="roll" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Birthday</p>
                                                <input type="date" class="form-control" placeholder="Student Birthday"
                                                    name="birthday" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Relegion</p>
                                                <select class="form-control" id="input-select" name="relegion" required>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Adibasi">Adibasi</option>
                                                    <option value="Kristan">Kristan</option>
                                                    <option value="Bouddho">Bouddho</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Group</p>
                                                <select class="form-control" id="input-select" name="group" required>
                                                    <option value="Genarel">Genarel</option>
                                                    <option value="Science">Science</option>
                                                    <option value="Arts">Arts</option>
                                                    <option value="Commerce">Commerce</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Address</p>
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="address" required>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-12 ">
                                            <label>
                                                <p>Shift</p>
                                                <select class="form-control" id="input-select" name="shift" required>
                                                    <option value="Morning">Morning</option>
                                                    <option value="Afternoon">Afternoon</option>
                                                    <option value="Evening">Evening</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label class="cabinet center-block">
                                        <figure>
                                            <img src="../assets/images/personnel_boy.png" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                            <figcaption><i class="fa fa-camera"></i></figcaption>
                                        </figure>
                                            <input type="file" class="item-img file center-block" name="st_image"/>
									</label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Gurdian Name</p>
                                        <input type="text" class="form-control" placeholder="Parrent Name"
                                            name="parrent_name" required>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Relarion with gurdian</p>
                                        <select class="form-control" id="input-select" name="parrent_relation" required>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Uncle">Uncle</option>
                                            <option value="Aunty">Aunty</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12 ">
                                    <label>
                                        <p>Gurdian Mobile</p>
                                        <input type="text" class="form-control" placeholder="01761xxxxxx"
                                            name="parrent_mobile" required>
                                    </label>
                                </div>
                            </div>
                            <!-- RowEnd -->
                            <div class="form-row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button name="submit" class="btn btn-primary" type="submit">Add New Student</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../inc/footer.php');?>