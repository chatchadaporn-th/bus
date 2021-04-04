<?php
include_once './config/connectdb.php';
// echo "<pre>";
// print_r($_GET);
// print_r($_POST);
// echo "</pre>";
$strSQLuser = "SELECT * FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) INNER JOIN traveling_time AS t5 ON (t2.seat_time = t5.travelingt_id) WHERE t1.ticketid = '" . $_GET['id'] . "'";
$objQueryuser = mysqli_query($conn, $strSQLuser);
$objResultuser = mysqli_fetch_array($objQueryuser, MYSQLI_ASSOC);

$paymentData = "SELECT * ,count(*) over () as total FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) WHERE t1.ticketid = '" . $_GET['id'] . "'";
$sqlpaymentData = mysqli_query($conn, $paymentData);
$paymentData = mysqli_fetch_array($sqlpaymentData);
$qty = $paymentData['total'] * $paymentData['pricepassenger'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>บริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Font ไทย ใช้ตรงส่วนเมนูบาร์ด้านบน font-family: 'Mitr', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@600&display=swap" rel="stylesheet">

    <!-- Font ไทย เนื้อหา font-family: 'Kanit', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

    <!-- table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
    <!-- sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- กดยอมรับเงื่อนไข -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#i_accept").click(function() { // เมื่อคลิกที่ checkbox id=i_accept
                if ($(this).prop("checked") == true) { // ถ้าเลือก
                    $("#continue_bt").removeAttr("disabled"); // ให้ปุ่ม id=continue_bt ทำงาน สามารถคลิกได้
                } else { // ยกเลิกไม่ทำการเลือก
                    $("#continue_bt").attr("disabled", "disabled"); // ให้ปุ่ม id=continue_bt ไม่ทำงาน
                }
            });
        });
    </script>
</head>

