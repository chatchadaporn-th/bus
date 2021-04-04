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

$sqlcancel = "SELECT * FROM tbl_cancel  WHERE c_id= '" . $_GET['id'] . "'"; //GET PRODUCT ID
$resultcancel = mysqli_query($conn, $sqlcancel);
$datacancel = mysqli_fetch_array($resultcancel);

$strSQLuser = "SELECT * FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) INNER JOIN traveling_time AS t5 ON (t2.seat_time = t5.travelingt_id) WHERE t1.ticketid = '" . $datacancel['c_ticketid'] . "'";
$objQueryuser = mysqli_query($conn, $strSQLuser);
$objResultuser = mysqli_fetch_array($objQueryuser, MYSQLI_ASSOC);

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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Cancel</li>
                    </ol>
                    <!-- เนื้อหา-->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table-borderless table " width="50%" cellspacing="0">
                                <!-- Form Update -->
                                <tbody>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>รหัสยกเลิกการจอง :</b></label>
                                        </td>
                                        <td width="80%"><span class="badge badge-success right"><b>
                                                    <font size="3px"><?php echo $datacancel['c_id']; ?></font>
                                                </b></span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>รหัสตั๋ว. :</b></label>
                                        </td>
                                        <td width="80%"><span class="badge badge-primary right"><b>
                                                    <font size="3px"><?php echo $datacancel['c_ticketid']; ?></font>
                                                </b></span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>ที่นั่ง :</b></label>
                                        </td>
                                        <td width="80%"><b>
                                                <font size="3px"> <?php
                                                                    $num = 1;
                                                                    $paymentData = "SELECT * ,count(*) over () as total FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) WHERE t1.ticketid = '" . $datacancel['c_ticketid'] . "'";
                                                                    $sqlpaymentData = mysqli_query($conn, $paymentData);
                                                                    while ($paymentData = mysqli_fetch_array($sqlpaymentData)) {
                                                                        $qty = $paymentData['total'] * $paymentData['pricepassenger'];
                                                                    ?>
                                                        <?= $paymentData['seat_no']; ?>
                                                    <?php
                                                                        $num++;
                                                                    }
                                                    ?></font>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>จำนวนเงิน :</b></label>
                                        </td>

                                        <td width="80%">
                                            <font size="3px"><b><?php echo number_format($qty, 2); ?> บาท</font></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>ธนาคาร :</b></label>
                                        </td>
                                        <td width="80%">
                                            <font size="3px"><b><?php if (!empty($datacancel['c_bank'])) {
                                                                    echo $datacancel['c_bank'];
                                                                } else { ?>
                                                        <span style="color:#FF0000 ;">
                                                                ลูกค้าไม่ได้ชำระเงิน
                                                        </span>

                                                    <?php  } ?></font></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>เลขบัญชี :</b></label>
                                        </td>
                                        <td width="80%">
                                            <font size="3px"><b><?php if (!empty($datacancel['c_acc'])) {
                                                                    echo $datacancel['c_acc'];
                                                                } else { ?>
                                                        <span style="color:#FF0000 ;">
                                                                ลูกค้าไม่ได้ชำระเงิน
                                                        </span>

                                                    <?php  } ?></font></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right">
                                            <!-- Text input--> <label><b>วัน/เวลา :</b></label>
                                        </td>
                                        <td width="80%">
                                            <font size="3px"><b><i class="fas fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($datacancel["c_date"])); ?> <i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($datacancel["time"])); ?></font></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="right"></td>
                                        <td width="80%" align="left">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="status_t" class="custom-control-input" value="2" required>
                                                <label class="custom-control-label" for="customRadio1" style="font-weight: bold; color:#28a745;">ยืนยัน</label>
                                            </div>
                                            <!-- <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="status_t" class="custom-control-input" value="2" required>
                                                <label class="custom-control-label" for="customRadio2" style="color:#FF0000 ; font-weight: bold;">ล้มเหลว</label>
                                            </div> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="left"><button id="submit" name="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i><b>บันทึก &nbsp;</b></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php //UpDate User 
            if (isset($_POST['submit'])) {
                $payment_ticketid = $datacancel['c_ticketid'];
                $ordersstatus = 5;
                $status_t = $_POST['status_t'];

                    $updatestatus = "UPDATE tbl_cancel SET c_status = '$status_t' WHERE c_id = '$_GET[id]'";
                    $queryupdatestatus = mysqli_query($conn, $updatestatus) or die("Update Status Failed");


                    $updateorder = "UPDATE ticket_run SET status = '$ordersstatus' WHERE ticketid = '$payment_ticketid'";
                    $$updateorder = mysqli_query($conn, $updateorder) or die("Update Order Failed");
                    mysqli_close($conn);
                    echo '<script language="JavaScript">
                    swal({
                    title: "Success",
                    text: "ยืนยันการชำระเงินเสร็จสิ้น",
                    button: "OK",
                    icon: "success",
                    });
                        </script>';
                    echo '<meta http-equiv="refresh" content="1; url=cancel.php" />';
                    exit;
               
            }

            ?>
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