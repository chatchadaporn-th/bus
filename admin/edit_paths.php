<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';


$sqlpayment = "SELECT * FROM paths AS t1 INNER JOIN bus_table AS t2 ON (t1.bus_id = t2.bus_id) INNER JOIN traveling_time AS t3 ON (t1.path_id = t3.path_id) WHERE t1.path_id= '" . $_GET['id'] . "'"; //GET PRODUCT ID
$resultpayment = mysqli_query($conn, $sqlpayment);
$datapayment = mysqli_fetch_array($resultpayment);

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
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;"> <i class="fas fa-edit"></i> แก้ไขเส้นทาง</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">แก้ไขเส้นทาง</h6>
                        </div>
                        <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table table-borderless" width="50%" cellspacing="0">
                                <!-- Form Update -->
                                <tbody>
                                    <tr>
                                        <td width="20%" align="right">
                                            รถบัส :
                                        </td>
                                        <td width="80%"><h5><span class="badge badge-success right">
                                                <?php echo $datapayment['bus_type']; ?>
                                            </span></h5></td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            ต้นทาง. :
                                        </td>
                                        <td width="80%">
                                            <input type="text" class="form-control col-5" required name="origin" value="<?php echo $datapayment['origin']; ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            ปลายทาง :
                                        </td>
                                        <td width="80%">
                                            <input type="text" class="form-control col-5" required name="destination" value="<?php echo $datapayment['destination']; ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            ราคา :
                                        </td>
                                        <td width="80%">
                                            <input type="text" class="form-control col-5" required name="pricepassenger" value="<?php echo $datapayment['pricepassenger']; ?>">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td align="left"><button id="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save fa-fw"></i><b>บันทึก &nbsp;</b></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->
                <?php

if (isset($_POST['submit'])) {

    $origin = $_POST["origin"];
    $origin = stripslashes($_REQUEST['origin']); //ฟังก์ชัน stripslashes ตัด backslashe ออกจากสตริง
    $origin = mysqli_real_escape_string($conn, $origin); //ฟังก์ชัน mysql_real_escape_string() เพื่อหลีกเลี่ยง SQL Injection

    $destination = stripslashes($_POST['destination']);
    $destination = mysqli_real_escape_string($conn, $destination);

    $pricepassenger = stripslashes($_POST['pricepassenger']);
    $pricepassenger = mysqli_real_escape_string($conn, $pricepassenger);




        $query = "INSERT INTO traveling (traveling_name) VALUES ('$origin')";
        $result = mysqli_query($conn, $query) or die("เพิ่มข้อมูลไม่ได้");

        $query1 = "INSERT INTO traveling (traveling_name) VALUES ('$destination')";
        $result2 = mysqli_query($conn, $query1) or die("เพิ่มข้อมูลไม่ได้");

        $updatepaths = "UPDATE paths SET origin = '$origin' , destination = '$destination' , pricepassenger = '$pricepassenger'  WHERE path_id = '$_GET[id]'";
        $queryupdatepaths = mysqli_query($conn, $updatepaths) or die("Update paths Failed");
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal("อัพเดทเส้นทางเดินรถสำเร็จ ", "", "success");
               </script>';
        echo '<meta http-equiv="refresh" content="2; url=paths.php" />';
    

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