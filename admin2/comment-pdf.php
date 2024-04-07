<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT comment_id,comment_desc,thread_id,commented_by,comment_time FROM comments");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='discuss_tech' 
AND `TABLE_NAME`='comments'
and `COLUMN_NAME` in ('comment_id','comment_desc','thread_id','commented_by','comment_time')");

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',5);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(30,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,12,$column,1);
}


$pdf->Output();
?>

