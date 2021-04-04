    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class='fas fa-database'></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>หน้าหลัก</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-home"></i>
          <span>หน้าร้าน</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        รายการ
      </div>
      <!-- Nav Item - seats -->
      <li class="nav-item">
        <a class="nav-link" href="s_cars.php">
          <i class="fas fa-bus-alt"></i>
          <span>ตรวจสอบที่นั่ง</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="payment.php">
          <i class="fas fa-landmark mr-1"></i>
          <span>แจ้งชำระเงิน</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cancel.php">
          <i class="fas fa-calendar-times"></i></i>
          <span>ยกเลิกตั๋ว</span></a>
      </li>
      <!-- Heading -->
      <div class="sidebar-heading">
        ระบบ <i class="fas fa-cog fa-spin"></i>
      </div>
      <li class="nav-item">
        <a class="nav-link" href="paths.php">
          <i class="fas fa-edit mr-1"></i>
          <span>จัดการเส้นทางการเดินรถ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_path.php">
          <i class="fas fa-plus-circle mr-1"></i>
          <span>เพิ่มเส้นทางการเดินรถ</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        ประวัติ <i class="fas fa-history fa-spin"></i>
      </div>
      <li class="nav-item">
        <a class="nav-link" href="historypayment.php">
          <i class="fas fa-landmark mr-1"></i>
          <span>การชำระเงิน</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historycancel.php">
          <i class="fas fa-calendar-times"></i></i>
          <span>การยกเลิกตั๋ว</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        สมาชิก <i class="fas fa-user-alt"></i>
      </div>



      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="manage_users.php">
        <i class="fas fa-fw fas fa-user-edit"></i>
          <span>สมาชิก</span></a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="manage_admins.php">
        <i class="fas fa-fw fas fa-users-cog"></i>
          <span>แอดมิน</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">

              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <?php
            if (!empty($_SESSION['u_id'])) {
              echo '  <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      <font color="#FF0000" size="3px" style="font-weight:bold;">' . $_SESSION['u_name'] . '
                    </span>
                    <i class="fas fa-address-card"></i></font>
                    <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="index.php">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      โปรไฟล์
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      ออกจากระบบ
                    </a>
                  </div>
                </li>';
            } else {
              echo '
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <a class="btn btn-primary mt-3" href="login.php">Login</a>
                </li>';
            } ?>
          </ul>

        </nav>
        <!-- End of Topbar -->