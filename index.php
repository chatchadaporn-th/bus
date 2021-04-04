<?php

include_once './config/database.php';
include_once './controller/path/search.php';
$conPath = new conPathfrom();

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


    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

    <!-- Select Live -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <!-- Navigation -->
    <?php
    require_once("navigation.php");
    ?>

    <!-- Masthead -->
    <header class="masthead" style="background:url(img/bus-city.jpg) no-repeat center center;">
        <div class="overlay"></div>
        <div class="container">
            <form method="GET" action="view.php">
                <div class="card" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                    <h5 class="card-header" style="font-family: 'Kanit', sans-serif;color:coral;">ค้าหาตารางการเดินรถ <i class='far fa-calendar-alt'></i></h5>
                    <div class="card-body">
                        <h6 class="card-title" style="font-family: 'Kanit', sans-serif;color:steelblue">บริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร พร้อมให้บริการ</h6>
                        <select name="search_start" class="selectpicker show-tick form-control" data-live-search="true" required>
                            <option value="" disabled selected hidden>เลือกต้นทาง</option>
                            <?php
                            $allData = $conPath->allProvinces();
                            while ($row = $allData->fetch()) {
                            ?>
                                <option value="<?= $row['traveling_name']; ?>"><?= $row['traveling_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <select name="search_end" class="selectpicker show-tick form-control mt-2" data-live-search="true" required>
                            <option value="" disabled selected hidden>เลือกปลายทาง</option>
                            <?php
                            $allData = $conPath->allProvinces();
                            while ($row = $allData->fetch()) {
                            ?>
                                <option value="<?= $row['traveling_name']; ?>"><?= $row['traveling_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2" name="submit">ค้นหาตารางรถ</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center" style="font-family: 'Kanit', sans-serif;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-screen-desktop m-auto text-primary"></i>
                        </div>
                        <h3>วิธีการจองและชำระเงิน</h3>
                        <!-- <p class="lead mb-0">This theme will look great on any device, no matter the size!</p> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-layers m-auto text-primary"></i>
                        </div>
                        <h3>ตรวจสอบสถานะตั๋ว</h3>
                        <!-- <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-check m-auto text-primary"></i>
                        </div>
                        <h3>พิมพ์ตั๋วโดยสาร</h3>
                        <!-- <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Showcases -->
    <!-- <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Fully Responsive Design</h2>
                    <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Updated For Bootstrap 4</h2>
                    <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
    <?php
    require_once("footer.php");
    ?>

    <!-- Select Live -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js'></script>

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>