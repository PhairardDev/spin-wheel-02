<?php
include 'header.php';
include_once("models/rewardsModel.php");
$deletedata = new Rewards();

$reward_id = $_GET['id'];

$sql=$deletedata->delete($reward_id);

    if($sql){
        echo "<script>alert('ลบของรางวัลสำเร็จ');</script>";
        echo "<script>window.location.href='rewards-list.php';</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
        echo "<script>window.location.href='rewards-list.php';</script>";
    }


