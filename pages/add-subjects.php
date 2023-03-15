<?php 
$page_title = "Add New Subject";
$subject_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');

// All Teacher 
$all_user_sql = "SELECT * FROM user WHERE u_roal='teacher'";
$all_user_query = $conn->query($all_user_sql);


if(isset($_POST['addsubject'])){
    $subject_name = $_POST['subject_name'];
    $sub_class = $_POST['sub_class'];
    $sub_teacher = $_POST['sub_teacher'];
    $type = $_POST['type'];
    $exam_in = $_POST['exam_in'];

    $new_user_sql = "INSERT INTO subjects(sub_name,sub_class,sub_teacher_id,type_of_sub,exam_in) VALUES('$subject_name','$sub_class','$sub_teacher','$type','$exam_in')";
    $new_user_query = $conn->query($new_user_sql);
    $success = 'Subject Add Successfully!';

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
                    <h2 class="pageheader-title">Add New Subject</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Subject</li>
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
                    <h5 class="card-header">Add new subject</h5>
                    <div class="card-body">
                        <form class="needs-validation" method="POST">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Subject Name</p>
                                        <input type="text" name="subject_name" class="form-control" placeholder="Subject Name" required>
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">
                                <label>
                                    <p>For Class</p>
                                    <select class="form-control" id="input-select" name="sub_class"
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
                                <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">
                                <label>
                                    <p>Class Teacher</p>
                                    <select class="form-control" id="input-select" name="sub_teacher"
                                        required>
                                        <?php while($all_user = $all_user_query->fetch_object()) :?>
                                            <option value="<?php echo $all_user->u_id; ?>"><?php echo $all_user->u_fullname; ?></option>
                                        <?php endwhile;?>
                                    </select>
                                </label>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">
                                <label>
                                    <p>Type</p>
                                    <select class="form-control" id="input-select" name="type"
                                        required>
                                        <option value="mendatory">Mendatory</option>
                                        <option value="aditional">Aditional</option>
                                    </select>
                                </label>
                                </div>
                                <div class="col-lg-1 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Exam In</p>
                                        <select class="form-control" id="input-select" name="exam_in"
                                        required>
                                            <option value="100">100</option>
                                            <option value="75">75</option>
                                            <option value="50">50</option>
                                            <option value="25">25</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p><br></p>
                                        <button class="btn btn-primary" type="submit" name="addsubject">Add Subject</button>
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