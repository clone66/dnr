<?
require_once("\st\head.php");
?>
<head>


<title>
	Перемещение сотрудников
</title>
 <meta http-equiv="Refresh" content="" />
		<style>
body{
	
}		
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
		<script type="text/javascript" src="/js/tcal_en.js"></script> 
		<link rel="stylesheet" type="text/css" href="/css/tcal.css" />
</head>
<?php
ini_set('display_errors',0);
  


?>
<?php
$date=$_GET['TimeVal'];







?>


<div class=""style="position:relative;top:5px;float:;">

<form action="din.php" method="get" class="" >
	<p>
		<b>Выбрать день</b>
	</p>
	<input type="text"class="tcal"placeholder="" id="myDate" value="<?= date('d.m.Y');?>" name="TimeVal[]">
	

	<?php
	//sqlsrv_free_stmt($stmt);sqlsrv_free_stmt($stmt2);
	//sqlsrv_close( $conn );
	?>
<input type="submit"value=Загрузить  >

</form>

</div style="float:left";>

<div>
	<a style="text-decoration:"href="\din-t.php">Назад</a>
</div>


