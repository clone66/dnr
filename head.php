<?php

ini_set('date.timezone', 'Europe/Moscow');
header('Content-Type: text/html; charset=CP1251');
//echo '<h3> T���������� ������, BOLID � ������!</h3>';


$serverName = "BOLID\SQLSERVER2008"; //???? instance ? port ???????????, ?? ????? ?? ?????????
$connectionInfo = array("UID" => "sa", "PWD" => "123456", "Database"=>"Orion");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


try {
	if(!$conn==true)
    throw new Exception('��� ���������� c �������� ');
      }
catch(Exception $e)
   {
   echo $e->getMessage();
   }
   
   
//mssql_close($conn);





// Close the connec 







?>