<?php
include('database.php');

$database = new Database();
$result = $database->runQuery("SELECT user_id,username,timestamp FROM users");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='discuss_tech' 
AND `TABLE_NAME`='users'
and `COLUMN_NAME` in ('user_id','username','timestamp')");

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(60,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(60,12,$column,1);
}

$pdf->Output();
?>

