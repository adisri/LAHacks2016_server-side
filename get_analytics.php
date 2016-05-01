<?php
    require_once('dbconnect.php');
    $dbc = connectSQL();
    
    $mac_addr = $_GET['mac_addr'];
    
    // amount borrowed

    $borrowedQuery = "SELECT Mac_Address, (SUM(Uploaded) + SUM(Downloaded)) AS Borrowed
                      FROM Data_Transfers
                      WHERE Mac_Address = '$mac_addr'
                      GROUP BY Mac_Address;";

    $amtBorrowed = mysql_query($borrowedQuery, $dbc);
    $borrowedRow = mysql_fetch_row($amtBorrowed); // borrowedRow[1] contains the amount of data borrowed

    if (empty($borrowedRow)) {
	$borrowedRow[0] = "";
	$borrowedRow[1] = 0;
    }

    $analytics = array('borrowed' => $borrowedRow[1]);

    // amount shared

   $loanedQuery = "SELECT (SUM(dt.Uploaded) + SUM(dt.Downloaded)) AS Loaned
		   FROM SSID_Mapping AS map, Data_Transfers AS dt
                   WHERE  map.SSID = dt.SSID
		   AND map.Mac_Address = '$mac_addr';";

   $amtLoaned = mysql_query($loanedQuery, $dbc) or die(mysql_error());
   $loanedRow = mysql_fetch_row($amtLoaned) or die(mysql_error());

   if (empty($loanedRow[0])) {
	$loanedRow[0] = 0;
   }

   $analytics['loaned'] = $loanedRow[0];

   echo json_encode($analytics);	
?>
