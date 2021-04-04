<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';

$sqluser = "SELECT * FROM tbl_users WHERE u_id ='" . $_GET['m_id'] . "'limit 1";
$resultuser = mysqli_query($conn, $sqluser);
$data_user = mysqli_fetch_array($resultuser);
if (empty($objResult['u_status'] == '2')) { //Check ADMIN Status = 1

    echo "<script>";
    echo "alert('Admin Only !!');";
    echo "window.location='../index.php';";
    echo "</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Font ไทย เนื้อหา font-family: 'Kanit', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <!-- Custom styles for dataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
      <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top" style="font-family: 'Kanit', sans-serif;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        require_once("navigation.php");
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;"><i class="fas fa-fw fas fa-user-edit"></i> ข้อมูลสมาชิก</h1>
      </div>

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">ข้อมูลสมาชิก</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
              <form action="" method="POST">
              <div class="row">
                <div class="col-5 text-right" >Username :</div>
                <div class="col"><input name="u_username" type="text" class="form-control form-control-sm" value="<?php echo $data_user['u_username']; ?>" required></div>
                <div class="w-100 mt-2"></div>
                <div class="col-5 text-right" >ชื่อ :</div>
                <div class="col"><input name="u_name" type="text" class="form-control form-control-sm" value="<?php echo $data_user['u_name']; ?>" required></div>
              </div>
              <div class="row mt-2">
                <div class="col-5 text-right" >เบอร์โทร :</div>
                <div class="col"><input name="u_tel" type="text" class="form-control form-control-sm" value="<?php echo $data_user['u_tel']; ?>" required></div>
              </div>
              <div class="row mt-2">
                <div class="col-5 text-right" >รหัสผ่าน :</div>
                <div class="col"><input name="u_password" type="text" class="form-control form-control-sm" value="<?php echo $data_user['u_password']; ?>" ></div>
                <div class="w-100 mt-2"></div>
                <div class="col-5 text-right" >สถานะ :</div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" id="exampleRadios1" type="radio" name="u_status" <?PHP if ($data_user["u_status"] == "1") {
                                                                                    echo " checked ";
                                                                                  } //end if 
                                                                                  ?> value="1">
                    <label class="form-check-label" for="exampleRadios1">สมาชิก</label></div>
                  <div class="form-check">
                    <input class="form-check-input" id="exampleRadios2" type="radio" name="u_status" <?= ($data_user["u_status"] == "2") ? " checked " : "" ?> value="2">
                    <label class="form-check-label" for="exampleRadios2">Admin</label></div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                <blockquote class="blockquote">
                      <button  name="submit" type="submit" class="btn btn-primary  btn-sm">
                                        <span class="icon text-white-60"><i class="fas fa-plus-square"> </i></span>
                                        <span class="text">ยืนยันการทำรายการ</span>
                                        </button>
                         </blockquote>
                </div>
                <div class="col-sm">

                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
    <?php
  if (isset($_POST['submit'])) {
    $id = $_GET['m_id'];
    $name = $_POST['u_name'];
    $tel = $_POST['u_tel'];
    $password = $_POST['u_password'];
    $status = $_POST['u_status'];


    $edit_user = "UPDATE tbl_users SET `u_password`= '$password', `u_name`= '$name', `u_tel`='$tel',`u_status`='$status' WHERE u_id  = '$id'";
    $updateusers = mysqli_query($conn, $edit_user) or die("Update Failed");
    mysqli_close($conn);
    echo '<script language="JavaScript">
                      swal({
                        title: "Success",
                        text: "บันทึกข้อมูลสำเร็จ",
                        button: "OK",
                        icon: "success",
                        });
                            </script>';
    echo '<meta http-equiv="refresh" content="1; url=edit_user.php?m_id='.$id.'" />';
    exit;
  }
  ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบหรือไม่</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">หากต้องการออกจากระบบกรุณากดปุ่ม 'ยืนยัน'</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw"></i> ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins Table ***-->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts Table*** -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>