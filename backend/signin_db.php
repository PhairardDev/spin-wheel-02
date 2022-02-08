<?php 
session_start();
require_once 'config/db.php';

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if (isset($_POST['signin'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
        header('location:signin.php');
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header('location:signin.php');
    } else {
        try {

            $check_data = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $check_data->bindParam(":username", $username);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if($check_data->rowCount() > 0) {

                if($row['status']=='1'){

                    if($username == $row['username']){
                        if(password_verify($password, $row['password'])){

                            $log = $conn->prepare("INSERT INTO access_logs(userId, ipAddress) VALUES (:uid, :ipaddress)");
                            $log->bindParam(":uid", $row['id']);
                            $log->bindParam(":ipaddress", get_client_ip());
                            $log->execute();
    
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: index.php");

                        } else {
                            $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
                            header("location: signin.php");
                        }
                    } else {
                        $_SESSION['error'] = 'ไม่พบอีเมลนี้ในระบบ';
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = 'บัญชีนี้ถูกระงับการใช้งาน';  
                    header("location:signin.php");
                }
            
            } else {
                $_SESSION['error'] = 'ไม่มีข้อมูลในระบบ';  
                header("location:signin.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}

