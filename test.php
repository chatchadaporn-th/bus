<?php
error_reporting(E_ALL & ~E_NOTICE);

include_once './config/database.php';
include_once './controller/booking/bookings.php';
include_once './controller/path/search.php';

$conBooking = new conBooking();
$conPath = new conPathfrom();

echo "<pre>";
echo "SESSION";
print_r($_SESSION);
echo "GET";
print_r($_GET);
echo "POST";
print_r($_POST);
echo "</pre>";



@$test = $_POST['select_name'];
@$search_start = $_GET['to'];
@$search_end = $_GET['form'];
@$seatNO = $_POST['seatNO'];
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
    <!-- sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- date datepicker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <!-- Navigation -->
    <?php
    require_once("navigation.php");
    ?>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
        <form method="post"  action="selectseats.php#2">
            <input name="s_name" type="text" value="<?= $_POST['select_name']; ?>" >
            <input name="s_time" type="text" value="<?= $_POST['select_time']; ?>" hidden="">
            <input name="s_date" type="text" value="<?= $_POST['select_date']; ?>" hidden="">
            <input name="s_tel" type="text" value="<?= $_POST['select_tel']; ?>" hidden="">
            <input name="s_pathid" type="text" value="<?= $_POST['path_id']; ?>" hidden="">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="font-family: 'Kanit', sans-serif;">
                        <li class="breadcrumb-item"><a href="index.php" style="color:#009688 ;">หน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="selectcar.php" style="color:#009688 ;">เลือกเส้นทางเดินรถ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เลือกเวลาและวันที่</li>
                        <li class="breadcrumb-item active" aria-current="page">เลือกที่นั่ง</li>
                    </ol>
                </nav>
                <table class="border center " width="100%" style="font-family: 'Kanit', sans-serif;">

                    <tr style="height: 80px;">
                        <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ด้านหน้ารถ <br> เลือกที่นั่งสูงสุดได้ครั้งละ 4 ที่นั่ง </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="right color-white bg-red table-bordered" width="7%">แถว A</td>

                        <?php

                        for ($i = 1; $i <= 2; $i++) { ?>
                            <td class="center table-bordered">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck<?= $i; ?>" name="seatNO[]" value="a<?= $i; ?>" >
                                    <label class="custom-control-label" for="customCheck<?= $i; ?>"> <img for="checkbox<?= $i; ?>" src='img/select.png'><br><?= $i; ?></label>
                                </div>
                            </td>
                        <?php
                        } ?>
                        <td width="25%" style="background-color: #e91e6330;"></td>

                        <?php

                        for ($i = 3; $i <= 4; $i++) { ?>
                            <td class="center table-bordered">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck<?= $i; ?>" name="seatNO[]" value="a<?= $i; ?>" <?php if ($test == $i) {
                                                                                                                                                            echo " checked disabled";
                                                                                                                                                        } //end if 
                                                                                                                                                        ?>>
                                    <label class="custom-control-label" for="customCheck<?= $i; ?>"> <img for="checkbox<?= $i; ?>" src='img/<?php if ($test == $i) {
                                                                                                                                                echo "user.png";
                                                                                                                                            } else {
                                                                                                                                                echo "select.png";
                                                                                                                                            } //end if 
                                                                                                                                            ?> '><br><?= $i; ?></label>
                                </div>
                            </td>
                        <?php
                        } ?>
                    </tr>
                    <tr style="height: 50px;">
                        <td colspan="6" style="background-color: #00bcd44f; font-family: 'Kanit', sans-serif;">ท้ายรถ</td>
                    </tr>
                </table>
                <fieldset class="center submit mt-3" style="font-family: 'Kanit', sans-serif;">
                    <button class="btn btn-danger btn-sm mr-1" type="button" onclick="location.href='selectcar.php'">ย้อนกลับ</button>
                    <button class="btn btn-success btn-sm ml-1" type="submit" name="submit">ยืนยัน</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" type="submit" name="submit">
                        Launch demo modal
                    </button>
                </fieldset>
            </div>
            </div>
            </div>
        </form>
        </div>
    </section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">โปรดตรวจสอบข้อมูลก่อนยืนยัน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
        <input name="s_name" type="text" value="<?= $_POST['select_name']; ?>" >
            <input name="s_time" type="text" value="<?= $_POST['select_time']; ?>" >
            <input name="s_date" type="text" value="<?= $_POST['select_date']; ?>" >
            <input name="s_tel" type="text" value="<?= $_POST['select_tel']; ?>" >
            <input name="s_pathid" type="text" value="<?= $_POST['path_id']; ?>" >
            <?= $exr[$r]; ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <?php
    if (isset($_POST['submit'])) {


        $s_name = $_POST['select_name'];
        $s_time = $_POST['select_time'];
        $s_date = $_POST['select_date'];
        $s_tel = $_POST['select_tel'];
        $s_path = $_POST['path_id'];
        $status = 1; //Set status Default = 1 


        $seatNO = $_POST['seatNO'];
        $count = count($_POST['seatNO']);
        if ($count > 2) {
            echo '<script language="JavaScript">
            swal("เลือกที่นั่งสูงสุดได้ 4 ที่นั่ง", "", "error");
                   </script>';
            exit;
        } 
    }

    ?>
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