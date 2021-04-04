<?php
if (!isset($_SESSION['u_id'])) {
    session_start();
}
@error_reporting(E_ALL ^ E_NOTICE);
?>
<nav class="navbar navbar-expand-lg navbar-dark  " style="background-color: #03a9f4a8 !important;">
    <a class="navbar-brand" href="index.php" style="font-weight: bold;font-family: 'Mitr', sans-serif;"> <sup>บริษัท</sup> สหมิตรภาพสาย <i class='fas fa-bus'></i> |</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="selectcar.php" style="color: #ffeb3b; font-weight:bold; font-family: 'Mitr', sans-serif;">จองตั๋วรถ <i class='fas fa-calendar-check'></i></a>
            </li>

            <?php
        if (!empty($_SESSION['u_id'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="paymentview2.php" style="color: #ffeb3b; font-weight:bold; font-family: 'Mitr', sans-serif;">ชำระเงิน <i class='fas fa-hand-holding-usd'></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="print.php" style="color: #ffeb3b; font-weight:bold; font-family: 'Mitr', sans-serif;">พิมพ์ตั๋ว <i class='fas fa-print'></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cancel.php" style="color: #ff5722; font-weight:bold; font-family: 'Mitr', sans-serif;">ยกเลิกตั๋ว <i class='fas fa-calendar-times'></i></a>
            </li>
        <?php    } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="payment.php" style="color: #ffeb3b; font-weight:bold; font-family: 'Mitr', sans-serif;">ชำระเงิน <i class='fas fa-hand-holding-usd'></i></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="printM.php" style="color: #ffeb3b; font-weight:bold; font-family: 'Mitr', sans-serif;">พิมพ์ตั๋ว <i class='fas fa-print'></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cancelM.php" style="color: #ff5722; font-weight:bold; font-family: 'Mitr', sans-serif;">ยกเลิกตั๋ว <i class='fas fa-calendar-times'></i></a>
            </li>
        <?php        } ?>

    
            <?php
        if ($_SESSION['u_status']== 2) { ?>
              <li class="nav-item">
                <a class="nav-link" target ="_blank" href="admin/index.php" style="color: #e91e63; font-weight:bold; font-family: 'Mitr', sans-serif;">ADMIN <i class='fas fa-database'></i></a>
            </li>
        <?php    }  ?>
        </ul>
        <?php
        if (!empty($_SESSION['u_id'])) { ?>
            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-success" href="logout.php" style="font-weight: bold;font-family: 'Mitr', sans-serif;">ออกจากระบบ</a>
            </form>
        <?php    } else { ?>
            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-primary" href="login.php" style="font-weight: bold;font-family: 'Mitr', sans-serif;">ล็อกอิน</a>
                <a class="btn btn-success ml-2" href="register.php" style="font-weight: bold;font-family: 'Mitr', sans-serif;">สมัครสมาชิก</a>
            </form>
        <?php        } ?>

    </div>
</nav>