<?php 
  session_start();
  require_once 'config/db.php';
  if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header("location:signin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php 
        if(isset($_SESSION['admin_login'])){
            $userId = $_SESSION['admin_login'];
            $stmt = $conn->query("SELECT * FROM users WHERE id = $userId");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    ?>
    <h3 class="mt-4"> Welcome <?php echo $row['username'].' '.$row['fullname']; ?>
    <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="flex">
                <a href="add-user.php" class="btn btn-secondary">เพิ่มผู้ใช้ใหม่่</a>
            </div>
        </div>
    </div>
</body>
</html>