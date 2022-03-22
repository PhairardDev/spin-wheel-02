<?php 
  session_start();
  require_once 'config/db.php';
  if(!isset($_SESSION['admin_login'])){
      /*$_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';*/
      header("location:signin.php");
  } else {
    $userId = $_SESSION['admin_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $userId");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
