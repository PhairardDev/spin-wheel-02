<?php 
    include 'header.php';
    require("models/rewardsModel.php");
    $query = new Rewards();
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
  <!-- Jquery UI style -->
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
  
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
            <a href="rewards-add.php" class="btn btn-outline-primary mt-2"><i class="fa fa-plus"></i> เพิ่มของรางวัลใหม่</a>
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
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr class="table-info">
                    <th>ชื่อของรางวัล</th>
                    <th>% การได้รางวัล</th>
                    <th>ประเภทรางวัล</th>
                    <th>จำนวนคงเหลือทั้งหมด</th>
                    <th>ระยะเวลาของรางวัล</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                  </tr>
                  </thead>
                  <tbody class="sortable">
                  <?php
                      $sql = $query->fetchdata();
                      //$i = 1;
                      while($row = mysqli_fetch_array($sql)){ 
                  ?>  
                  <tr id="<?=$row['id']?>">
                    <td><?php echo $row['rewardName'] ?></td>
                    <td><?php echo $row['randomPercent'] ?> %</td>
                    <td><?php echo $row['rewardType'] ?></td>
                    <td><?php echo $row['balanceItems'] ?></td>
                    <td><?php echo $row['startDate'] .' to '. $row['endDate']  ?></td>
                    <td><?php if($row['status']=='1') { echo 'Active'; } else { echo 'Inactive'; } ?></td>
                    <td><a href="rewards-edit.php?id=<?=$row['id']?>" class="btn btn-success btn-sm">แก้ไข</a>
                    <a href="rewards-delete.php?id=<?=$row['id']?>" class="btn btn-danger btn-sm">ลบ</a></td>
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
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
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

<script type="text/javascript">
	$(function(){
		$('.sortable').sortable({
			stop:function()
			{
				var ids = '';
				$('.sortable tr').each(function(){
					id = $(this).attr('id');
					if(ids=='')
					{
						ids = id;
					}
					else
					{
						ids = ids+','+id;
					}
				})
				$.ajax({
					url:'rewards-order.php',
					data:'ids='+ids,
					type:'post',
					success:function()
					{
            console.log(ids)
						//alert('บันทึกอันดับแสดงผลของรางวัลเรียบร้อย');
					}
				})
			}
		});
	});
</script>

</body>
</html>