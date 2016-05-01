<?php
  require_once('dbconnect.php');
  $dbc = connectSQL();

  $ssid = $_GET['ssid'];

  $query = "SELECT (SUM(Uploaded) + SUM(Downloaded)) AS Borrowed
            FROM Data_Transfers
            WHERE SSID = '$ssid'
            GROUP BY Mac_Address;";

  $amtBorrowed = mysql_query($query, $dbc);

  $arr = array();
  $total = 0;

  while ($row = mysql_fetch_row($amtBorrowed)) {
    $amt = intval($row[0]);
    array_push($arr, $amt);
    $total = $total + $amt;
  }

  $jsonArr = array("values" => $arr, "total" => $total);
 
  echo json_encode($jsonArr);

?>
