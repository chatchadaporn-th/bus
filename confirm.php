<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once './config/database.php';
include_once './config/connectdb.php';
include_once './controller/path/search.php';
include_once './controller/booking/bookings.php';

$conBooking = new conBooking();


@$s_time = $_POST['s_time'];;

$sql = "SELECT * FROM `traveling_time`  WHERE  travelingt_id = '$s_time'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

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
    <!-- sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
			<!-- Content Row -->
			<div class="row">
				<!-- Area Chart -->
				<div class="col-xl-7 col-lg-6">
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
										<td scope="row" width="50%" style="text-align:right">
											<p>วันที่เดินทาง </p>
										</td>
										<td>
											<p><?= $_POST['s_date']; ?></p>
										</td>
									</tr>
									<tr>
										<td scope="row"  width="50%" style="text-align:right">
											<p>เดินทางจาก <?= $_POST['s_origin']; ?> </p>
										</td>
										<td>
											<p>ไป <?= $_POST['s_destination']; ?></p>
										</td>
									</tr>
									<tr>
										<td scope="row" width="50%" style="text-align:right">
											<p>เวลาเดินทาง <?= date('H:i', strtotime($data["travelingt_start"])); ?> น.</p>
										</td>
										<td>
											<p>ถึง <?= date('H:i', strtotime($data["travelingt_end"])); ?> น.</p>
										</td>
									</tr>
									<tr>
										<td scope="row" width="50%" style="text-align:right">
											<p>ที่นั่ง</p>
										</td>
										<td>
											<?php

											$seatNO = $_POST['seatNO'];
											foreach ($seatNO as $value) {
												echo "$value ";
											}
											?>
										</td>
									</tr>
									<tr>
										<td scope="row" width="30%" style="text-align:right">
											<p>ราคาทั้งหมด</p>
										</td>
										<td>
											<p><?php
												$count = count($_POST['seatNO']);
												$total = $count * $_POST['s_pricepassenger'];
												echo number_format($total, 2);
												?> บาท</p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Pie Chart -->
				<div class="col-xl-5 col-lg-6">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Kanit', sans-serif;color:coral;">ข้อมูลผู้โดยสาร</h6>
						</div>
						<!-- Card Body -->
						<div class="card-body" style="background-color: #ffffff; font-family: 'Kanit', sans-serif;">
							<div class="table-responsive">
								<table class="table table-borderless">
									<tr>
										<td scope="row" width="40%" style="text-align:right">
											<p>คุณ </p>
										</td>
										<td>
											<p><?= $_POST['s_name']; ?></p>
										</td>
									</tr>
									<tr>
										<td scope="row" width="40%" style="text-align:right">
											<p>เบอร์โทรศัพท์ </p>
										</td>
										<td>
											<p><?= $_POST['s_tel']; ?></p>
										</td>
									</tr>
									<tr>
										<td scope="row" width="40%" style="text-align:right">
											<p>เพศ </p>
										</td>
										<td>
											<p><?= $_POST['s_sex']; ?></p>
										</td>
									</tr>
								</table>
							</div>
							<div class="mt-4 text-center small">
							<div class="w-100">บริษัท สหมิตรภาพสาย 278 ขอนแก่น-มุกดาหาร</div>
								<span class="mr-2"><i class="fas fa-grin-beam text-primary"></i> ขอขอบคุณที่ใช้บริการครับ</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form method="POST">
				<input name="s_name" type="text" value="<?= $_POST['s_name']; ?>" hidden="">
				<input name="s_tel" type="text" value="<?= $_POST['s_tel']; ?>" hidden="">
				<input name="s_sex" type="text" value="<?= $_POST['s_sex']; ?>" hidden="">
				<input name="s_time" type="text" value="<?= $_POST['s_time']; ?>" hidden="">
				<input name="s_date" type="text" value="<?= $_POST['s_date']; ?>" hidden="">
				<input name="s_origin" type="text" value="<?= $_POST['s_origin']; ?>" hidden="">
				<input name="s_destination" type="text" value="<?= $_POST['s_destination']; ?>" hidden="">
				<input name="s_pricepassenger" type="text" value="<?= $_POST['s_pricepassenger']; ?>" hidden="">
				<input name="s_pathid" type="text" value="<?= $_POST['s_pathid']; ?>" hidden="">
				<?php
				$seatNO = $_POST['seatNO'];
				foreach ($seatNO as $value) { ?>
					<input type="checkbox" id="customChecke4" name="seatNO[]" value="<?= $value; ?>" checked  hidden="">
				<?php	}
				?>
				<fieldset class="center submit mt-3" style="font-family: 'Kanit', sans-serif;">
					<a class="btn btn-danger btn-sm mr-1" href="javascript:history.go(-2);">ย้อนกลับ</a>
					<button class="btn btn-success btn-sm ml-1" type="submit" name="submit">ยืนยัน</button>
				</fieldset>
			</form>
		</div>
		</div>
		</div>
	</section>

	<?php
	if (isset($_POST['submit'])) {
		$s_name = $_POST['s_name'];
		$s_time = $_POST['s_time'];
		$s_date = $_POST['s_date'];
		$s_tel = $_POST['s_tel'];
		$s_sex = $_POST['s_sex'];
		$s_path = $_POST['s_pathid'];
		$status = 1; //Set status Default = 1 
		$seatNO = $_POST['seatNO'];
		$date = date('Y-m-d H:i:s'); //Format Date 1999-01-22 Time 17:16:18
		$count = count($_POST['seatNO']);

		if (empty($count)) {
			echo '<script language="JavaScript">
            alert("กรุณาเลือกที่นั่ง");
            history.back()
                   </script>';
		} else  if ($count > 4) {
			echo '<script language="JavaScript">
            alert("เลือกที่นั่งสูงสุดได้ 4 ที่นั่ง");
            history.back()
                   </script>';
		} else

        if ($count >= 1) {


	

		// ticket_run		
		$sql2 = "SELECT MAX(`ticketidt`) AS `ticketidt` FROM `ticket_run` WHERE `seat_id`='$s_name'";
		$query2  = mysqli_query($conn, $sql2);
		$row = mysqli_fetch_array($query2);

		$year = substr(date("Y")+543, -2);
		$maxId = $row['ticketidt'];
		$maxId = ($maxId + 1); 
		$maxId = substr("000".$maxId, -3);
		$ticket_namber = $year.$maxId ;



			$ticket_run = "INSERT INTO ticket_run (ticketidt,ticketid,seat_id,ticket_tel,ticketdate,t_sex,status)
            VALUES ('','$ticket_namber','$s_name','$s_tel','$date','$s_sex','$status')";
			$ticket_run1 = mysqli_query($conn, $ticket_run) or die("เพิ่มข้อมูลไม่ได้");

	
			for ($i = 0; $i < $count; $i++) {
				$query = "INSERT INTO seat(seat_no,reserve_by,seat_time,seat_date,seat_pathid,seat_ticket_run)
                VALUES ('$seatNO[$i]','$s_name','$s_time','$s_date','$s_path','$ticket_namber')";
				$result = mysqli_query($conn, $query) or die("เพิ่มข้อมูลไม่ได้");
			}
			echo '<script language="JavaScript">
            swal({
                title: "รหัสตั๋ว '.$ticket_namber.'",
                text: "จองนั่งสำเร็จ ",
                icon: "success",
                button: "OK",
              });
                            </script>';
			echo '<meta http-equiv="refresh" content="3; url=index.php" />';
		}
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