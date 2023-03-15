<?php 
$page_title = "View Subject";
$subject_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');

if(isset($_POST['viewsubject'])){
    $sub_class = $_POST['sub_class'];

    $sql = "SELECT * FROM subjects INNER JOIN user ON subjects.sub_teacher_id=user.u_id WHERE sub_class='$sub_class';";
    $query = $conn->query($sql);
    if(mysqli_num_rows($query) == 0){
        $error = 'No Subject Found!';
    }else {
        $success = 'Subject Found Successfully!';
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
                                <div class="col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <label>
                                        <p>Select Class</p>
                                        <select class="form-control" id="input-select" name="sub_class" required>
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
                                        <p><br></p>
                                        <button class="btn btn-primary" type="submit" name="viewsubject">View
                                            Subjects</button>
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
                <div class="card">
                    <h5 class="card-header">View Class <?php echo $sub_class;?> Subjects!</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Subjects Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject Teacher</th>
                                    <th scope="col">Subject Type</th>
                                    <th scope="col">Exam In</th>
                                    <th style="text-align: right;" scope="col"></th>
                                </tr>
                            </thead>
                            <!--  -->
                            <tbody>
                                <?php while($all_subject = $query->fetch_object()) :?>
                                <tr>
                                    <th scope="row"><?php echo $all_subject->sub_name; ?></th>
                                    <td><?php echo $all_subject->sub_class; ?></td>
                                    <td style="text-transform: capitalize;"><?php echo $all_subject->u_fullname; ?></td>
                                    <td style="text-transform: capitalize;"><?php echo $all_subject->type_of_sub; ?></td>
                                    <td><?php echo $all_subject->exam_in; ?></td>
                                    <td style="text-align: right;">
                                        <div class="btn-group ml-auto" style="text-align: right;">
                                            <a href="edit-subject.php?sub_id=<?php echo $all_subject->sub_id; ?>"
                                                class="btn btn-sm btn-outline-light">Edit</a>
                                            <a onclick="return myDelete()"
                                                href="../inc/delete.php?u_id=<?php echo $all_user->u_id; ?>"
                                                data-toggle="tooltip" data-placement="left" title=""
                                                data-original-title="Delete!" class="btn btn-sm btn-outline-light">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php require_once('../inc/footer.php');?>