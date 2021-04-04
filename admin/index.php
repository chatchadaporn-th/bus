<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
require_once '../config/check.php';
require_once '../config/connectdb.php';




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
    <!-- Font ไทย เนื้อหา font-family: 'Kanit', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">เส้นทางการเดินรถ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                $sql = "select count(*) as total from paths";
                                                                                                $result = mysqli_query($conn, $sql);
                                                                                                $data = mysqli_fetch_assoc($result);
                                                                                                echo $data['total'];
                                                                                                ?> เส้นทาง</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">รายได้ทั้งหมด</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                $sqlsum = "select SUM(amount) as totalsum from tbl_payment";
                                                                                                $resultsum = mysqli_query($conn, $sqlsum);
                                                                                                $datasum = mysqli_fetch_assoc($resultsum);
                                                                                                echo number_format($datasum['totalsum'], 2);
                                                                                                ?> บาท</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">จำนวนสมาชิก</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                $sqluser = "SELECT COUNT(*) AS totaluser FROM tbl_users WHERE u_status =1";
                                                                                                $resultuser = mysqli_query($conn, $sqluser);
                                                                                                $datauser = mysqli_fetch_assoc($resultuser);
                                                                                                echo $datauser['totaluser'];
                                                                                                ?> คน</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">จำนวนการจองที่นั่ง</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                $sqlseat = "SELECT COUNT(*) AS totalseat FROM seat ";
                                                                                                $resultseat = mysqli_query($conn, $sqlseat);
                                                                                                $dataseat = mysqli_fetch_assoc($resultseat);
                                                                                                echo $dataseat['totalseat'];
                                                                                                ?> ที่นั่ง</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7 mb-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">เส้นทางยอดนิยม</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="graphCanvas" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">




                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white mt-5">
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

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
            <script src="js/demo/chart-bar-demo.js"></script>
            <script>
                $(document).ready(function() {
                    showGraph();
                });

                function showGraph() {
                    {
                        $.post("get_data.php", function(data) {
                            console.log(data);
                            let name = [];
                            let lname = [];
                            let score = [];
                            for (let i in data) {
                                name.push(data[i].Fullname);
                                score.push(data[i].conutseat);
                            }
                            let chartdata = {
                                labels: name,
                                datasets: [{
                                    label: 'จำนวนการเดินทาง : ครั้ง',
                                    fontColor: 'black',
                                    // backgroundColor: '#dc3545',
                                    // borderColor: '#dc3545',
                                    hoverBorderColor: '#666666',
                                    data: score,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    
                                }]

                            };
                            let graphTarget = $('#graphCanvas');
                            let barGraph = new Chart(graphTarget, {
                                type: 'bar',
                                data: chartdata,
                                options: {
                                    legend: {
                                        labels: {
                                            // This more specific font property overrides the global property
                                            fontColor: 'black',
                                            fontSize: 16
                                          
                                        }
                                    }
                                }
                            })
                        })
                    }
                }
            </script>

</body>

</html>