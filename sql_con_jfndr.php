<?php
$serverName = "DESKTOP-LMVOJEF\SQLEXPRESS"; //???? instance ? port ???????????, ?? ????? ?? ?????????
$connectionInfo = array("UID" => "sa", "PWD" => "123456", "Database"=>"Orion");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>