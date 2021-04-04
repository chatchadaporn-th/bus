<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';

$sqlpayment = "SELECT * FROM tbl_payment  WHERE payment_id= '" . $_GET['id'] . "'"; //GET PRODUCT ID
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
            <li class="breadcrumb-item active">Payment</li>
          </ol>
          <!-- เนื้อหา-->
          <form method="post" action="" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table-borderless table " width="50%" cellspacing="0">
                <!-- Form Update -->
                <tbody>
                  <tr>
                    <td width="20%" align="right">
                      <!-- Text input--> <label><b>ชื่อ :</b></label>
                    </td>
                    <td width="80%"><span class="badge badge-success right"><b>
                          <font size="3px"><?php echo $datapayment['payment_uid']; ?></font>
                        </b></span></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">
                      <!-- Text input--> <label><b>รหัสตั๋ว. :</b></label>
                    </td>
                    <td width="80%"><span class="badge badge-primary right"><b>
                          <font size="3px"><?php echo $datapayment['payment_ticketid']; ?></font>
                        </b></span></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">
                      <!-- Text input--> <label><b>จำนวนเงิน :</b></label>
                    </td>
                    <td width="80%">
                      <font size="3px"><b><?php echo number_format($datapayment['amount'], 2); ?> บาท</font></b>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">
                      <!-- Text input--> <label><b>ธนาคาร :</b></label>
                    </td>
                    <td width="80%">
                      <font size="3px"><b><?php echo $datapayment['bank_transfer']; ?></font></b>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">
                      <!-- Text input--> <label><b>วัน/เวลา :</b></label>
                    </td>
                    <td width="80%">
                      <font size="3px"><b><i class="fas fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($datapayment["topup_date"])); ?> <i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($datapayment["time"])); ?></font></b>
                    </td>
                  </tr>

                  <tr>
                    <td width="20%" align="right">
                      <!-- File Button --> <label><b>หมายเหตุ :</b></label>
                    </td>
                    <td width="80%">
                      <font size="3px"><b><?php echo $datapayment['remark']; ?></font></b>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"><label><b>สลิปโอนเงิน :</b></label></td>
                    <td width="80%"><img src="../<?php echo $datapayment["file"]; ?>" style="width: 21rem;" /></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right"></td>
                    <td width="80%" align="left">
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="status_t" class="custom-control-input" value="3" required >
                        <label class="custom-control-label" for="customRadio1" style="font-weight: bold; color:#28a745;">ยืนยัน</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="status_t" class="custom-control-input" value="2" required>
                        <label class="custom-control-label" for="customRadio2" style="color:#FF0000 ; font-weight: bold;">ล้มเหลว</label>
                      </div>
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
        $payment_ticketid = $datapayment['payment_ticketid'];
        $ordersstatus = 3;
        $status_t = $_POST['status_t'];
        $numc = 3;

        if ($status_t == @$numc) {
          //Update status 3
          $updatestatus = "UPDATE tbl_payment SET topup_status = '$status_t' WHERE payment_id = '$_GET[id]'";
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
          echo '<meta http-equiv="refresh" content="1; url=payment.php" />';
          exit;
        } else

          //Update status
          $updatestatus = "UPDATE tbl_payment SET topup_status = '$status_t' WHERE payment_id = '$_GET[id]'";
        $queryupdatestatus = mysqli_query($conn, $updatestatus) or die("Update Status Failed");
        mysqli_close($conn);
        echo '<script language="JavaScript">
        swal({
          title: "Success",
          text: "ยืนยันการชำระเงินเสร็จสิ้น ",
          button: "OK",
          icon: "success",
          });
              </script>';
        echo '<meta http-equiv="refresh" content="1; url=payment.php" />';
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