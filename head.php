<?php
ini_set('display_errors',0);
error_reporting(E_ALL);
ini_set('date.timezone', 'Europe/Moscow');
header('Content-Type: text/html; charset=CP1251');

if( $_SERVER['REMOTE_ADDR']=='10.10.0.17'){
	http_response_code(403);
	header("Location: 404.php");
	
}

//echo '<h3> Tехнические работы, BOLID в помощь!</h3>';

#if($_SERVER['HTTP_REFERRER'])

include('sql_con_bolid.php');
#include('sql_con_jfndr.php');


try {
	if(!$conn==true)
    throw new Exception('</br><h3>No connection </h3></br>');
      }
catch(Exception $e)
   {
   echo $e->getMessage();
   }
   
   
//mssql_close($conn);





// Close the connec 







?>