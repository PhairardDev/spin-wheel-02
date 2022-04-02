 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
</nav> 
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Spin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Login as <?php echo $row['username'].' '.$row['fullname']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
         <li class="nav-item">
            <a href="coupons.php" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Coupons Code
                <span class="right badge badge-danger">หมุนวงล้อ</span>
              </p>
            </a>
          </li>
        
        <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-star"></i>
              <p>
                รางวัล
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="rewards-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รางวัลทั้งหมด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rewards-add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มของรางวัล</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                ผู้ใช้งาน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ผู้ใช้ทั้งหมด</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user-add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มผู้ใช้ใหม่</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i> 
              <p>
                 ออกจากระบบ
              </p>
            </a>
          </li>

          
        </ul>
              
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>