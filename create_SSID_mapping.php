<?php
  require_once('dbconnect.php');
  $dbc = connectSQL();
  mysql_query("INSERT INTO SSID_Mapping VALUES('" . $_POST['ssid'] . "', '" . $_POST['mac_addr'] . "');", $dbc) or die(mysql_error());		 
?>
