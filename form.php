<head>
<title>
	Перемещение сотрудников
</title>
 <meta http-equiv="Refresh" content="" />
		<style>
	.cl text{font-size:15px;}
.line{
	float:left;
	margin:auto;
	margin-bottom:20px;
}
		
        </style>
		<script>

		//setTimeout(function(){location.reload()},2000);
		</script>
		<script type="text/javascript" src="js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/tcal.css" />
</head>
<?php
ini_set('display_errors',0);
error_reporting(E_ALL);
$CurrentDate=date('d.m.Y');    


?>
<?php

//$date = date('m.d.Y', strtotime($_GET['TimeVal']));



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>


<script type= "text/javascript">

</script>

<?php
//if (isset($_GET['id'])) {
$id=$_GET['id'];
$date=$_GET['TimeVal'];

//var_dump($date);


?>


<?php
//$_GET['HozOrgan']=$_GET['id'];
?>


</br>
<a href='/'>Список сотрудников</a>
</br>
<?php
//and TimeVal >='$date' and TimeVal<='$date 23:59:59.000' 
include('F:\web\htdocs\st\head.php');

$tsql2="SELECT OwnerName,Owner
from dbo.pMark order by OwnerName";
$stmt2=sqlsrv_query($conn,$tsql2,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 


//$date=$_GET['TimeVal'];
$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName
FROM dbo.pLogData join pMark on pLogData.HozOrgan=pMark.Owner
where (DoorIndex=1 or DoorIndex=3 or DoorIndex=5 or DoorIndex=7 or DoorIndex=9 or DoorIndex=11 or DoorIndex=36 or DoorIndex=14) and OwnerName='$_GET[id]' 
and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by TimeVal";
//echo 'Time:'.$_GET['TimeVal'].'</br>';
//echo 'TimeTo:'.$_GET['TimeTo'].'</br>';
echo 'ID:'.$id.', ';
//where DoorIndex=36 and HozOrgan=$_GET[id] and TimeVal >=$_GET[TimeVal] and TimeVal<=$_GET[TimeVal] order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

//}else{


?>

<form action="alldoor.php" method="get" class="" >
<select name="id" >
	<option>Choose from list</option>
<?php 
	 for($row=1;$row = sqlsrv_fetch_array($stmt2);$row++){
	 ?>	<option name=""value="<?= $row['OwnerName']; ?>"><?php echo $row['OwnerName']; }?></option>
</select>
	from:<input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	to:<input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">

	
<input type="submit"></div>

</form>
<?php 
//}
?>
