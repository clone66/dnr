<head>
<title>
	Выбрать жруна
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
		<script type="text/javascript" src="js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/tcal.css" />
		<script>
		//setTimeout(function(){location.reload()},2000);
		</script>
</head>



</br>
<h3 style=color:green>История перемещения сотрудников по столовой</h3>

<?php
ini_set('display_errors',0);
error_reporting(E_ALL);


$date=$_GET['TimeVal'];
echo '<b>от: </b>'.$date[0].' <b>до: </b>'.$date[1].'<br>';
include('F:\web\htdocs\st\head.php');

$tsql2="SELECT OwnerName,Owner
from dbo.pMark order by OwnerName";
$stmt2=sqlsrv_query($conn,$tsql2,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 

SELECT 
 max(OwnerName) as Name 
	  ,max(TimeVal)as Time ,count(HozOrgan) as Quant
  
  FROM [Orion].[dbo].[pMark] join [Orion].[dbo].pLogData on pLogData.HozOrgan=pMark.Owner where  DoorIndex=36 and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' 
    group by HozOrgan,Orion.dbo.pMark.OwnerName

  order by OwnerName

$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName,Contents
FROM [Orion].[dbo].pLogData join [Orion].[dbo].pMark on pLogData.HozOrgan=pMark.Owner join [Orion].[dbo].[Events] on pLogData.Event=Events.Event
where DoorIndex=36 and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by OwnerName";

//where DoorIndex=36 and HozOrgan=$_GET[id] and TimeVal >=$_GET[TimeVal] and TimeVal<=$_GET[TimeVal] order by TimeVal";
$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

//TimeVal >='04.12.2019'



echo 'Records: '.sqlsrv_num_rows($stmt);
echo'</br>';
echo '<a href=/>Список сотрудников</a>';

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
	
	echo '<div class=""style="width:; height:;float:left; outline:1px solid red;margin-right:5px">';
		echo '<div class="cl-common"style="width:700px; display: table;height:;float:left; border-top:1px solid ;">';
	$i=1;
	
 for($row=1;$row = sqlsrv_fetch_array($stmt);$row++){//echo'<pre>';print_r($row);echo'</pre>';
//echo $row['HozOrgan'];
		echo'<div class=cl style="outline:1px solid green;width:40px;;float:left;display:block; ">';
		echo $i++;
		echo'</div>';

		echo'<div class=cl style="outline:1px solid black;width:350px;float:left;">';	
		echo"<text>$row[OwnerName]		</text>";
		echo'</div>';
		
		echo'<div class=cl style="outline:1px solid black;width:150px;float:left;">';	
		echo'<text>'.count($row['HozOrgan'])		.'</text>';
		echo'</div>';

		echo'<div class=cl style="outline:1px solid green;width:130px;;float:left; ">';
		echo $row['TimeVal']->format('Y-m-d H:i');
		echo'</div>';
		
		//echo'<div class=cl style="outline:1px solid green;width:47px;;float:left; ">';
		//echo "<a href=item.php?id=$row[HozOrgan]&TimeVal=03.12.2019&TimeVal=05.12.2019>specify</a>";
		//echo'</div>';	
//$_GET['HozOrgan']=$row['HozOrgan'];

}		
	
echo '<hr class=line>';
echo '</div>';echo '</div>';
 ?>	
<div class=""style="position:fixed;top:5px;">
<form action="" method="get" class="" >
<select name="" >
	
<?php 
	
	 ?>	
	<b>от: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	<b>до: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">

	
<input type="submit"value=Найти  >

</form>

</div>
