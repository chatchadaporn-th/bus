<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';
include_once '../config/database.php';
include_once '../controller/path/search.php';
include_once '../controller/booking/bookings.php';
$conPath = new conPathfrom();

// รับค่าจากเลือกทางเดินรถมาเก็บไว้
@$selectcar_ = $_GET['id'];
@$pricepassenger_ = $_GET['price'];

$search_start = $_GET['to'];
$search_end = $_GET['form'];
$allData = $conPath->conSearchLog($search_start, $search_end);

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
        <!-- date datepicker-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<style>
        .ui-widget-header {
            border: 1px solid #dddddd;
            background: #F44336;
            color: #ffffff;
            font-weight: bold;
        }
    </style>
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
                <form method="post" action="seats.php">
                <div class="card" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                    <h5 class="card-header" style="font-family: 'Kanit', sans-serif;color:coral;">เลือกเวลาและวันที่</h5>
                    <div class="card-body">
                        <h6 class="card-title" style="font-family: 'Kanit', sans-serif;">เส้นทางเดินรถ จาก <span style="color:#ff5733; font-family: 'Kanit', sans-serif;"><?= $search_start; ?></span> ไป <span style="color:#2196f3; font-family: 'Kanit', sans-serif;"><?= $search_end; ?></span> </h6>
                        <h6 class="card-title" style="font-family: 'Kanit', sans-serif;">ราคา <span style="color:#52d457;"><?= number_format($pricepassenger_, 2); ?></span> บาท</h6>
                        <div class="row">
                            <?php
                            while ($fetchResult = $allData->fetch(PDO::FETCH_BOTH)) {
                            ?>
                                <div class="col-md-3">
                                    <div class="card mb-3 shadow-sm">
                                        <!-- <img class="bd-placeholder-img card-img-top" style=" max-width: 100%; height: auto;" src="img/bus.jpg" alt="Card image cap"> -->
                                        <div class="card-body">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio<?= $fetchResult['travelingt_id']; ?>" name="select_time" class="custom-control-input " value="<?= $fetchResult['travelingt_id']; ?>" required>
                                                <label class="custom-control-label " for="customRadio<?= $fetchResult['travelingt_id']; ?>" >เวลาออก <span class="badge badge-danger" style="font-size:15px;"><?= date('H:i', strtotime($fetchResult['travelingt_start'])); ?> น.</span><br>เวลาถึง <span class="badge badge-success ml-2" style="font-size:15px;"> <?= date('H:i', strtotime($fetchResult['travelingt_end'])); ?> น.</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <p class="mr-3 mt-2">ระบุวันที่: <input name="select_date" type="text" id="datepicker" class="mr-1"  required></p>
                      
                        <input name="origin" type="text" value="<?= $search_start; ?>" hidden="">
                        <input name="destination" type="text" value="<?= $search_end; ?>" hidden="">
                        <input name="pricepassenger" type="text" value="<?= $pricepassenger_; ?>" hidden="">
                        <input name="path_id" type="text" value="<?= $selectcar_; ?>" hidden="">

                        <fieldset class="center submit">
                            <button class="btn btn-danger btn-sm mr-1" type="button" onclick="location.href='s_cars.php'">ย้อนกลับ</button>
                            <button class="btn btn-success btn-sm ml-1" type="submit">ยืนยัน</button>
                        </fieldset>
                    </div>
                </div>
                </form>
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



    <!-- Bootstrap core JavaScript -->

    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script -->
    <!-- Script -->
    <script>
        $(function() {
            // Change language Thai
            $.datepicker.setDefaults($.datepicker.regional["th"]);
            // กำหนดไม่ให้เลือกวันที่ย้อนหลังได้
            $("#datepicker").datepicker({
                maxDate: "+60D",
                dateFormat: 'dd/mm/yy',
                showOn: "button",
                buttonImage: "../img/calendar.png",
                buttonImageOnly: true,
                buttonText: "Select date",


            });
        });
    </script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>