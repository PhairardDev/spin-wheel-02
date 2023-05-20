<?php
include 'header.php';
include_once("models/couponsModel.php");

    $dbQuery = new Coupons();

    if(isset($_POST['createCode'])){
      
      $num = $_POST['numberOfCode'];
      $customerUser = $_POST['customerUser'];
      $createBy = $_SESSION['admin_login'];
      //$now = date('Y-m-d');
      $endDate = date('Y-m-d', strtotime("+1 day"));
      $status = '1';
    
        if($num > 10){
          $_SESSION['error'] = 'สร้างได้ไม่เกิน 10 โค้ด/ครั้ง กรุณาลองใหม่';
          header('location:coupons-add.php');
	    }
	    else {
	  	
		    $sql = $dbQuery->insert($num, $customerUser, $createBy, $endDate, $status);

            if($sql){
                echo "<script>alert('สร้างโค้ดสำเร็จ')</script>";
                echo "<script>window.location.href='coupons.php';</script>";
            } else {
                $_SESSION['error'] = 'มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง';
                header('location:coupons-add.php');
            }
	    }
  }