<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';
// echo "<pre>";
// print_r($_GET);
// print_r($_POST);
// echo "</pre>";
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
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;"> <i class="fas fa-plus-circle "></i> เพิ่มเส้นทางการเดินรถ</h1>
                    </div>
                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold ">เพิ่มเส้นทางการเดินรถ</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="card mb-2 py-3 border-left-primary">
                                    <div class="card-body">
                                        <h3 class="text-primary"> รถบัส</h3>
                                        <p class="mb-4">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-5 my-1">
                                                <label class="sr-only" for="inlineFormInputstart">ทะเบียนรถ</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">ทะเบียนรถ</div>
                                                    </div>
                                                    <input type="text" name="addcarno" class="form-control" id="inlineFormInputstart" required placeholder="A000">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 my-1">
                                                <label class="sr-only" for="inlineFormInputGroupUsername">ประเภทรถ</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">ประเภทรถ</div>
                                                    </div>
                                                    <input type="text" name="addcartype" class="form-control" id="inlineFormInputGroupUsername" required placeholder="VIP 32 ที่นั่ง">
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                <div class="card mb-2 py-3 border-left-success">
                                    <div class="card-body">
                                        <h3 class="text-success"> เส้นทางการเดินรถ</h3>
                                        <p class="mb-4">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineaddpathstart">ต้นทาง</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">ต้นทาง</div>
                                                    </div>
                                                    <input type="text" name="addpathstart" class="form-control" id="inlineaddpathstart" required placeholder="กรุงเทพ">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineaddpathend">ปลายทาง</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">ปลายทาง</div>
                                                    </div>
                                                    <input type="text" name="addpathend" class="form-control" id="inlineaddpathend" required placeholder="นครราชสีมา">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 my-1">
                                                <label class="sr-only" for="inlineFormInputGroupUsername">ราคาโดยสาร</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">ราคาโดยสาร</div>
                                                    </div>
                                                    <input type="text" name="addpathprice" class="form-control" id="inlineFormInputGroupUsername" required placeholder="400">
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>

                                <div class="card mb-2 py-3 border-left-info">
                                    <div class="card-body">
                                        <h3 class="text-info"> เวลา</h3>
                                        <p class="mb-4">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineFormInputstart">เวลาต้นทาง</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">เวลาต้นทาง</div>
                                                    </div>
                                                    <input type="time" name="addtimestart" class="form-control" id="inlineFormInputstart" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineFormInputGroupUsername">เวลาปลายทาง</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">เวลาปลายทาง</div>
                                                    </div>
                                                    <input type="time" name="addtimeend" class="form-control" id="inlineFormInputGroupUsername" required>
                                                </div>
                                            </div>
                                            <div class="col-auto my-1">
                                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึก</button>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <?php
                if (isset($_POST['submit'])) {
                    // FORM bus
                    $busno = $_POST['addcarno'];
                    $bustype = $_POST['addcartype'];
                    $busstatus = 1; //set bus_status = 1 
                    // FORM path
                    $pathstart = $_POST['addpathstart'];
                    $pathend = $_POST['addpathend'];
                    $pathprice = $_POST['addpathprice'];
                    // FORM traveling_time
                    $timestart = $_POST['addtimestart'];
                    $timeend = $_POST['addtimeend'];

                    // Check paths
                    $check = "SELECT * from  paths  WHERE origin = '$pathstart' AND destination = '$pathend' "; //Check Paths
                    $result = mysqli_query($conn, $check) or die("ล้มเหลว");
                    $num = mysqli_num_rows($result);

                    if ($num > 0) {

                        echo '<script language="JavaScript">
                        swal({
                        title: "มีเส้นนี้ให้บริการแล้ว",
                        text: "กรุณาระบุเส้นทางใหม่",
                        button: "OK",
                        icon: "error",
                        });
                            </script>';
                        exit;
                    } else {
                    

                    //Insert bus_table
                    $bus_run = "INSERT INTO bus_table (bus_no,bus_type,bus_status) VALUES ('$busno','$bustype','$busstatus')";
                    $bus_run_query = mysqli_query($conn, $bus_run) or die("Insert Bus_table Failed");

                    // MAX bus_id	
                    $sql2 = "SELECT MAX(bus_id) AS bus_id FROM bus_table";
                    $query2 = mysqli_query($conn, $sql2);
                    $row = mysqli_fetch_array($query2);
                    $busid_run = $row['bus_id'];
                    $bus_namber = $busid_run; // Run busid_run = bus_namber.>>>	

                    //Insert Paths
                    $paths_query = "INSERT INTO paths (path_id,origin,destination,pricepassenger,bus_id)VALUES ('','$pathstart','$pathend','$pathprice','$bus_namber')";
                    $querypaths = mysqli_query($conn, $paths_query) or die("Insert Paths Failed");
                    
                    // MAX bus_id	
                    $sql21 = "SELECT MAX(path_id) AS path_id FROM paths ";
                    $query21 = mysqli_query($conn, $sql21);
                    $row1 = mysqli_fetch_array($query21);
                    $pathid_run = $row1['path_id'];
                    $path_namber = $pathid_run; // Run busid_run = bus_namber.>>>	

                    //Insert traveling_time
                    $traveling_query = "INSERT INTO traveling_time (travelingt_id,travelingt_start,travelingt_end,path_id)VALUES ('','$timestart','$timeend','$path_namber')";
                    $querytraveling = mysqli_query($conn, $traveling_query) or die("Insert Paths Failed");
                    
                    
                    //search
                    $query11 = "INSERT INTO traveling (traveling_name) VALUES ('$pathstart')";
                    $result11 = mysqli_query($conn, $query11) or die("เพิ่มข้อมูลไม่ได้");
            
                    $query22 = "INSERT INTO traveling (traveling_name) VALUES ('$pathend')";
                    $result22 = mysqli_query($conn, $query22) or die("เพิ่มข้อมูลไม่ได้");

                    mysqli_close($conn);
                    
                        echo '<script language="JavaScript">
                    		swal({
                    			title: "Success Complete !",
                    			text: "เพิ่มเส้นทางเดินรถสำเร็จ",
                    			icon: "success",
                    			button: "OK",
                    		  });
                    						</script>';
                        echo '<meta http-equiv="refresh" content="3; url=paths.php" />';
                        exit;
                    }
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