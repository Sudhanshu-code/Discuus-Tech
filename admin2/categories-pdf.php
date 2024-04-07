<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT categories_id,categories_name,categories_description FROM categories");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='discuss_tech' 
AND `TABLE_NAME`='categories'
and `COLUMN_NAME` in ('categories_id','categories_name','categories_description')");

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

