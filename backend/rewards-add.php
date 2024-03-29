<?php 
    include 'header.php';
    include_once("models/rewardsModel.php");

    $query = new Rewards();

    if(isset($_POST['createReward'])){
      
      $rewardName = $_POST['rewardName'];
      $rewardType = $_POST['rewardType'];
      $totalPerTime = $_POST['totalPerTime'];
      $totalItems = $_POST['totalItems'];
      $createBy = $_SESSION['admin_login'];
      $percentage = $_POST['percentage'];
      $startDate = date('Y-m-d', strtotime($_POST['startDate']));
      $endDate = date('Y-m-d', strtotime($_POST['endDate']));
      $status = '1';
      
      $orderCheck = $query->fetchorder();
      $maxOrder = mysqli_fetch_assoc($orderCheck);
      $newOrder =  (($maxOrder['latest'])+1);

      $result = $query->countRewards();
      $items = mysqli_fetch_assoc($result);
      $countItems = $items['count'];
      
      if($countItems != 8){
        
        $sql = $query->insert($rewardName, $rewardType, $totalPerTime, $totalItems, $createBy, $percentage, $startDate, $endDate, $status, $newOrder);
        
        if($sql){
          echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
          echo "<script>window.location.href='rewards-list.php';</script>";
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
            echo "<script>window.location.href='rewards-list.php';</script>";
        }
      }
      else {
        echo "<script>alert('มีจำนวนครบ 8 รางวัลแล้ว ไม่สามารถเพิ่มได้อีก');</script>";
        echo "<script>window.location.href='rewards-list.php';</script>";
      }
      
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เพิ่มของรางวัล - Spin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
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
            <h1 class="m-0">เพิ่มของรางวัล</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

                    <div class="card mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0">เพิ่มของรางวัล</h6>
                        </div>
                        <div class="card-body">
                          <form action="" method="post" requireed>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="rewardName" class="form-label">ชื่อของรางวัล</label>
                                <input type="text" class="form-control" id="rewardName" name="rewardName" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-3">
                                <div class="form-group">
                                <label>วันเริ่มต้น</label>
                                    <div class="input-group date" id="startDate" data-target-input="nearest">
                                        <input type="text" name="startDate" class="form-control datetimepicker-input" data-target="#startDate"/>
                                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label>วันสิ้นสุด</label>
                                    <div class="input-group date" id="endDate" data-target-input="nearest">
                                        <input type="text" name="endDate" class="form-control datetimepicker-input" data-target="#endDate"/>
                                        <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label for="totalPerTime" class="form-label">จำนวนรางวัล(ต่อครั้ง)</label>
                                <input type="number" class="form-control" id="totalPerTime" name="totalPerTime" required>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label for="totalItems" class="form-label">จำนวนรางวัลทั้งหมด</label>
                                <input type="number" class="form-control" id="totalItems" name="totalItems" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                           
                              <div class="form-group">
                                <label for="percentage" class="form-label">เปอร์เซนต์การออกรางวัล</label>
                                <div class="input-group mb-3">    
                                  <input type="text" name="percentage" id="percentage" class="form-control" required>
                                  <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="rewardType" class="form-label">ประเภทของรางวัล</label>
                                <select name="rewardType" id="rewardType" class="form-control" required>
                                  <option value="">Plese Select</option>
                                  <option value="CREDIT">CREDIT</option>
                                  <option value="TICKET">TICKET</option>
                                  <option value="GIFT">GIFT</option>
                                  <option value="MISS">MISS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-lg btn-primary mr-2" name="createReward">Add</button>
                          <a href="rewards-list.php">Cancel</a>
                        </div>
                      </form>
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
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">SPIN Dashboard</a>.</strong>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    
    //Date picker 01
    $('#startDate').datetimepicker({
        format: 'L'
    });

    //Date picker 02
    $('#endDate').datetimepicker({
      format: 'L'
    });

  })
</script>
</body>
</html>