<?php 
session_start();
require_once 'config/db.php';

if (isset($_POST['signup'])){

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if($_SESSION['admin_login']!=''){
        $createBy = $_SESSION['admin_login'];
    }
    else {
        $createBy = '2';
    }

    if(empty($username)){
        $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
        header('location:user-add.php');
    } else if (empty($fullname)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อ';
        header('location:user-add.php');
    } else if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header('location:user-add.php');
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง';
        header('location:user-add.php');
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header('location:user-add.php');
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวอย่างน้อย 5 ตัวอักษร';
        header('location:user-add.php');
    } else if (empty($confirmPassword)) {
        $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
        header('location:user-add.php');
    } else if ($password != $confirmPassword) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง';
        header('location:user-add.php');
    } else {
        try {

            $check_username = $conn->prepare('SELECT username FROM users WHERE username = :username');
            $check_username->bindParam(":username", $username);
            $check_username->execute();
            $row = $check_username->fetch(PDO::FETCH_ASSOC);

            if($row['username'] == $username) {
                $_SESSION['warning'] = 'Username นี้ถูกใช้งานในระบบแล้ว กรุณาลองใหม่อีกครั้ง';
                header("location:index.php");
            } else if(!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (username, fullname, email, password, createBy, status) VALUES (:username, :fullname, :email, :password, :craeteBy, '1')");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":fullname", $fullname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":craeteBy", $createBy);
                $stmt->execute();

                $_SESSION['success'] = 'เพิ่มข้อมูลสำเร็จ';
                header("location:user-add.php");

            } else {
                $_SESSION['error'] = 'มีบางอย่างผิดพลาด';  
                header("location:user-add.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}







?>