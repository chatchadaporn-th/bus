<?php
include_once './config/connectdb.php';

include_once './config/check.php';

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
                    <h5 class="card-header" style="font-family: 'Kanit', sans-serif;color:coral;">พิมพ์ตั๋วรถโดยสาร </h5>
                    <div class="card-body">
                    <h6 class="card-title" style="font-family: 'Kanit', sans-serif;"> <span style="color:#673ab7; font-family: 'Kanit', sans-serif;"> หากสถานะเปลี่ยนเป็น "ชำระเงินเรียบร้อย" ถึงจะสามารถพิมพ์ตั๋วรถโดยสารได้</span> </h6>

                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                  
                                    <th class="text-center" scope="col">หมาเลขตั๋ว</th>
                                    <th class="text-center" scope="col">วันที่จอง</th>
                                    <th class="text-center" scope="col">สถานะ</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    $num=1;
                   $paymentData= "SELECT * FROM ticket_run   WHERE seat_id= '".$objResult['u_name']."' AND ticket_tel = '".$objResult['u_tel']."' AND status = 3 ORDER BY ticketid DESC";
                   $sqlpaymentData = mysqli_query($conn,$paymentData);
                   while ($paymentData = mysqli_fetch_array($sqlpaymentData)) {
                  
                ?>
                                    <tr>
                                      
                                        <th class="text-center"><?= $paymentData['ticketid']; ?></th>
                                        <th class="text-center"><?= date('d/m/Y เวลา H:i',strtotime($paymentData['ticketdate']));?></th>
                                        <th class="text-center">  <?php
                                if($paymentData['status'] == 1){
                                    echo "<font color='#F70D1A'> รอการชำระเงิน</font> ";
                                   
                            } 
                                if($paymentData['status'] == 2){
                                    echo "<font color='#1589FF'>แจ้งชำระเงินแล้ว</font>";
                            } 
                                if($paymentData['status'] == 3){
                                     echo "<font color='#28a745'>ชำระเงินเรียบร้อย</font>";
                            } 
                               
                            ?>                
                                   </th>
                                        <th class="text-center">  <?php
                                if($paymentData['status'] == 1){
                                    echo "<a class='btn btn-danger btn-sm font-weight-bold'href='paymentdetail.php?id=$paymentData[ticketid]'>ชำระเงิน</a>";
                                   
                            } 
                                if($paymentData['status'] == 2){
                                    echo "<a class='btn btn-success btn-sm' href='viewdetail.php?id=$paymentData[ticketid]'><i class='fa fa-search'></i><b>&nbsp;View</b></a>";
                            } 
                                if($paymentData['status'] == 3){
                                     echo "<a class='btn btn-success btn-sm' href='viewdetail.php?id=$paymentData[ticketid]'><i class='fa fa-search'></i><b>&nbsp;View</b></a>  ";
                            } 
                               
                            ?>       <a href="printticket.php?ticket_id=<?=$paymentData['ticketid'];?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> พิมพ์</a>         
                                   </th>
                                 
                                    </tr>
                                <?php
                                    $num++;
                                }
                                ?>
                                
                                <?php        
                         mysqli_close($conn);
                            ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            </div>
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