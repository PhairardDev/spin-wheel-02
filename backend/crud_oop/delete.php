<?php

    echo "<script>confirm('Are You sure for Remove'+ $uid);</script>";

    include_once('function.php');

    $delUser = new DB_con();
    $uid=$_GET['id'];
    $sql = $delUser->delete($uid);

    if($sql){
        echo "<script>alert('Delete user completed');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Some thing is wrong. Please try again');window.location.href='index.php';</script>";
    }

?>