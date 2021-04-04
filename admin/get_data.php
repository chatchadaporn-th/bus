<?php
  header('Content-Type: application/json');
  
  require_once '../config/connectdb.php';

  $sqlQuery = "SELECT CONCAT(origin ,' ', destination) AS Fullname , COUNT(`seat_id`) AS conutseat FROM seat AS t1 INNER JOIN paths AS t2 ON (t1.seat_pathid=t2.path_id) GROUP BY `seat_pathid` ORDER BY `seat_pathid` ASC";
  $result = mysqli_query($conn, $sqlQuery);

  $data = array();
  foreach ($result as $row) {
      $data[] = $row;
  }

  mysqli_close($conn);

  echo json_encode($data);



?>