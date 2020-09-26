<head>

 <meta http-equiv="Refresh" content="" />
		<style>
	.cl text{font-size:15px;}
.line{
	float:left;
	margin:auto;
	margin-bottom:20px;
}
.cl-common{
	float:left;position:relative;top:20px;
	
}
		
        </style>

		<script type="text/javascript" src="js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/tcal.css" />
</head>


<?php
include('F:\web\htdocs\st\head.php');
ini_set('display_errors',0);
error_reporting(E_ALL);
$date=$_GET['TimeVal'];
$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName
FROM dbo.pLogData join pMark on pLogData.HozOrgan=pMark.Owner
where DoorIndex=36 and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by OwnerName";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 

	echo '<div class="cl-common"style="width:500px; display: table;height:;float:left; border-top:1px solid ;">';
	$i=1;
 for($row=1;$row = sqlsrv_fetch_array($stmt);$row++){//echo'<pre>';print_r($row);echo'</pre>';
		//echo '<div class=""style="width:; height:;float:left; outline:1px solid red;margin-right:5px">';
					
	//echo '</div>';
		echo'<div class=cl style="outline:1px solid green;width:40px;;float:left;display:block; ">';
		echo $i++;
		echo'</div>';
	
		echo'<div class=cl style="border-bottom:1px solid black;width:300px;float:left;display:block;">';	
		echo"<text>$row[OwnerName]		</text>";
		echo'</div>';
		
		echo'<div class=cl style="border-bottom:1px solid green;border-left:1px solid green;width:130px;;float:left;display:block; ">';
		echo $row['TimeVal']->format('Y-m-d H:i');
		echo'</div>';
		
		
		
		//echo'<div class=cl style="outline:1px solid green;width:47px;;float:left; ">';
		//echo "<a href=item.php?id=$row[HozOrgan]&TimeVal=03.12.2019&TimeVal=05.12.2019>specify</a>";
		//echo'</div>';	
//$_GET['HozOrgan']=$row['HozOrgan'];

}//echo "<a href=http://phpexcl/Classes/indx.php?id=$_GET[id]&TimeVal=$date[0]&TimeVal=$date[1]>Upload Excell</a>";
		//echo'<div class=cl style="width:45px;outline:1px solid yellow;float:left; ">';
		
		//echo'</div>';							
	
echo '<hr class=line>';
echo '</div>';





?>
<br/>
<h3 style=color:green>Общее количество зарегистрированных жрунов </br>по заданоому времени</h3>
<?='<b>от: </b>'.$date[0].' <b>до: </b>'.$date[1].'<br>';?>
<a style="text-decoration:;font-size:17px;color:blue" href='dinner-link.php'>Текущие данные в реальном времени</a>
</br>

<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >
	<b>от: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	<b>до: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">
	
<input type="submit"value=Найти  >

</form>
</div>

<?php
echo '</br>';
echo 'RecordsRes: '.sqlsrv_num_rows($stmt);
?>