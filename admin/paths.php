<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';


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
                    <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;"> <i class="fas fa-edit"></i> จัดการเส้นทางการเดินรถ</h1>
                </div>
            <!-- DataTales Example -->
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">จัดการเส้นทางการเดินรถ</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>รถบัส</th>
                            <th>ต้นทาง</th>
                            <th>ปลายทาง</th>
                            <th>แก้ไขเส้นทาง</th>
                            <th>แก้ไขเวลา</th>
                            <th>แก้ไขรถบัส</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>NO.</th>
                            <th>รถบัส</th>
                            <th>ต้นทาง</th>
                            <th>ปลายทาง</th>
                            <th>แก้ไขเส้นทาง</th>
                            <th>แก้ไขเวลา</th>
                            <th>แก้ไขรถบัส</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                          $num=1;
                          $sqlmana_users= "SELECT * FROM paths AS t1 INNER JOIN bus_table AS t2 ON (t1.bus_id = t2.bus_id)";
                          $resultmana_users = mysqli_query($conn, $sqlmana_users);
                          while ($datauser = mysqli_fetch_array($resultmana_users)) {
                        ?>
                        <tr>
                            <td><?php echo $num ?></td>
                            <td><?php echo $datauser['bus_type']; ?></td>
                            <td><?php echo $datauser['origin']; ?></td>
                            <td><?php echo $datauser['destination']; ?></td>
                            <td>
                              <a class="btn btn-success btn-sm" href="edit_paths.php?id=<?php echo $datauser['path_id']; ?>" ><b>Edit </b></a>
                            </td>
                            <td>
                              <a class="btn btn-success btn-sm" href="edit_time.php?id=<?php echo $datauser['path_id']; ?>" ><b>Edit </b></a>
                            </td>
                            <td>
                              <a class="btn btn-success btn-sm" href="edit_bus.php?id=<?php echo $datauser['path_id']; ?>" ><b>Edit </b></a>
                            </td>
                        </tr>
                          <?php
                          $num++; } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>

       

           

        </div>
        <!-- /.container-fluid -->

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