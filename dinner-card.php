<head>

 <meta http-equiv="Refresh" content="" />
		<style>

		
        </style>

		<script type="text/javascript" src="js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/tcal.css" />
</head>


<?php
include('F:\web\htdocs\st\head.php');
ini_set('display_errors',0);
error_reporting(E_ALL);
$date=$_GET['TimeVal'];
$tsql="SELECT  * FROM Orion.dbo.pLogData where DoorIndex=36
and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 
echo '<br/>';

//explode(,$_GET['TimeVal']);
?>
<br/>
<h3 style=color:green>Количество зарегистрированных жрунов</h3>
<?='<b>от: </b>'.$date[0].' <b>до: </b>'.$date[1].'<br>';?>
<a style="text-decoration:;font-size:17px;color:blue" href='dinner.php'>Текущие данные в реальном времени</a>
</br>

<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >
	<b>от: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[0]">
	<b>до: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[1]">
	
<input type="submit"value=Найти  >

</form>
</div>

<?php


echo '</br>';
echo 'RecordsRes: '.sqlsrv_num_rows($stmt);
?>