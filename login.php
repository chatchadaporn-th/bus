<?php
	@session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>ล็อกอิน</title>
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
            <h1 style="font-family: 'Kanit', sans-serif;">ล็อกอิน</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="font-family: 'Kanit', sans-serif;">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>
                <form class="user" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-danger btn-user btn-block"> ล็อกอิน</button>
                    <hr>
                    <div class="text-center">
                        <a class="btn btn-primary btn-user btn-block" href="register.php">สมัครสมาชิก</a>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    include_once('config/connectdb.php');
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM `tbl_users` where u_username='" . $_POST['username'] . "' and u_password='" . ($password) . "' LIMIT 1";

                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        $data = mysqli_fetch_array($result);
                        $_SESSION['u_id'] = $data['u_id'];
                        $_SESSION['u_username'] = $data['u_username'];
                        $_SESSION['u_name'] = $data['u_name'];
                        $_SESSION['u_status'] = $data['u_status'];

                        echo '<script language="JavaScript">
    swal("Welcome","' . $_SESSION['u_name'] . '", {
      className: "swal-modal"
       });
           </script>';
                        echo '<meta http-equiv="refresh" content="1; url=index.php" />';
                    } else {
                        echo '<script language="JavaScript">
    swal("Oops", "Username หรือ Password ไม่ถูกต้อง !", "error");
           </script>';
                        exit;
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