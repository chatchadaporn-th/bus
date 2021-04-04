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
        <form method="POST" action="paymentview.php">
                <div class="card" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
                    <h5 class="card-header" style="font-family: 'Kanit', sans-serif;color:coral;">ชำระเงิน <i class='far fa-credit-card'></i></h5>
                    <div class="card-body">
                        <h6 class="card-title mb-4" style="font-family: 'Kanit', sans-serif;color:steelblue">บริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร </h6>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label" >ชื่อ-นามสกุล</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="select_name" placeholder="คิม จีซู" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputTel" class="col-sm-2 col-form-label">เบอร์โทร</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputTel" name="select_tel" placeholder="0814221998"  minlength="10" maxlength="10" required>
                            </div>
                          </div>
                        <button type="submit" class="btn btn-primary mt-2" name="submit">ชำระเงิน</button>
                    </div>
                </div>
            </form>
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