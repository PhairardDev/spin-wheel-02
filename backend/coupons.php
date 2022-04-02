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
          echo "<script>alert('สร้างโค้ดสำเร็จ')</script>";
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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1 class="m-0">โค้ดทั้งหมด</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <!-- DataTales Example 
        <div class="card mb-4">

                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 ">สร้างโค้ดใหม่</h6>
                        </div>
                        <div class="card-body">   
                          <form action="" method="post" requireed>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label for="numberOfCode" class="form-label">ใส่จำนวนโค้ดที่ต้องการสร้าง</label>
                                <input type="number" class="form-control" id="numberOfCode" name="numberOfCode" aria-describedby="Number Of Code" required>
                                <span class="info">กรอกตัวเลข เช่น 1-10 เท่านั้น</span>
                              </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                              <div class="form-group">
                                <label for="customerUser" class="form-label">Username ลูกค้า</label>
                                <input type="text" class="form-control" id="customerUser" name="customerUser" aria-describedby="Customer User" required>
                                <span class="info">Username ของลูกค้าที่ต้องการแจกโค้ด</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-lg btn-primary" name="createCode">สร้างโค้ด</button>
                        </div>
                        </form>
        </div>-->


<!-- Modal Create Coupons -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">สร้างโค้ดใหม่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post" requireed>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="numberOfCode" class="form-label text-primary">จำนวนโค้ด</label>
                                <input type="number" class="form-control" id="numberOfCode" name="numberOfCode" aria-describedby="Number Of Code" required>
                                <span class="info text-gray">กรอกตัวเลข เช่น 1-10 เท่านั้น</span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="customerUser" class="form-label text-primary">Username ลูกค้า</label>
                                <input type="text" class="form-control" id="customerUser" name="customerUser" aria-describedby="Customer User" required>
                                <span class="info text-gray">Username ของลูกค้าที่ต้องการแจกโค้ด</span>
                              </div>
                            </div>
                          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="createCode">Generate</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

               
                    <div class="card shadow mb-4">
                        <div class="card-body">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#exampleModal">
                          <i class="fa fa-plus"></i> สร้างโค้ดใหม่
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable">
                                    <thead>
                                        <tr class="table-info">
                                            <th>#</th>
                                            <th>โค้ด</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>ถูกสร้างเมื่อ</th>
                                            <th>ใช้งานเมื่อ</th>
                                            <th>วันหมดอายุ</th>
                                            <th>สถานะโค้ด</th>
                                            <th>รางวัลที่ได้</th>
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

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>

<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>