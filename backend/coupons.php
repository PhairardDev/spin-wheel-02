<?php 
    include 'header.php';
    include_once("models/couponsModel.php");

    $insertdata = new Coupons();

    if(isset($_POST['createCode'])){
      
      $num = $_POST['numberOfCode'];
      $customerUser = $_POST['customerUser'];
      $createBy = $_SESSION['admin_login'];
      //$now = date('Y-m-d');
      $endDate = date('Y-m-d', strtotime("+1 day"));
      $status = '1';
      
      $sql = $insertdata->insert($num, $customerUser, $createBy, $endDate, $status);

      if($sql){
          echo "<script>alert('สร้างโค้ดสำเร็จ');</script>";
          echo "<script>window.location.href='coupons.php';</script>";
      } else {
          echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
          echo "<script>window.location.href='coupons.php';</script>";
      }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>จัดการโค้ด - Spin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php 
    include 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">โค้ดหมุนวงล้อ</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">สร้างโค้ดใหม่</h6>
                        </div>
                        <div class="card-body">
                          <form action="" method="post" requireed>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="numberOfCode" class="form-label">ใส่จำนวนโค้ดที่ต้องการสร้าง</label>
                                <input type="number" class="form-control" id="numberOfCode" name="numberOfCode" aria-describedby="Number Of Code" required>
                                <span class="info">กรอกตัวเลขเท่านั้น</span>
                              </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                              <div class="form-group">
                                <label for="customerUser" class="form-label">Username ของลูกค้า</label>
                                <input type="text" class="form-control" id="customerUser" name="customerUser" aria-describedby="Customer User" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="createCode">สร้างโค้ด</button>
                        </div>
                        </form>
        </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายการโค้ดทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Username</th>
                                            <th>Created Date</th>
                                            <th>Used Date</th>
                                            <th>Expire Date</th>
                                            <th>Status</th>
                                            <th>Rewards</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = $insertdata->fetchdata();
                                        $i = 1;
                                        while($row = mysqli_fetch_array($sql)){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['couponsCode'];?></td>
                                            <td><?php echo $row['customerUsername'];?></td>
                                            <td><?php echo $row['createDate'];?></td>
                                            <td><?php echo $row['used'];?></td>
                                            <td><?php echo $row['endDate'];?></td>
                                            <td><?php if($row['status']=='1'){echo 'ยังไม่ได้ใช้งาน';}
                                            else if($row['status']=='0'){ echo 'ใช้งานแล้ว'; }
                                            else{echo 'โค้ดหมดอายุ';}?></td>
                                            <td><?php echo $row['status'];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">SPIN DASH</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>