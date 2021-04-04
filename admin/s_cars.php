<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';
include_once '../config/database.php';
include_once '../controller/path/search.php';
include_once '../controller/booking/bookings.php';

$conBooking = new conBooking();
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
                    <?php if (empty($selectcar_)) { ?>
                        <div class="card" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                            <h5 class="card-header" style="font-family: 'Kanit', sans-serif;color:coral;">เลือกเส้นทางเดินรถ</h5>
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    $allData = $conBooking->allPaths();
                                    while ($row = $allData->fetch()) {
                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mb-3 shadow-sm">
                                                <img class="bd-placeholder-img card-img-top" style=" max-width: 100%; height: auto;" src="../img/bus.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 style="font-weight: bold; color:#000;"></h5>
                                                    <p style="color:#000;" class="card-text h6">จาก <span style="color:#ff5733; font-family: 'Kanit', sans-serif;"><?= $row['origin']; ?></span> ไป <span style="color:#2196f3; font-family: 'Kanit', sans-serif;"><?= $row['destination']; ?></span></p>
                                                    <p style="color:#000;" class="card-text h6">ราคา <?= number_format($row['pricepassenger'], 2); ?> บาท</p>
                                                    <input type="text" name="origin" value="<?= $row['origin']; ?>" hidden="">
                                                    <input type="text" name="destination" value="<?= $row['destination']; ?>" hidden="">
                                                    <input type="text" name="pricepassenger" value="<?= $row['pricepassenger']; ?>" hidden="">
                                                    <div class="mx-auto" >
                                                        <a class="btn btn-success btn-sm" href="s_days.php?to=<?= $row['origin']; ?>&form=<?= $row['destination']; ?>&price=<?= $row['pricepassenger']; ?>&id=<?= $row['path_id']; ?>">เลือก</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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

</body>

</html>