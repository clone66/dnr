<?php
ini_set('display_errors',0);
error_reporting(E_ALL);
session_start();

if(time()-$_SESSION["start"]>86400)
session_destroy();
if($_SESSION["user_name"]) {
?>
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
table{
width: 930px;
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
include('F:\web\htdocs\st\head.php');
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
<h3>История перемещения сотрудников по предприятию</h3>
<?='<b>от: </b>'.$date[0].' <b>до: </b>'.$date[1].'<br>';?>
<a href='/'>Список сотрудников</a>
</br>
<?php

if($_SERVER['REMOTE_ADDR']=='10.10.0.175')
	header('location:404.php');

//and TimeVal >='$date' and TimeVal<='$date 23:59:59.000' 


$tsql2="SELECT Name,FirstName,MidName,ID
from dbo.pList order by Name";
$stmt2=sqlsrv_query($conn,$tsql2,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET)); 


//$date=$_GET['TimeVal'];
$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,Name,FirstName,MidName
FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID
where (DoorIndex=1 or DoorIndex=3 or DoorIndex=5 or DoorIndex=7 or DoorIndex=9 or DoorIndex=11 or DoorIndex=15 or DoorIndex=36 or DoorIndex=14 or DoorIndex=17 or DoorIndex=22) 
and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' and ID='$_GET[id]' order by TimeVal";

/*
SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,Name,FirstName,MidName
FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID
where (DoorIndex=1 or DoorIndex=3 or DoorIndex=5 or DoorIndex=7 or DoorIndex=9 or DoorIndex=11 or DoorIndex=15 or DoorIndex=36 or DoorIndex=14) 
and TimeVal >='01.03.2020 08:35:59.000' and TimeVal<='02.03.2020 19:59:59.000' and ID=2588 order by TimeVal

*/

//echo 'Time:'.$_GET['TimeVal'].'</br>';
//echo 'TimeTo:'.$_GET['TimeTo'].'</br>';
echo 'ID:'.$id.', ';
//where DoorIndex=36 and HozOrgan=$_GET[id] and TimeVal >=$_GET[TimeVal] and TimeVal<=$_GET[TimeVal] order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

//TimeVal >='22.01.2020'



echo 'Records: '.sqlsrv_num_rows($stmt);
//	echo'</br>';
//	echo"$row[Name] $row[FirstName] $row[MidName]";
echo'</br>';
echo "<a href=http://phpexcl/Classes/indx.php?id=$_GET[id]&TimeVal=$date[0]&TimeVal=$date[1]>Upload Excell</a>";

echo '<div class="common"style="width:100%;">	
	<div class="inp_search">
		<form action="" method="get" class="" >
			<input type="text" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" class="search_form_input"placeholder="Find item..." id="" value="">
			<button class="btn_find" type="submit"><span class="find">Find</span></button>
		</form>
	</div>
	
	<div class="clear">
	</div>';
	

	echo '<div class="cl-common"style="width:940px; display: table;height:;float:left; border-top:1px solid ;">';
	$i=1;
	echo'<table>';
 for($row=1;$row = sqlsrv_fetch_array($stmt);$row++){//echo'<pre>';print_r($row);echo'</pre>';
		//echo '<div class=""style="width:; height:;float:left; outline:1px solid red;margin-right:5px">';
		//$row['OwnerName']=mb_convert_encoding($row,"utf-8","Windows-1251");		
	//echo '</div>';
	echo'<tr>';
		echo'<td class=cl style="border-bottom:1px solid green;border-right:1px solid green;width:30px;;float:left;display:block; ">';
		echo $i++;
		echo'</td>';
		
		echo'<td class=cl style="border-bottom:1px solid black;width:300px;float:left;display:block;">';	
		echo"<text>$row[Name] $row[FirstName] $row[MidName]	</text>";
		echo'</td>';
		
		echo'<td class=cl style="border-bottom:1px solid green;border-left:1px solid green;width:130px;;float:left;display:block; ">';
		echo $row['TimeVal']->format('Y-m-d H:i');
		echo'</td>';
		
		//$str=preg_split('/ /',$row['Remark'],PREG_SPLIT_OFFSET_CAPTURE);
		
		//$str=explode(',',$str[3]);
		echo'<td class=cl style="border-bottom:1px solid green;border-left:1px solid green;border-right:1px solid green;width:400px;;float:left;display:block; ">';
	
		//echo$str[0].$str[1];
		echo $row['Remark'];
		echo'</td>';
		echo'</tr>';
		//echo'<div class=cl style="border:1px solid green;width:47px;height:17px;;float:left;display:block; ">';
		//echo "$row[HozOrgan].$row[OwnerName]";
	//	echo'</div>';


}echo'</table>';
	//if($id){$row['HozOrgan']=$row['OwnerName'];}					
	
echo '<hr class=line>';
echo '</div>';echo '</div>';


?>
<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >
<select name="id" >
	<option>Choose from list</option>
<?php 

$row=mb_convert_encoding($row,"utf-8","Windows-1251");
	 for($row=1;$row = sqlsrv_fetch_array($stmt2);$row++){
	 ?>	<option name=""value="<?= $row['ID']?>"><?php echo $row['Name'].' '.$row['FirstName'].' '.$row['MidName']; }?></option>
</select>
	<b>от: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	<b>до: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">

	<?php
	//sqlsrv_free_stmt($stmt);sqlsrv_free_stmt($stmt2);
	//sqlsrv_close( $conn );
	?>
<input type="submit"value=Найти  >

</form>
</div>

<?php



}else header("Location:login.php");
?>