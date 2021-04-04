<!DOCTYPE html>
<?php
include_once './config/connectdb.php';
include_once './config/check.php';


$strSQLuser = "SELECT * FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) INNER JOIN traveling_time AS t5 ON (t2.seat_time = t5.travelingt_id) WHERE t1.ticketid = '" . $_GET['ticket_id'] . "'";
$objQueryuser = mysqli_query($conn, $strSQLuser);
$objResultuser = mysqli_fetch_array($objQueryuser, MYSQLI_ASSOC);

$paymentData = "SELECT * ,count(*) over () as total FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) WHERE t1.ticketid = '" . $_GET['ticket_id'] . "'";
$sqlpaymentData = mysqli_query($conn, $paymentData);
$paymentData = mysqli_fetch_array($sqlpaymentData);
$qty = $paymentData['total'] * $paymentData['pricepassenger'];

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $data4['nw_name']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Font ไทย เนื้อหา font-family: 'Kanit', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
        <div class="card" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                    <h5 class="card-header" style="font-family: 'Kanit', sans-serif;">พิมพ์ตั๋วรถโดยสาร </h5>
                    <div class="card-body">
                    <h6 class="card-title" style="font-family: 'Kanit', sans-serif;"> <span style="font-family: 'Kanit', sans-serif;">หมายเหตุ : หลังการซื้อตั๋วโดยสารเสร็จสิ้นแล้ว กรุณาพิมพ์หลักฐานการชำระเงินเพื่อนำมารับตั๋วโดยสารที่หน้า เคาน์เตอร์จำหน่ายตั๋วบริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร ก่อนเวลารถออก 30 นาที หากท่านต้องการรับตั๋วก่อนวันเดินทาง สามารถแลกตั๋วได้ทุกวันที่ช่องจำหน่ายตั๋ว</span> </h6>

                    <div class="row mt-5">
                <!-- Area Chart -->
                <div class="col-xl-7 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Kanit', sans-serif;color:coral;">ข้อมูลตั๋วโดยสาร NO. <?= $objResultuser['ticketid']; ?></h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                            <div class="table-responsive">
                                <form class="form" method="post" enctype="multipart/form-data">
                                    <table class="table table-borderless">
                                    <tr>
                                            <th scope="row" width="40%" style="text-align:right">
                                                <p>วันที่เดินทาง</p>
                                            </th>
                                            <td>
                                                <p class="h5"><?= $objResultuser['seat_date']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="40%" style="text-align:right">
                                                <p>เวลาเดินทาง</p>
                                            </th>
                                            <td>
                                                <p class="h5"><?= date('H:i', strtotime($objResultuser["travelingt_start"])); ?> น. ถึง <?= date('H:i', strtotime($objResultuser["travelingt_end"])); ?> น.</p>
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
                                                <p>เส้นทาง</p>
                                            </th>
                                            <td>
                                                <p><?= $objResultuser['origin']; ?> - <?= $objResultuser['destination']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="40%" style="text-align:right">
                                                <p>ที่นั่ง</p>
                                            </th>
                                            <td>
                                                <?php
                                                $num = 1;
                                                $paymentData = "SELECT * ,count(*) over () as total FROM ticket_run  AS t1 INNER JOIN seat AS t2 ON (t1.ticketid= t2.seat_ticket_run) INNER JOIN paths AS t3 ON (t2.seat_pathid = t3.path_id) INNER JOIN bus_table AS t4 ON (t3.bus_id = t4.bus_id) WHERE t1.ticketid = '" . $_GET['ticket_id'] . "'";
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
                                <span class="mr-2"><i class="fas fa-grin-beam text-primary"></i> ขอขอบคุณที่ใช้บริการครับ </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </form>
            </div>

        
        </div>

    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>