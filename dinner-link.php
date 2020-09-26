<?php
//ini_set('display_errors',0);
//error_reporting(E_ALL);
session_start();


	
?>
<a href = "logout.php" tite = "Logout">Выйти</a>
<head>


<title>
	Столовая online
</title>

<script type="text/javascript" src="js/jquery.min.js"></script>
 <meta http-equiv="Refresh" content="" />
		<style>
div.cl{
	height:19px;
	box-sizing: border-box;
	padding:2px;
	
}	
.cl text{
	font-size:13px;
	font-family:Arial;
	}

div.cl1{
	height:19px;
	
}
.inp_search{
	float:;
	.cl-common{}
	.common{}
}	.clear{clear: both;}
.line{
	
	margin:auto;
}
		
        </style>

		<script type="text/javascript">

</script>
<script type="text/javascript">
var list_div = document.getElementsByTagName("div");
background_color = '#EAF2D3';
for (var i=0; i<list_div.length; i++){
	if (list_div[i].className=="cl nth") {
		list_div[i].style.backgroundColor=background_color;
		if (background_color=='white') background_color = '#EAF2D3';
		else background_color='white';
	}
}
</script>
</head>
<body>
<?php



include('F:\web\htdocs\st\head.php');

$date=date('d.m.Y');
$tsql="SELECT TOP 40 [TimeVal],Contents,Name,FirstName,MidName
FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID join [Orion].[dbo].[Events] on pLogData.Event=Events.Event
where DoorIndex='36' and Contents='Доступ предоставлен' and TimeVal >='$date' and TimeVal<='$date 23:59:59.000' order by TimeVal DESC";


$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 
echo'</br>';
echo 'Сегодня: '.$date;echo'</br>';
#$records= 'Всего записей: '.sqlsrv_num_rows($stmt);
#echo $records;
echo'</br>';
echo '<a style=text-decoration:;font-size:17px;color:blue href=dinner-card.php>Общее количество по заданному времени</a>';
echo'</br>';
echo '<a style=text-decoration:;font-size:17px;color:blue href=item.php>Одиночная запись</a>';
echo'<br/>';
echo date('H:i:s');
echo'</br>';//'10.01.2020'

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
	
	echo '<div id="main"style="width:; height:;float:left; outline:;margin-right:5px">';

	echo '<div id="cl-common"style="width:650px; height:;float:left; border:;">';
	$i=1;
			echo '<div id=""class="head-bl" style="width:630px; height:;float:; border:1px solid grey;">';
			
		echo'</div>';
		
	
	
	for($row=1;$row = sqlsrv_fetch_array($stmt);$row++)://echo'<pre>';print_r($row);echo'</pre>';
		//echo count($row['OwnerName']);

		
		echo '<div class="cl"style="border-bottom:1px solid grey;border-right:1px solid;width:40px;height:;float:left;padding:px">';
		echo $i++;
		echo'</div>';

		
		echo'<div id=""class="cl nth" style="border-bottom:1px solid grey;width:300px;float:left;">';	
				echo"<text>$row[Name] $row[FirstName] $row[MidName]		</text>";
		echo'</div>';

		#elseif($row['Contents']=='Доступ отклонен'){
		echo'<div class="cl" style="border-bottom:1px solid black;border-left:1px solid;width:150px;float:left;">';	
		echo"<text>$row[Contents]		</text>";
		echo'</div>';#}
			
		#elseif($row['Contents']=='Доступ отклонен'){
		echo'<div class="cl" style="border-right:1px solid green;border-bottom:1px solid green;border-left:1px solid green;width:140px;;float:left; ">';
		echo $row['TimeVal']->format('d.m.Y / H:i');
		echo'</div>';#}else{null;}
		

	endfor;
		
	


	 echo '</div>';echo '</div>';

sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);

//mssql_close($conn);
?>


</body>
