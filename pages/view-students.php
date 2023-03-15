<?php 
$page_title = "View Students";
$student_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');

if(isset($_POST['filter'])){
    $class = $_POST['st_class'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    if($class != "null" && $group != "null" && $shift != "null"){
        $qf_class = "WHERE st_class='$class'";
        $qf_group = "AND st_group='$group'";
        $qf_shift = "AND st_shift='$shift'";
        $filter_sql = "SELECT * FROM students ".$qf_class." ".$qf_group." ".$qf_shift;
    }elseif($class != "null" && $group != "null"){
        $qf_class = "WHERE st_class='$class'";
        $qf_group = "AND st_group='$group'";
        $filter_sql = "SELECT * FROM students ".$qf_class." ".$qf_group;
    }elseif($class != "null" && $shift != "null"){
        $qf_class = "WHERE st_class='$class'";
        $qf_shift = "AND st_shift='$shift'";
        $filter_sql = "SELECT * FROM students ".$qf_class." ".$qf_shift;
    }elseif($group != "null" && $shift != "null"){
        $qf_group = "WHERE st_group='$group'";
        $qf_shift = "AND st_shift='$shift'";
        $filter_sql = "SELECT * FROM students ".$qf_group." ".$qf_shift;
    }elseif($class != "null"){
        $qf_class = "WHERE st_class='$class'";
        $filter_sql = "SELECT * FROM students $qf_class";
    }elseif($group != "null"){
        $qf_group = "WHERE st_group='$group'";
        $filter_sql = "SELECT * FROM students $qf_group";
    }elseif($shift != "null"){
        $qf_shift = "WHERE st_shift='$shift'";
        $filter_sql = "SELECT * FROM students $qf_shift";
    }else {
        $error = "Please Select Something!";
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
                    <h2 class="pageheader-title">View Students</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">View Students</li>
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
                    <h5 class="card-header">Filter Students Data!</h5>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="POST">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Class</p>
                                        <select class="form-control" id="input-select" name="st_class" required>
                                            <option value="null" selected>Select Class</option>
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
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Group</p>
                                        <select class="form-control" id="input-select" name="group" required>
                                            <option value="null" selected>Select Group</option>
                                            <option value="Genarel">Genarel</option>
                                            <option value="Science">Science</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Commerce">Commerce</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Shift</p>
                                        <select class="form-control" id="input-select" name="shift" required>
                                            <option value="null" selected>All Shift</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Afternoon">Afternoon</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p><br></p>
                                        <button class="btn btn-primary" type="submit" name="filter">Filter
                                            Students</button>
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
                <?php if(isset($_REQUEST['deletesucc'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo "Delete Success!";?></strong>
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <?php endif;?>
                <?php if(isset($filter_query)) :?>
                <div class="card">
                    <h5 class="card-header">View Students Data!</h5>
                    <div class="card-body">
                        <?php if(mysqli_num_rows($filter_query) != 0 ) :?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Roll</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <!--  -->
                            <tbody>
                                <?php while($all_st = $filter_query->fetch_object()) :?>
                                <tr>
                                    <th scope="row">
                                        <a href="student-profile.php?stu_id=<?php echo $all_st->st_id; ?>" style="background-image: url('../assets/images/students/<?php
                                        if($all_st->st_photo == "dummy.jpg"){
                                            echo "dummy.jpg";
                                        }else{
                                            echo $all_st->st_photo;
                                        }
                                        ?>');" class="st-image"></a>
                                    </th>
                                    <td><a href="student-profile.php?stu_id=<?php echo $all_st->st_id; ?>"><?php echo $all_st->st_name;?></a></td>
                                    <td><?php echo $all_st->st_class;?></td>
                                    <td><?php echo $all_st->st_roll;?></td>
                                    <td><?php echo $all_st->st_group;?></td>
                                    <td><?php echo $all_st->st_sex;?></td>
                                    <td>
                                        <div class="btn-group ml-auto">
                                            <a href="edit-students.php?stu_id=<?php echo $all_st->st_id; ?>" class="btn btn-sm btn-outline-light">Edit</a>
                                            <a onclick="return myDelete()" href="../inc/delete.php?stu_id=<?php echo $all_st->st_id; ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete!" class="btn btn-sm btn-outline-light">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                        <?php else :?>
                        <p>No Students Found!</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php require_once('../inc/footer.php');?>