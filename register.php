<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>สมัครสมาชิก</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font ไทย เนื้อหา font-family: 'Kanit', sans-serif; -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <!-- sweetalert -->
  
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <!-- sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <h1 style="font-family: 'Kanit', sans-serif;">สมัครสมาชิก</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="font-family: 'Kanit', sans-serif;">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>
                <form class="user" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" required name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" required name="password" placeholder="Password">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" required name="fname" placeholder="ชื่อ">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" required name="lname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" required minlength="10" maxlength="10" name="tel" placeholder="เบอร์โทรศัพท์">
                    </div>
               
                <!-- /.social-auth-links -->
                <p class="mb-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">สมัครสมาชิก</button>
                    <hr>
                <div class="text-center">
                    <a class="btn btn-danger btn-user btn-block" href="login.php">ล็อกอิน </a>
                </div>
                </p>
                </form>

                <?php
                require_once("config/connectdb.php");

                $strSQL = "SELECT * FROM tbl_users";
                $objQuery = mysqli_query($conn, $strSQL);
                $ccc = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

                if (isset($_POST['submit'])) {

                    $username = $_POST["username"];
                    $username = stripslashes($_REQUEST['username']); //ฟังก์ชัน stripslashes ตัด backslashe ออกจากสตริง
                    $username = mysqli_real_escape_string($conn, $username); //ฟังก์ชัน mysql_real_escape_string() เพื่อหลีกเลี่ยง SQL Injection

                    $password = stripslashes($_POST['password']);
                    $password = mysqli_real_escape_string($conn, $password);

                    $fname = stripslashes($_POST['fname']);
                    $fname = mysqli_real_escape_string($conn, $fname);

                    $lname = stripslashes($_POST['lname']);
                    $lname = mysqli_real_escape_string($conn, $lname);
                    $gap = " "; //ช่องว่างระหว่างชื่อกับนามสกุล
                    $fullname = $fname . $gap . $lname;

                    $tel = stripslashes($_POST['tel']);
                    $tel = mysqli_real_escape_string($conn, $tel);

                    $status = 1; //Set status Default = 1 

                    $check = "SELECT  * FROM tbl_users  WHERE u_username = '$username' "; //check username on web $ username in database
                    $result = mysqli_query($conn, $check) or die("ล้มเหลว");
                    $num = mysqli_num_rows($result);

                    if ($num > 0) //Check Username in database 
                    {
                        echo '<script language="JavaScript">
      swal("Username นี้ถูกใช้ไปแล้ว!", "", "error");
             </script>';
                        exit;
                    } else {
                        $query = "INSERT INTO tbl_users (u_username,u_password,u_name,u_tel,u_status)
		  VALUES ('$username','$password','$fullname','$tel','$status')";
                        $result = mysqli_query($conn, $query) or die("เพิ่มข้อมูลไม่ได้");
                    }

                    mysqli_close($conn);
                    if ($result) {
                        echo '<script language="JavaScript">
    swal("สมัครสมาชิกสำเร็จ !", "", "success");
           </script>';
                        echo '<meta http-equiv="refresh" content="2; url=login.php" />';
                    }
                }
                ?>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>