<body>
    <!-- Navigation -->
    <?php
    require_once("navigation.php");
    ?>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-7 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Kanit', sans-serif;color:coral;">ยกเลิกตั๋วโดยสาร</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                            <div class="table-responsive">
                                <form class="form" method="post" enctype="multipart/form-data">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td style="border-top: none;" width="35%" align="right">
                                                <!-- Text input--><label>
                                                    <b>รหัสตั๋ว :</b>
                                                </label>
                                            </td>
                                            <td style="border-top: none;" width="65%"><input class="form-control" name="i_ticketid" type="text" required value="<?php echo $objResultuser['ticketid']; ?>"></td>
                                        </tr>

                                        <?php
                                        if ($objResultuser['status'] == 2) { ?>
                                            <tr>
                                                <td style="border-top: none;" width="35%" align="right">
                                                    <!-- Text input--><label>
                                                        <b>เลขที่บัญชี :</b>
                                                    </label>
                                                </td>
                                                <td style="border-top: none;" width="65%"><input class="form-control" id="amount" name="bank" type="text" required></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top: none;" width="35%" align="right">
                                                    <!-- Text input--><label>
                                                        <b>ธนาคาร :</b>
                                                    </label>
                                                </td>
                                                <td style="border-top: none;" width="65%">
                                                    <div class="form-group">
                                                        <select class="form-control" name="acc" id="exampleFormControlSelect1" required>
                                                            <option value="ธนาคารกรุงไทย">กรุงไทย</option>
                                                            <option value="ธนาคารกรุงเทพ">กรุงเทพ</option>
                                                            <option value="ธนาคารไทยพาณิชย์">ไทยพาณิชย์</option>
                                                            <option value="ธนาคารกรุงศรีอยุธยา">กรุงศรีอยุธยา</option>
                                                            <option value="ธนาคารกสิกรไทย">กสิกรไทย</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php    }  ?>
                                        <?php
                                        if ($objResultuser['status'] == 3) { ?>
                                            <tr>
                                                <td style="border-top: none;" width="35%" align="right">
                                                    <!-- Text input--><label>
                                                        <b>เลขที่บัญชี :</b>
                                                    </label>
                                                </td>
                                                <td style="border-top: none;" width="65%"><input class="form-control" id="amount" name="bank" type="text" required></td>
                                            </tr>
                                            <tr>
                                                <td style="border-top: none;" width="35%" align="right">
                                                    <!-- Text input--><label>
                                                        <b>ธนาคาร :</b>
                                                    </label>
                                                </td>
                                                <td style="border-top: none;" width="65%">
                                                    <div class="form-group">
                                                        <select class="form-control" name="acc" id="exampleFormControlSelect1" required>
                                                            <option value="ธนาคารกรุงไทย">กรุงไทย</option>
                                                            <option value="ธนาคารกรุงเทพ">กรุงเทพ</option>
                                                            <option value="ธนาคารไทยพาณิชย์">ไทยพาณิชย์</option>
                                                            <option value="ธนาคารกรุงศรีอยุธยา">กรุงศรีอยุธยา</option>
                                                            <option value="ธนาคารกสิกรไทย">กสิกรไทย</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php    }  ?>
                                        <tr>
                                            <td colspan="2" style="border-top: none;" >
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="i_accept" >
                                                    <label class="form-check-label" for="i_accept" >
                                                        ยกเลิกการจองที่นั่ง
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td align="left"> <button class="btn btn-primary btn-sm ml-1" type="submit" name="submit" name="continue_bt" id="continue_bt" disabled>ยืนยัน</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-5 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Kanit', sans-serif;color:coral;">ข้อมูลตั๋วโดยสาร</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>รหัสตั๋วโดยสาร</p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['ticketid']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>ประเภทรถ</p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['bus_type']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>ทะเบียนรถ</p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['bus_no']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>วันที่เดินทาง</p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['seat_date']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>เดินทางจาก</p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['origin']; ?> ไป <?= $objResultuser['destination']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>เวลาเดินทาง</p>
                                        </th>
                                        <td>
                                            <p><?= date('H:i', strtotime($objResultuser["travelingt_start"])); ?> น. ถึง <?= date('H:i', strtotime($objResultuser["travelingt_end"])); ?> น.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>ที่นั่ง</p>
                                        </th>
                                        <td>
                                            <?php
                                            $num = 1;
                                            $paymentData = "SELECT * ,count(*) over () as total FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) WHERE t1.ticketid = '" . $_GET['id'] . "'";
                                            $sqlpaymentData = mysqli_query($conn, $paymentData);
                                            while ($paymentData = mysqli_fetch_array($sqlpaymentData)) {
                                                $qty = $paymentData['total'] * $paymentData['pricepassenger'];
                                            ?>
                                                <?= $paymentData['seat_no']; ?>
                                            <?php
                                                $num++;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>ราคาทั้งหมด</p>
                                        </th>
                                        <td>
                                            <p><?php echo number_format($qty, 2); ?> ฿</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>คุณ </p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['reserve_by']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="40%" style="text-align:right">
                                            <p>เบอร์โทรศัพท์ </p>
                                        </th>
                                        <td>
                                            <p><?= $objResultuser['ticket_tel']; ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="mt-2 text-center small">
                                <div class="w-100">บริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร</div>
                                <span class="mr-2"><i class="fas fa-grin-beam text-primary"></i> ขอขอบคุณที่ใช้บริการครับ</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    if (isset($_POST['submit'])) {
       
        $ticketid = $_POST['i_ticketid'];
        $bank =$_POST['bank'];
        $acc = $_POST['acc'];
        $statusticket = 1;
        $date = date('Y-m-d H:i:s'); //Format Date 1999-01-22 Time 17:16:18
        $status = 4;
    

            $sqlcancel = "INSERT INTO `tbl_cancel` (`c_ticketid`, `c_bank`,`c_acc`, `c_date`, `c_status`) VALUES 
            ('$ticketid ','$bank','$acc','$date','$statusticket')";
            mysqli_query($conn, $sqlcancel);

            $updateticket_run = "UPDATE ticket_run SET status = '$status' WHERE ticketid = '$ticketid'";
            $$updateticket_run = mysqli_query($conn, $updateticket_run) or die("Update  Failed");
            echo '<script language="JavaScript">
            alert("ยกเลิกการจองที่นั่งสำเร็จ");
                   </script>';
                   echo '<meta http-equiv="refresh" content="1; url=index.php" />';
		
    }
    
    ?>

    <!-- Footer -->
    <?php
    require_once("footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example1').dataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :"
                }
            });
        });
    </script>
</body>

</html>