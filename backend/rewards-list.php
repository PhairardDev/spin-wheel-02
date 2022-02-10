<?php 
    include 'header.php';
    require("models/rewardsModel.php");
    $insertdata = new Rewards();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ของรางวัลทั้งหมด - Spin Dashboard</title>

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
            <h1 class="m-0">ของรางวัลทั้งหมด</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-header border-0">
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อของรางวัล</th>
                    <th>เปอร์เซ็นต์การได้รางวัล</th>
                    <th>ประเภทรางวัล</th>
                    <th>จำนวนรางวัลที่จะได้</th>
                    <th>รับได้สูงสุด/ครั้ง</th>
                    <th>จำนวนคงเหลือ/ครั้ง</th>
                    <th>ระยะเวลาของรางวัล</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
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
                    <td><?php echo $row['rewardName'] ?></td>
                    <td><?php echo $row['randomPercent'] ?></td>
                    <td><?php echo $row['rewardType'] ?></td>
                    <td><?php echo $row['totalPerTime'] ?></td>
                    <td><?php echo $row['totalItems'] ?></td>
                    <td><?php echo $row['balanceItems'] ?></td>
                    <td><?php echo $row['startDate'] .'-'. $row['endDate']  ?></td>
                    <td><?php if($row['status']=='1') { echo 'Active'; } else { echo 'Inactive'; } ?></td>
                    <td><a href="#" class="btn btn-success btn-sm">แก้ไข</a>
                    <a href="#" class="btn btn-danger btn-sm">ลบ</a></td>
                  </tr>
                  <?php } ?>
                  
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
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
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">SPINDASH</a>.</strong>
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