<?php
// Подключение класса для работы с Excel
require_once("head.php");
require_once("PHPExcel.php");
// Подключение класса для вывода данных в формате Excel
require_once("PHPExcel/Writer/Excel5.php");

#15.03.2021
$date=$_GET['TimeVal'];

$tsql="SELECT ID,TimeVal,Name,FirstName,MidName,Contents
FROM Orion.dbo.pLogData join Orion.dbo.pList on pLogData.HozOrgan=pList.ID join [Orion].[dbo].[Events] on pLogData.Event=Events.Event
where DoorIndex='36'  and TimeVal >='$date[0]' and TimeVal<='$date[0] 23:59:59.000' order by TimeVal DESC";

$stmt=sqlsrv_query($conn,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
//echo sqlsrv_num_rows($stmt);
// Создание объекта класса PHPExcel
$myXls = new PHPExcel();
// Указание на активный лист
$myXls->setActiveSheetIndex(0);
// Получение активного листа
$mySheet = $myXls->getActiveSheet();
// Указание названия листа книги
$mySheet->setTitle("Новый лист");

$rows = array();
while ($row = sqlsrv_fetch_array($stmt)) {
$rows[] = $row;
}$i=1;
foreach($rows as $row){

$nm=$row['Name'];
$sur_nm=$row['FirstName'];
$lst_nm=$row['MidName'];
$access=$row['Contents'];
$nm=mb_convert_encoding($nm,"utf-8","Windows-1251");
$sur_nm=mb_convert_encoding($sur_nm,"utf-8","Windows-1251");
$lst_nm=mb_convert_encoding($lst_nm,"utf-8","Windows-1251");
$access=mb_convert_encoding($access,"utf-8","Windows-1251");

$date=$row['TimeVal']->format('Y-m-d H:i');

$mySheet->setCellValue("A$i", $nm);
$mySheet->setCellValue("B$i", $sur_nm);
$mySheet->setCellValue("C$i", $lst_nm);

$mySheet->setCellValue("D$i", $date);
$date = explode(' ',$date);

if($access=='Доступ отклонен'){
$mySheet->setCellValue("E$i", $access);}
	else false;
$i++;

}

$mySheet->getColumnDimension('A')->setAutoSize(true) ;
$mySheet->getColumnDimension('B')->setAutoSize(true) ;
$mySheet->getColumnDimension('C')->setAutoSize(true) ;
$mySheet->getColumnDimension('D')->setAutoSize(true) ;
$mySheet->getColumnDimension('E')->setAutoSize(true) ;

// HTTP-заголовки
header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=обед_$date[0].xls");

// Вывод файла
$objWriter = new PHPExcel_Writer_Excel5($myXls);
$objWriter->save("php://output");

?>