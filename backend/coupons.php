<?php 
    include 'header.php';
    include_once("models/couponsModel.php");

    $dbQuery = new Coupons();
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
            <h1 class="mb-4">โค้ดทั้งหมด</h1>
            <a href="coupons-add.php" class="btn btn-secondary btn-lg"><i class="fa fa-plus"></i> สร้างโค้ดใหม่</a>
           
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <div class="card card-primary card-tabs">
              <div class="card-header">
              <h4 class="p-1">โค้ดที่ยังไม่ได้ใช้งาน</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                      <table class="table table-bordered table-hover dataTable" id="dataTable01">
                                    <thead>
                                        <tr class="table-info">
                                            <th>#</th>
                                            <th>โค้ด</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>สร้างเมื่อ</th>
                                            <th>สถานะโค้ด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = $dbQuery->fetchdata();
                                        $i = 1;
                                        while($row = mysqli_fetch_array($sql)){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['couponsCode'];?></td>
                                            <td><?php echo $row['customerUsername'];?></td>
                                            <td><?php echo $row['createDate'];?></td>
                                            <td>ยังไม่ได้ใช้งาน</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                  
                      </div>
              </div>
              <!-- /.card -->
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
    $('.dataTable').DataTable({
      "paging": true,
      "pageLength": 50,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>