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

$CurrentDate=date('d.m.Y');    


?>
<?php

//$date = date('m.d.Y', strtotime($_GET['TimeVal']));



?>

<script type= "text/javascript">

</script>

<?php
ini_set('display_errors',0);
error_reporting(E_ALL);

$date=$_GET['TimeVal'];

//var_dump($date);

?>

</br>
<h3>Количество сотрудников на предприятии</h3>
<?='<b>от: </b>'.$date[0].' <b>до: </b>'.$date[1].'<br>';?>
<a href='/'>Список сотрудников</a>
</br>
<?php

include('F:\web\htdocs\st\head.php');


$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName
FROM dbo.pLogData join pMark on pLogData.HozOrgan=pMark.Owner
where (DoorIndex=1 or DoorIndex=3 or DoorIndex=5 or DoorIndex=7 or DoorIndex=9 or DoorIndex=11)
and TimeVal >='$date[0]' and TimeVal<='$date[1] 23:59:59.000' order by TimeVal";

$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

//TimeVal >='22.01.2020'

echo 'Records: '.sqlsrv_num_rows($stmt);

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
	
	echo '<div class="cl-common"style="width:800px; display: table;height:;float:left; border-top:1px solid ;">';

	//if($id){$row['HozOrgan']=$row['OwnerName'];}					
	
echo '<hr class=line>';
echo '</div>';echo '</div>';

?>
<div class=""style="position:fixed;top:5px;">

<form action="" method="get" class="" >

	<b>от: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	<b>до: </b><input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>"name="TimeVal[]">

	
<input type="submit"value=Найти  >

</form>
</div>