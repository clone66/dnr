<?php

?>
<head>
<title>
	Инфо по столовой
</title>
 <meta http-equiv="Refresh" content="" />
		<style>
	.cl text{font-size:15px;}
.line{
	float:left;
	margin:auto;
	margin-bottom:20px;

}
table{
width: 690px;
bordser-collapse:collapse;
border-spacing:0
}
td{
padding: 5px;
width: 10px;
height: 10px;
}

		
        </style>
		<script>

		//setTimeout(function(){location.reload()},2000);
		</script>
		<script type="text/javascript" src="js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/tcal.css" />
</head>
<?php
include('head.php');
$CurrentDate=date('d.m.Y');    


?>
<?php

//$date = date('m.d.Y', strtotime($_GET['TimeVal']));



?>




<script type= "text/javascript">

</script>

<?php

$id=$_GET['id'];
$date=$_GET['TimeVal'];
#fromdate=$_GET['TimeVal'];	format=1474156800
#todate=$_GET['TimeVal'];	format=1474156900
//var_dump($date);


?>


<?php
//$_GET['HozOrgan']=$_GET['id'];


?>

</br>
<h3>История по питанию сотрудников</h3>
<?php
if ($date[0]){
	echo '<div style=float:left>
	<a style="color:red" href="Classes/form.php">ЗАГРУЗИТЬ в Excell</a>
</div>';
}
else false;
?>


</br>
<?='<b>от: </b><u>'.$date[0].'</u> <b>до: </b><u>'.$date[1].'</u><br>';?>


<?php
echo '<a style=text-decoration:;font-size:17px;color:blue href=dinner-card.php>Общее количество по заданному времени</a>';
echo'</br>';
echo '<a style=text-decoration:;font-size:17px;color:blue href=item.php>Запись для одного едока</a>';
echo'<br/>';



//if($_SERVER['REMOTE_ADDR']=='10.10.0.175')
//	header('location:404.php');

$date=$_GET['TimeVal'];




$tsql="SELECT  ID,Remark,DoorIndex,TimeVal,HozOrgan,Name,FirstName,MidName,Contents
FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID join [Orion].[dbo].[Events] on pLogData.Event=Events.Event
where DoorIndex='36' and TimeVal >='$date[0]' and TimeVal<='$date[0] 23:59:59.000' order by TimeVal DESC";


//where DoorIndex=36 and HozOrgan=$_GET[id] and TimeVal >=$_GET[TimeVal] and TimeVal<=$_GET[TimeVal] order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));


echo '<b>Записей:</b> '.sqlsrv_num_rows($stmt);
//	echo'</br>';
//	echo"$row[Name] $row[FirstName] $row[MidName]";
echo'</br>';

echo '<div class="common"style="width:100%;">	
	<div class="inp_search">
		<form action="" method="get" class="" >
			<input type="text" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" class="search_form_input"placeholder="Find item..." id="" value="">
			<button class="btn_find" type="submit"><span class="find">Find</span></button>
		</form>
	</div>
	
	<div class="clear">
	</div>';

	echo '<div class="cl-common"style="width:670px; display: table;height:;float:left; border-top:0px solid ;">';
	$i=1;
	echo'<table>';
	$s=1;
 for($row=1;$row = sqlsrv_fetch_array($stmt);$row++){
       $c=count($row['HozOrgan']);
		echo'<tr class="cl ">';
		echo'<td class="cl " style="border-bottom:1px solid green;border-right:1px solid green;width:30px;;float:left;display:block; ">';
		echo $s;
		$s=$s+$c;
		echo'</td>';
		
		echo'<td class="cl " style="border-bottom:1px solid black;width:300px;float:left;display:block;">';	
		echo"<text>$row[Name] $row[FirstName] $row[MidName] 		</text>";

		echo'</td>';
		
		echo'<td class="cl "style="border-bottom:1px solid green;border-left:1px solid green;width:130px;;float:left;display:block; ">';
		echo $row['TimeVal']->format('Y-m-d H:i');
		echo'</td>';
		
		#if($row['Contents']=='Доступ отклонен')
		echo'<td class="cl "style="border-bottom:0px solid green;border-left:1px solid green;width:170px;;float:left;display:block; ">';
		if ($row['Contents']=='Доступ отклонен')
		echo '<span style = color:red>'.$row['Contents'].'</span>';
		else $row['Contents'];
		echo'</td>';		
		
		echo'</tr>';



}echo'</table>';
					
	
echo '<hr class=line>';
echo '</div>';echo '</div>';


?>
<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >


	<input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">

	<?php
	//sqlsrv_free_stmt($stmt);sqlsrv_free_stmt($stmt2);
	//sqlsrv_close( $conn );
	?>
<input type="submit"value=Найти  >

</form>

</div>


