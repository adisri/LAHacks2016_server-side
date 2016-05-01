<?php
  require_once('dbconnect.php');
  $dbc = connectSQL();
  mysql_query("INSERT INTO Data_Transfers VALUES('" . $_POST['mac_addr'] . "', '" . $_POST['ssid'] . "', '" . $_POST['uploaded'] . "', '" . $_POST['downloaded'] . "');", $dbc) or die(mysql_error());
?>
