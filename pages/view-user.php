<?php 
$page_title = "View User";
$user_active = "active";
require_once('../inc/connection.php');
require_once('../inc/session.php');
require_once('../inc/header.php');

$all_user_sql = "SELECT * FROM user";
$all_user_query = $conn->query($all_user_sql);

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
                    <h2 class="pageheader-title">View All User</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">View User</li>
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
                <?php if(isset($_REQUEST['deletesucc'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo "Delete Success!";?></strong>
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                <?php endif;?>
                <div class="card">
                    <h5 class="card-header">View User Data!</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Roal</th>
                                    <th style="text-align: right;" scope="col"></th>
                                </tr>
                            </thead>
                            <!--  -->
                            <tbody>
                                <?php while($all_user = $all_user_query->fetch_object()) :?>
                                <tr>
                                    <th scope="row"><?php echo $all_user->u_fullname; ?></th>
                                    <td><?php echo $all_user->u_name; ?></td>
                                    <td style="text-transform: capitalize;"><?php echo $all_user->u_roal; ?></td>
                                    <td style="text-align: right;">
                                        <?php if($all_user->u_roal == 'administator') : ?>
                                        :)
                                        <?php else :?>
                                        <div class="btn-group ml-auto" style="text-align: right;">
                                            <a href="edit-user.php?u_id=<?php echo $all_user->u_id; ?>" class="btn btn-sm btn-outline-light">Edit</a>
                                            <a onclick="return myDelete()" href="../inc/delete.php?u_id=<?php echo $all_user->u_id; ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete!" class="btn btn-sm btn-outline-light">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('../inc/footer.php');?>