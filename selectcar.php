<?php

include_once './config/database.php';
include_once './controller/path/search.php';
include_once './controller/booking/bookings.php';

$conBooking = new conBooking();

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
                    <li class="breadcrumb-item active" aria-current="page">เลือกเส้นทางเดินรถ</li>
                </ol>
            </nav>
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
                                            <img class="bd-placeholder-img card-img-top" style=" max-width: 100%; height: auto;" src="img/bus.jpg" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 style="font-weight: bold; color:#000;"></h5>
                                                <p style="color:#000;" class="card-text h6">จาก <span style="color:#ff5733; font-family: 'Kanit', sans-serif;"><?= $row['origin']; ?></span> ไป <span style="color:#2196f3; font-family: 'Kanit', sans-serif;"><?= $row['destination']; ?></span></p>
                                                <p style="color:#000;" class="card-text h6">ราคา <?= number_format($row['pricepassenger'], 2); ?> บาท</p>
                                                <input type="text" name="origin" value="<?= $row['origin']; ?>" hidden="">
                                                <input type="text" name="destination" value="<?= $row['destination']; ?>" hidden="">
                                                <input type="text" name="pricepassenger" value="<?= $row['pricepassenger']; ?>" hidden="">
                                                <fieldset class="center submit">
                                                <a class="btn btn-success btn-sm" href="selectdays.php?to=<?=$row['origin'];?>&form=<?=$row['destination'];?>&price=<?= $row['pricepassenger']; ?>&id=<?= $row['path_id'];?>" >จองตั๋วรถ</a>
                                                </fieldset>
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
    </section>


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