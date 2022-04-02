<?php
session_start();
require_once 'config/db.php';

if (isset($_POST['update'])){

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header('location:user-edit.php');
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวอย่างน้อย 5 ตัวอักษร';
        header('location:user-edit.php');
    } else if (empty($confirmPassword)) {
        $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
        header('location:user-edit.php');
    } else if ($password != $confirmPassword) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง';
        header('location:user-edit.php');
    } else {
        try {

            if(!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $userId = $_SESSION["admin_login"];
                $stmt = $conn->prepare("UPDATE users SET password=:password WHERE id=:id");
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":id", $userId);
                $stmt->execute();

                $_SESSION['success'] = 'แก้ไขมูลสำเร็จ';
                header("location:user-edit.php");

            } else {
                $_SESSION['error'] = 'มีบางอย่างผิดพลาด';  
                header("location:user-edit.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}


?>