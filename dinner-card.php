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
$tsql="SELECT * FROM pLogData where DoorIndex=36
and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 


?>
<br/>
<h3 style=color:green>���������� ������������������ ������</h3>
<?='<b>��: </b>'.$date[0].' <b>��: </b>'.$date[1].'<br>';?>
<a style="text-decoration:;font-size:17px;color:blue" href='dinner.php'>������� ������ � �������� �������</a>
</br>

<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >
	<b>��: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	<b>��: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">
	
<input type="submit"value=�����  >

</form>
</div>

<?php
echo '</br>';
echo 'RecordsRes: '.sqlsrv_num_rows($stmt);
?>