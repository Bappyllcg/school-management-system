<?php

session_start();
if(!isset($_SESSION['login'])){
    header('location:../index.php?wrong_info=1');
}

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE u_id=".$user_id;
$query = $conn->query($sql);
$s_data = mysqli_fetch_assoc($query);