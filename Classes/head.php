<?php
//header('Content-Type: text/html; charset=CP1251');
$serverName = "BOLID\SQLSERVER2008"; //???? instance ? port ???????????, ?? ????? ?? ?????????
$connectionInfo = array("UID" => "sa", "PWD" => "123456", "Database"=>"Orion");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

/* Close the connection. */

//sqlsrv_query(resource $conn, string $tsql [, array $params [, array $options]])  
/*
$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName
FROM dbo.pLogData join pMark on pLogData.HozOrgan=pMark.Owner
where DoorIndex='$DoorIndex' HozOrgan='$HozOrgan'and TimeVal >='$time' and TimeVal<='$time 23:59:59.000' order by TimeVal"; 
*/ 




?>