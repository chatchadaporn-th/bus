<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once './config/connectdb.php';
include_once './config/database.php';
include_once './controller/booking/bookings.php';
include_once './controller/path/search.php';

$conBooking = new conBooking();
$conPath = new conPathfrom();

// เก็บค่าเทียบที่นั่ง
@$s_pathid = $_POST['path_id'];
@$s_date = $_POST['select_date'];
@$s_time = $_POST['select_time'];

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
    <!-- date datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- กดยอมรับเงื่อนไข -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

</head>

<body>
    <!-- Navigation -->
    <?php
    require_once("navigation.php");
    ?>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Kanit', sans-serif;">
                    <li class="breadcrumb-item"><a href="index.php" style="color:#009688 ;">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="selectcar.php" style="color:#009688 ;">เลือกเส้นทางเดินรถ</a></li>
                    <li class="breadcrumb-item"><a href="javascript:history.back();" style="color:#009688 ;">เลือกเวลาและวันที่</a></li>
                    <li class="breadcrumb-item active" aria-current="page">เลือกที่นั่ง</li>
                </ol>
            </nav>
            <form method="post" action="confirm.php" ?>
                <input name="s_name" type="text" value="<?= $_POST['select_name']; ?>" hidden="">
                <input name="s_tel" type="text" value="<?= $_POST['select_tel']; ?>" hidden="">
                <input name="s_sex" type="text" value="<?= $_POST['select_sex']; ?>" hidden="">
                <input name="s_time" type="text" value="<?= $_POST['select_time']; ?>" hidden="">
                <input name="s_date" type="text" value="<?= $_POST['select_date']; ?>" hidden="">
                <input name="s_origin" type="text" value="<?= $_POST['origin']; ?>" hidden="">
                <input name="s_destination" type="text" value="<?= $_POST['destination']; ?>" hidden="">
                <input name="s_pricepassenger" type="text" value="<?= $_POST['pricepassenger']; ?>" hidden="">
                <input name="s_pathid" type="text" value="<?= $_POST['path_id']; ?>" hidden="">
                <table class="border center " width="100%" style="font-family: 'Kanit', sans-serif;">

                    <tr style="height: 80px;">
                        <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ด้านหน้ารถ <br> เลือกที่นั่งสูงสุดได้ครั้งละ 4 ที่นั่ง </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว A</td>
                        <!-- A1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'a1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="seatNO[]" value="a1" disabled>
                                        <label class="custom-control-label" for="customChecka1"> <img for="checkboxa1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecka1" name="seatNO[]" value="a1">
                                    <label class="custom-control-label" for="customChecka1"> <img for="checkboxa1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  }
                            ?>
                        </td>
                        <!-- A2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'a2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecka2" name="seatNO[]" value="a2" disabled>
                                        <label class="custom-control-label" for="customChecka2"> <img for="checkboxa2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="seatNO[]" value="a2">
                                    <label class="custom-control-label" for="customCheck2"> <img for="checkbox2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- A3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'a3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecka3" name="seatNO[]" value="a3" disabled>
                                        <label class="custom-control-label" for="customChecka3"> <img for="checkboxa3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecka3" name="seatNO[]" value="a3">
                                    <label class="custom-control-label" for="customChecka3"> <img for="checkboxa3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- A4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'a4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecka4" name="seatNO[]" value="a4" disabled>
                                        <label class="custom-control-label" for="customChecka4"> <img for="checkboxa4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecka4" name="seatNO[]" value="a4">
                                    <label class="custom-control-label" for="customChecka4"> <img for="checkboxa4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว B</td>
                        <!-- B1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'b1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckb1" name="seatNO[]" value="b1" disabled>
                                        <label class="custom-control-label" for="customCheckb1"> <img for="checkboxb1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckb1" name="seatNO[]" value="b1">
                                    <label class="custom-control-label" for="customCheckb1"> <img for="checkboxb1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- B2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'b2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckb2" name="seatNO[]" value="b2" disabled>
                                        <label class="custom-control-label" for="customCheckb2"> <img for="checkboxb2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckb2" name="seatNO[]" value="b2">
                                    <label class="custom-control-label" for="customCheckb2"> <img for="checkboxb2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- B3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'b3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckb3" name="seatNO[]" value="b3" disabled>
                                        <label class="custom-control-label" for="customCheckb3"> <img for="checkboxb3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckb3" name="seatNO[]" value="b3">
                                    <label class="custom-control-label" for="customCheckb3"> <img for="checkboxb3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- B4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'b4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckb4" name="seatNO[]" value="b4" disabled>
                                        <label class="custom-control-label" for="customCheckb4"> <img for="checkboxb4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckb4" name="seatNO[]" value="b4">
                                    <label class="custom-control-label" for="customCheckb4"> <img for="checkboxb4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว C</td>
                        <!-- C1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'c1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckc1" name="seatNO[]" value="c1" disabled>
                                        <label class="custom-control-label" for="customCheckc1"> <img for="checkboxc1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckc1" name="seatNO[]" value="c1">
                                    <label class="custom-control-label" for="customCheckc1"> <img for="checkboxc1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- C2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'c2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckc2" name="seatNO[]" value="c2" disabled>
                                        <label class="custom-control-label" for="customCheckc2"> <img for="checkboxc2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckc2" name="seatNO[]" value="c2">
                                    <label class="custom-control-label" for="customCheckc2"> <img for="checkboxc2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- C3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'c3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckc3" name="seatNO[]" value="c3" disabled>
                                        <label class="custom-control-label" for="customCheckc3"> <img for="checkboxc3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckc3" name="seatNO[]" value="c3">
                                    <label class="custom-control-label" for="customCheckc3"> <img for="checkboxc3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- C4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'c4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckc4" name="seatNO[]" value="c4" disabled>
                                        <label class="custom-control-label" for="customCheckc4"> <img for="checkboxc4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckc4" name="seatNO[]" value="c4">
                                    <label class="custom-control-label" for="customCheckc4"> <img for="checkboxc4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว D</td>
                        <!-- D1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'd1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckd1" name="seatNO[]" value="d1" disabled>
                                        <label class="custom-control-label" for="customCheckd1"> <img for="checkboxd1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckd1" name="seatNO[]" value="d1">
                                    <label class="custom-control-label" for="customCheckd1"> <img for="checkboxd1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- D2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'd2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckd2" name="seatNO[]" value="d2" disabled>
                                        <label class="custom-control-label" for="customCheckd2"> <img for="checkboxd2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckd2" name="seatNO[]" value="d2">
                                    <label class="custom-control-label" for="customCheckd2"> <img for="checkboxd2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- D3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'd3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckd3" name="seatNO[]" value="d3" disabled>
                                        <label class="custom-control-label" for="customCheckd3"> <img for="checkboxd3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckd3" name="seatNO[]" value="d3">
                                    <label class="custom-control-label" for="customCheckd3"> <img for="checkboxd3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- D4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'd4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckd4" name="seatNO[]" value="d4" disabled>
                                        <label class="custom-control-label" for="customCheckd4"> <img for="checkboxd4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckd4" name="seatNO[]" value="d4">
                                    <label class="custom-control-label" for="customCheckd4"> <img for="checkboxd4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว E</td>
                        <!-- E1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'e1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecke1" name="seatNO[]" value="e1" disabled>
                                        <label class="custom-control-label" for="customChecke1"> <img for="checkboxe1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecke1" name="seatNO[]" value="e1">
                                    <label class="custom-control-label" for="customChecke1"> <img for="checkboxe1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- E2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'e2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecke2" name="seatNO[]" value="e2" disabled>
                                        <label class="custom-control-label" for="customChecke2"> <img for="checkboxe2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecke2" name="seatNO[]" value="e2">
                                    <label class="custom-control-label" for="customChecke2"> <img for="checkboxe2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- E3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'e3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecke3" name="seatNO[]" value="e3" disabled>
                                        <label class="custom-control-label" for="customChecke3"> <img for="checkboxe3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecke3" name="seatNO[]" value="e3">
                                    <label class="custom-control-label" for="customChecke3"> <img for="checkboxe3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- E4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'e4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChecke4" name="seatNO[]" value="e4" disabled>
                                        <label class="custom-control-label" for="customChecke4"> <img for="checkboxe4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChecke4" name="seatNO[]" value="e4">
                                    <label class="custom-control-label" for="customChecke4"> <img for="checkboxe4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว F</td>
                        <!-- F1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'f1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckf1" name="seatNO[]" value="f1" disabled>
                                        <label class="custom-control-label" for="customCheckf1"> <img for="checkboxf1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckf1" name="seatNO[]" value="f1">
                                    <label class="custom-control-label" for="customCheckf1"> <img for="checkboxf1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- F2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'f2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckf2" name="seatNO[]" value="f2" disabled>
                                        <label class="custom-control-label" for="customCheckf2"> <img for="checkboxf2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckf2" name="seatNO[]" value="f2">
                                    <label class="custom-control-label" for="customCheckf2"> <img for="checkboxf2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- F3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'f3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckf3" name="seatNO[]" value="f3" disabled>
                                        <label class="custom-control-label" for="customCheckf3"> <img for="checkboxf3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckf3" name="seatNO[]" value="f3">
                                    <label class="custom-control-label" for="customCheckf3"> <img for="checkboxf3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- F4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'f4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckf4" name="seatNO[]" value="f4" disabled>
                                        <label class="custom-control-label" for="customCheckf4"> <img for="checkboxf4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckf4" name="seatNO[]" value="f4">
                                    <label class="custom-control-label" for="customCheckf4"> <img for="checkboxf4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว G</td>
                        <!-- G1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'g1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckg1" name="seatNO[]" value="g1" disabled>
                                        <label class="custom-control-label" for="customCheckg1"> <img for="checkboxg1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckg1" name="seatNO[]" value="g1">
                                    <label class="custom-control-label" for="customCheckg1"> <img for="checkboxg1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- G2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'g2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckg2" name="seatNO[]" value="g2" disabled>
                                        <label class="custom-control-label" for="customCheckg2"> <img for="checkboxg2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckg2" name="seatNO[]" value="g2">
                                    <label class="custom-control-label" for="customCheckg2"> <img for="checkboxg2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- G3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'g3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckg3" name="seatNO[]" value="g3" disabled>
                                        <label class="custom-control-label" for="customCheckg3"> <img for="checkboxg3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckg3" name="seatNO[]" value="g3">
                                    <label class="custom-control-label" for="customCheckg3"> <img for="checkboxg3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- G4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'g4' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckg4" name="seatNO[]" value="g4" disabled>
                                        <label class="custom-control-label" for="customCheckg4"> <img for="checkboxg4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckg4" name="seatNO[]" value="g4">
                                    <label class="custom-control-label" for="customCheckg4"> <img for="checkboxg4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว H</td>
                        <!-- H1 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'h1' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckh1" name="seatNO[]" value="h1" disabled>
                                        <label class="custom-control-label" for="customCheckh1"> <img for="checkboxh1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckh1" name="seatNO[]" value="h1">
                                    <label class="custom-control-label" for="customCheckh1"> <img for="checkboxh1" src='img/select.png'><br>1</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- H2 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'h2' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckh2" name="seatNO[]" value="h2" disabled>
                                        <label class="custom-control-label" for="customCheckh2"> <img for="checkboxh2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckh2" name="seatNO[]" value="h2">
                                    <label class="custom-control-label" for="customCheckh2"> <img for="checkboxh2" src='img/select.png'><br>2</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <td width="25%" style="background-color: #e91e6330;"></td>
                        <!-- H3 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'h3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckh3" name="seatNO[]" value="h3" disabled>
                                        <label class="custom-control-label" for="customCheckh3"> <img for="checkboxh3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckh3" name="seatNO[]" value="h3">
                                    <label class="custom-control-label" for="customCheckh3"> <img for="checkboxh3" src='img/select.png'><br>3</label>
                                </div>
                            <?php  } ?>
                        </td>
                        <!-- H4 -->
                        <td class="center table-bordered">
                            <?php
                            $sql = "SELECT * FROM `seat`AS t1 INNER JOIN ticket_run AS t2 ON (t1.seat_ticket_run =t2.ticketid) WHERE (t2.status = '1' OR t2.status = '2' OR t2.status = '3') AND t1.seat_no= 'h3' AND t1.seat_pathid = '$s_pathid' AND t1.seat_date = '$s_date' AND t1.seat_time = '$s_time'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data Checkbox disabled
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckh4" name="seatNO[]" value="h4" disabled>
                                        <label class="custom-control-label" for="customCheckh4"> <img for="checkboxh4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'><br>จองแล้ว</label>
                                    </div>
                                <?php  }
                            } else { ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckh4" name="seatNO[]" value="h4">
                                    <label class="custom-control-label" for="customCheckh4"> <img for="checkboxh4" src='img/select.png'><br>4</label>
                                </div>
                            <?php  } ?>
                        </td>
                    </tr>

                    <tr style="height: 50px;">
                        <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ท้ายรถ</td>
                    </tr>
                </table>

                <fieldset class="center submit mt-3" style="font-family: 'Kanit', sans-serif;">
                    <a class="btn btn-danger btn-sm mr-1" href="javascript:history.back();">ย้อนกลับ</a>
                    <button class="btn btn-success btn-sm ml-1" type="submit" name="submit1" name="continue_bt">ยืนยัน</button>
                </fieldset>
        </div>
        </form>
    </section>


    <!-- Footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- Datepicker -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Language script -->
    <script src='js/datepicker-th.js' type='text/javascript'></script>

    <!-- Bootstrap core JavaScript -->
    <!-- < src="vendor/jquery/jquery.min.js"></> jquery ชนกับ date-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script -->
    <script>
        $(function() {
            // Change language Thai
            $.datepicker.setDefaults($.datepicker.regional["th"]);
            // กำหนดไม่ให้เลือกวันที่ย้อนหลังได้
            $("#datepicker").datepicker({
                minDate: 0,
                maxDate: "+30D",
                dateFormat: 'dd/mm/yy',
                showOn: "button",
                buttonImage: "img/calendar.png",
                buttonImageOnly: true,
                buttonText: "Select date",


            });
        });
    </script>
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