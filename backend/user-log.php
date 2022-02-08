<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>บันทึกการเข้าสู่ระบบ - Spin Dashboard</title>

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
            <h1 class="m-0">บันทึกการเข้าสู่ระบบ</h1>
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
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                    <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                    </small>
                    12,000 Sold
                    </td>
                    <td>
                    <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                    </a>
                    </td>
                </tr>
                <tr>
                    <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                    <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                    </small>
                    123,234 Sold
                    </td>
                    <td>
                    <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                    </a>
                    </td>
                </tr>
                <tr>
                    <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                    <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                    </small>
                    198 Sold
                    </td>
                    <td>
                    <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                    </a>
                    </td>
                </tr>
                <tr>
                    <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Perfect Item
                    <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                    <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                    </small>
                    87 Sold
                    </td>
                    <td>
                    <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                    </a>
                    </td>
                </tr>
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