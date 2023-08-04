<?php
// memanggil library FPDF
require('report/fpdf.php');
include('configdb.php');
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Data Kategori',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(90,7,'id Kategori' ,1,0,'C');
$pdf->Cell(90,7,'Nama Kategori',1,0,'C');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($mysqli,"SELECT  * FROM tbl_kategori");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(90,6, $d['id_kategori'],1,0);
  $pdf->Cell(90,6, $d['nama_kategori'],1,1);  
}
 
$pdf->Output();
 
?>