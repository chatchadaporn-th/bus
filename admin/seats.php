<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';
include_once '../config/database.php';
include_once '../controller/path/search.php';
include_once '../controller/booking/bookings.php';

$conBooking = new conBooking();
$conPath = new conPathfrom();

// เก็บค่าเทียบที่นั่ง
@$s_pathid = $_POST['path_id'];
@$s_date = $_POST['select_date'];
@$s_time = $_POST['select_time'];

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
                <div class="container-fluid ">
                    <table class="border center  text-center" width="100%" style="font-family: 'Kanit', sans-serif;">

                        <tr style="height: 80px;">
                            <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ด้านหน้ารถ </td>
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
                                    while ($row = $result->fetch_assoc()) {
                                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                                        <img for="checkboxa1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                                    <?php  }
                                } else { ?>
                                    <div class="custom-control custom-checkbox">
                                        <img for="checkboxa1" src='img/select.png'><br>1 ว่าง
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
                                    while ($row = $result->fetch_assoc()) {
                                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                                        <img for="checkboxa2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                </div>
            <?php  }
                                } else { ?>
            <div class="custom-control custom-checkbox">
                <img for="checkbox2" src='img/select.png'><br>2 ว่าง
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
                while ($row = $result->fetch_assoc()) {
                    echo "รหัสตั๋ว $row[ticketid]"; ?>
                    <img for="checkboxa3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                <?php  }
            } else { ?>
                <div class="custom-control custom-checkbox">
                    <img for="checkboxa3" src='img/select.png'><br>3 ว่าง
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
                while ($row = $result->fetch_assoc()) {
                    echo "รหัสตั๋ว $row[ticketid]"; ?>
                    <img for="checkboxa4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                <?php  }
            } else { ?>
                <div class="custom-control custom-checkbox">
                    <img for="checkboxa4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxb1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxb1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxb2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'> 
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxb2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxb3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxb3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxb4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxb4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxc1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxc1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxc2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxc2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxc3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxc3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxc4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxc4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxd1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxd1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxd2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxd2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxd3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxd3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxd4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxd4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxe1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxe1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxe2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxe2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxe3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxe3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxe4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxe4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxf1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxf1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxf2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxf2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxf3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxf3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxf4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxf4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxg1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxg1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxg2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxg2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxg3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxg3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxg4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxg4" src='img/select.png'><br>4 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxh1" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxh1" src='img/select.png'><br>1 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxh2" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxh2" src='img/select.png'><br>2 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxh3" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxh3" src='img/select.png'><br>3 ว่าง
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
                    while ($row = $result->fetch_assoc()) {
                        echo "รหัสตั๋ว $row[ticketid]"; ?>
                        <img for="checkboxh4" src='<?php if($row['t_sex'] == 'ชาย') { echo "img/userm.png"; } else {echo "img/userf.png";}?>'>
                    <?php  }
                } else { ?>
                    <div class="custom-control custom-checkbox">
                        <img for="checkboxh4" src='img/select.png'><br>4 ว่าง
                    </div>
                <?php  } ?>
            </td>
        </tr>

        <tr style="height: 50px;">
            <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ท้ายรถ</td>
        </tr>
        </table>

        <fieldset class="submit mt-3 " style="font-family: 'Kanit', sans-serif;">
            <center>
                <a class="btn btn-danger btn-sm mb-2 " href="javascript:history.back();">ย้อนกลับ</a>
            </center>

        </fieldset>
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