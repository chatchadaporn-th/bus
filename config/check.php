
<?php
require_once 'connectdb.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
@error_reporting (E_ALL ^ E_NOTICE);
if(!isset($_SESSION["u_username"])){ 
   
}
$strSQL = "SELECT * FROM tbl_users WHERE u_username = '".$_SESSION["u_username"]."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>	
</body>