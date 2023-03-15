<?php 
    require_once('connection.php');
    if(isset($_REQUEST['stu_id'])){
        $stu_id = $_REQUEST['stu_id'];
        $del_sql = "DELETE FROM students WHERE st_id=$stu_id";
        $del_query = $conn->query($del_sql);
        header('location:../pages/view-students.php?deletesucc');
    }
    if(isset($_REQUEST['u_id'])){
        $u_id = $_REQUEST['u_id'];
        $u_del_sql = "DELETE FROM user WHERE u_id=$u_id";
        $del_query = $conn->query($u_del_sql);
        header('location:../pages/view-user.php?deletesucc');
    }

    

    

?>