<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT thread_id,thread_title,thread_desc,imgFileName,thread_cat_id,thread_user_id,timestamp FROM thread");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='discuss_tech' 
AND `TABLE_NAME`='thread'
and `COLUMN_NAME` in ('thread_id','thread_title','thread_desc','imgFileName','thread_cat_id','thread_user_id','timestamp')");

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(70,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(70,12,$column,1);
}




$pdf->Output();
?>

