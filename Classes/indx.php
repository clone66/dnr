<?php
// Подключение класса для работы с Excel
require_once("head.php");
require_once("PHPExcel.php");
// Подключение класса для вывода данных в формате Excel
require_once("PHPExcel/Writer/Excel5.php");
$tsql="SELECT ID,Remark,DoorIndex,TimeVal,HozOrgan,OwnerName
FROM dbo.pMark join dbo.pLogData on pMark.Owner=pLogData.HozOrgan
where DoorIndex=36 order by TimeVal DESC";
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

$nm=$row['OwnerName'];
$nm=mb_convert_encoding($nm,"utf-8","Windows-1251");
$Remark=$row['Remark'];
$Remark=mb_convert_encoding($Remark,"utf-8","Windows-1251");

$date=$row['TimeVal']->format('Y-m-d H:i');

$mySheet->setCellValue("A$i", $nm);
$mySheet->setCellValue("B$i", $date);
$mySheet->setCellValue("C$i", $Remark);
$i++;



}

$mySheet->getColumnDimension('A')->setAutoSize(true) ;
$mySheet->getColumnDimension('B')->setAutoSize(true) ;



// HTTP-заголовки
header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=whoIswho.xls");

// Вывод файла
$objWriter = new PHPExcel_Writer_Excel5($myXls);
$objWriter->save("php://output");



?>