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
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;"> <i class="fas fa-edit"></i> แก้ไขเวลาเดินทาง</h1>
                    </div>
                    <!-- Page Heading -->

                    <div class="card mb-2 py-3 border-left-success">
                        <div class="card-body">
                            <h3 class="text-success"> เพิ่มรอบเวลา</h3>
                            <p class="mb-4">
                            <form method="POST">
                                <div class="form-row align-items-center">
                                    <div class="col-sm-3 my-1">
                                        <label class="sr-only" for="inlineFormInputstart">เวลาต้นทาง</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">เวลาต้นทาง</div>
                                            </div>
                                            <input type="time" name="addtimestart" class="form-control" id="inlineFormInputstart">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 my-1">
                                        <label class="sr-only" for="inlineFormInputGroupUsername">เวลาปลายทาง</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">เวลาปลายทาง</div>
                                            </div>
                                            <input type="time" name="addtimeend" class="form-control" id="inlineFormInputGroupUsername">
                                        </div>
                                    </div>
                                    <div class="col-auto my-1">
                                        <button name="submitaddtime" type="submit" class="btn btn-success  btn-sm ">
                                            <span class="icon text-white-60"><i class="	fas fa-save"> </i></span>
                                            <span class="text">เพิ่มข้อมูล</span>
                                        </button>
                                    </div>
                                </div>
                            </form>


                            </p>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">แก้ไขเวลาเดินทาง</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="table-responsive ">
                                    <table class="table table-striped text-center" id="dataTable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>เวลาต้นทาง</th>
                                                <th>เวลาปลายทาง</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NO.</th>
                                                <th>เวลาต้นทาง</th>
                                                <th>เวลาปลายทาง</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php



                                            $sqlpayment = "SELECT * FROM paths AS t1 INNER JOIN bus_table AS t2 ON (t1.bus_id = t2.bus_id) INNER JOIN traveling_time AS t3 ON (t1.path_id = t3.path_id) WHERE t1.path_id= '" . $_GET['id'] . "'"; //GET PRODUCT ID
                                            $resultpayment = mysqli_query($conn, $sqlpayment);
                                            $num = 1;
                                            while ($row = mysqli_fetch_array($resultpayment)) {
                                            ?>
                                                <tr>
                                                    <td><b><?php echo $num; ?></b></td>
                                                    <td>
                                                        <form role="form" method="POST" id="update" name="updatetime">
                                                            <input class="form-control " name="updatestart" type="time" value="<?php echo $row["travelingt_start"]; ?>">
                                                            <button class="btn btn-primary btn-sm mt-2 " type="submit" name="submitupdatestart" value="<?= $_GET['id'] ?>"><b><i class="fas fa-sync-alt fa-fw"></i>บันทึก<b></button>
                                                            <input type="text" name="sid" value="<?= $row['travelingt_id']; ?>" hidden>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form role="form" method="POST" id="update" name="updatetime">
                                                            <input class="form-control " name="updateend" type="time" value="<?php echo $row["travelingt_end"]; ?>">
                                                            <button class="btn btn-primary btn-sm mt-2 " type="submit" name="submitupdateend"><b><i class="fas fa-sync-alt fa-fw"></i>บันทึก<b></button>
                                                            <input type="text" name="sid" value="<?= $row['travelingt_id']; ?>" hidden>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form role="form" method="POST">
                                                            <input type="text" name="sid" value="<?= $row['travelingt_id']; ?>" hidden>
                                                            <button class="btn btn-danger btn-sm mt-3" type="submit" name="delproduct" value="<?php echo $row['travelingt_id']; ?>">&nbsp;<i class="fas fa-trash fa-fw"></i><b>Delete&nbsp;</b> </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                                $num++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php //เพิ่มเวลาเดินทาง
                    if (isset($_POST['submitaddtime'])) {
                        $addtimestart = $_POST["addtimestart"];
                        $addtimeend = $_POST["addtimeend"];
                        $getiddd = $_GET['id'];
                        $query = "INSERT INTO traveling_time (travelingt_start,travelingt_end,path_id)VALUES ('$addtimestart','$addtimeend','$getiddd')";
                        $result = mysqli_query($conn, $query) or die("เพิ่มข้อมูลไม่ได้");
                        mysqli_close($conn);
                        echo '<script language="JavaScript">
                                swal({
                                title: "Success!",
                                text: "เพิ่มเวลาเดินทางสำเร็จ",
                                button: "OK",
                                icon: "success",
                                });
                                    </script>';
                        echo '<meta http-equiv="refresh" content="1; url=edit_time.php?id=' . $getiddd . '" />';
                        mysqli_close($conn);
                        exit;
                    }
                    ?>
                    <?php //อัพเดทเวลาต้นทาง
                    if (isset($_POST['submitupdatestart'])) {
                        $datestart = $_POST["updatestart"];
                        $sid = $_POST["sid"];
                        $getiddd = $_GET['id'];
                        $updateunit = "UPDATE traveling_time SET travelingt_start = '$datestart' WHERE travelingt_id = '$sid'";
                        $$update_unit = mysqli_query($conn, $updateunit) or die("Update start Failed");

                        echo '<script language="JavaScript">
                                swal({
                                title: "Success Update",
                                text: "อัพเดทเวลาต้นทางสำเร็จ",
                                button: "OK",
                                icon: "success",
                                });
                                    </script>';

                        echo '<meta http-equiv="refresh" content="1; url=edit_time.php?id=' . $getiddd . '" />';
                        mysqli_close($conn);
                        exit;
                    }
                    ?>
                    <?php //อัพเดทเวลาปลายทาง
                    if (isset($_POST['submitupdateend'])) {
                        $updateend = $_POST["updateend"];
                        $sid = $_POST["sid"];
                        $getiddd = $_GET['id'];
                        $updateprice = "UPDATE traveling_time SET `travelingt_end` = '$updateend' WHERE `travelingt_id`= '$sid'";
                        $$update_price = mysqli_query($conn, $updateprice) or die("Update End Failed");

                        echo '<script language="JavaScript">
                                swal({
                                title: "Success Update!",
                                text: "อัพเดทเวลาปลายทางสำเร็จ",
                                button: "OK",
                                icon: "success",
                                });
                                    </script>';

                        echo '<meta http-equiv="refresh" content="1; url=edit_time.php?id=' . $getiddd . '" />';
                        mysqli_close($conn);
                        exit;
                    }
                    ?>
                    <?php //ลบเวลาเดินทาง
                    if (isset($_POST['delproduct'])) {
                        $sid = $_POST["sid"];
                        $getiddd = $_GET['id'];
                        $delproduct = "DELETE from traveling_time where travelingt_id='" . $_POST['delproduct'] . "'";
                        $del_product = mysqli_query($conn, $delproduct) or die("Delete  Failed");
                        mysqli_close($conn);
                        echo '<script language="JavaScript">
                                swal({
                                title: "Success!",
                                text: "ลบเวลาเดินทางสำเร็จ",
                                button: "OK",
                                icon: "success",
                                });
                                    </script>';
                        echo '<meta http-equiv="refresh" content="1; url=edit_time.php?id=' . $getiddd . '" />';
                        mysqli_close($conn);
                        exit;
                    }
                    ?>
    



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