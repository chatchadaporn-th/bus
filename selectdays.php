<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once './config/database.php';
include_once './config/connectdb.php';
include_once './config/check.php';
include_once './controller/booking/bookings.php';
include_once './controller/path/search.php';

$conBooking = new conBooking();
$conPath = new conPathfrom();



// รับค่าจากเลือกทางเดินรถมาเก็บไว้
@$selectcar_ = $_GET['id'];
@$pricepassenger_ = $_GET['price'];

$search_start = $_GET['to'];
$search_end = $_GET['form'];
$allData = $conPath->conSearchLog($search_start, $search_end);
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

    <!-- date datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <style>
        .ui-widget-header {
            border: 1px solid #dddddd;
            background: #F44336;
            color: #ffffff;
            font-weight: bold;
        }
    </style>

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
                    <li class="breadcrumb-item active" aria-current="page">เลือกเวลาและวันที่</li>
                </ol>
            </nav>
            <form method="post" action="selectseats.php">
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
                        <p class="mr-3 mt-2">ระบุวันที่: <input name="select_date" type="text" id="datepicker" class="mr-1" placeholder="จองตั๋วล่วงหน้าได้ไม่เกิน 30 วัน" required></p>
                        <?php
                        if (!empty($_SESSION['u_id'])) {
                            echo '<div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label" >ชื่อ-นามสกุล</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="select_name"  value="'.$objResult['u_name'].'" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputTel" class="col-sm-2 col-form-label">เบอร์โทร</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputTel" name="select_tel"  value="'.$objResult['u_tel'].'" minlength="10" maxlength="10" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputsex" class="col-sm-2 col-form-label" >เพศ</label>
                            <div class="col-sm-10">
                            <select class="custom-select " id="inputsex" name="select_sex" required="true" >
                            <option disabled selected value="">-- Select One --</option>
                                <option value="ชาย" >ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                            </div>
                          </div>';
                        } else {
                            echo '  <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label" >ชื่อ-นามสกุล</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="select_name" placeholder="ทักษิณ" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputTel" class="col-sm-2 col-form-label">เบอร์โทร</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputTel" name="select_tel" placeholder="0814221998"  minlength="10" maxlength="10" required>
                            </div>
                          </div>
                          <div class="form-group row">
                          <label for="inputsex" class="col-sm-2 col-form-label" >เพศ</label>
                          <div class="col-sm-10">
                          <select class="custom-select " id="inputsex" name="select_sex" required="true" >
                          <option disabled selected value="">-- Select One --</option>
                              <option value="ชาย" >ชาย</option>
                              <option value="หญิง">หญิง</option>
                          </select>
                          </div>
                        </div>
                          ';
                        } ?>
                        <input name="origin" type="text" value="<?= $search_start; ?>" hidden="">
                        <input name="destination" type="text" value="<?= $search_end; ?>" hidden="">
                        <input name="pricepassenger" type="text" value="<?= $pricepassenger_; ?>" hidden="">
                        <input name="path_id" type="text" value="<?= $selectcar_; ?>" hidden="">

                        <fieldset class="center submit">
                            <button class="btn btn-danger btn-sm mr-1" type="button" onclick="location.href='selectcar.php'">ย้อนกลับ</button>
                            <button class="btn btn-success btn-sm ml-1" type="submit">ยืนยัน</button>
                        </fieldset>
                    </div>
                </div>
        </div>
        </form>
        </div>
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
    <!-- <script src="vendor/jquery/jquery.min.js"></script> jquery ชนกับ date-->
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