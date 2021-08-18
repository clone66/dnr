<head>

		<style>
			div.cl{
				height:19px;
				
				box-sizing: border-box;
				
			}	
			.cl text{font-size:12px;}
			div.cl1{	height:19px;
				
				
			}	
.inp_search{
	float:;
	.cl-common{}
	.common{}
}	.clear{clear: both;}
		
        </style>
		<script>
		
		</script>
</head>

<?php
include('F:\web\htdocs\st\head.php');
$date=date('d.m.Y');
$tsql="SELECT top 100 [Owner],[OwnerName]
FROM [Orion].[dbo].[pMark] where GroupID!=1";

$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 
echo'</br>';
echo 'Records: '.sqlsrv_num_rows($stmt);
echo'</br>';
	echo '<div class="common"style="width:100%;">	
	<div class="inp_search">
		<form action="" method="get" class="" >
			<input type="text" autocorrect="off" autocapitalize="off" autocomplete="off" spellcheck="false" class="search_form_input"placeholder="Find item..." id="" value="">
			<button class="btn_find" type="submit"><span class="find">Find</span></button>
		</form>
	</div>
	
	<p class="">
		<a style=text-decoration:none;font-size:17px;color:blue href=alldoor.php>—мотреть историю перемещени€ сотрудника</a>
		
	</p>
	
	<div class="clear">
	</div>';

	

	echo '<div class="cl-common"style="width:405px; height:;float:left; border:;">';

 for($row=1;$row = sqlsrv_fetch_array($stmt);$row++)://echo'<pre>';print_r($row);echo'</pre>';
//echo count($row['OwnerName']);
	echo'<div class=cl style="outline:1px solid black;width:300px;float:left;">';
		echo"<text>$row[OwnerName]</text>";
		echo'</div>';



		//echo'<div class=cl style="outline:1px solid black;width:30px;float:left;">';	
		//echo "<a style=text-decoration:none;color:blue href=item.php?id=$row[Owner]>см.</a>";
		//echo'</div>';



		endfor;
		
		//echo'<div class=cl style="width:45px;outline:1px solid yellow;float:left; ">';
		//echo$row['HozOrgan'];
		//echo'</div>';							
	

	 echo '</div>';echo '</div>';
	
sqlsrv_free_stmt($stmt);  
sqlsrv_close($conn);

?>