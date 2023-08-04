<?php
// memanggil library FPDF
require('report/fpdf.php');
include('configdb.php');
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Data Order',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(50,7,'id_order' ,1,0,'C');
$pdf->Cell(35,7,'id_user',1,0,'C');
$pdf->Cell(30,7,'jumlah',1,0,'C');
$pdf->Cell(40,7,'catatan',1,0,'C');
$pdf->Cell(25,7,'nama produk',1,0,'C');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($mysqli,"SELECT  * FROM tbl_order");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(50,6, $d['id_order'],1,0);
  $pdf->Cell(35,6, $d['id_user'],1,0);  
  $pdf->Cell(30,6, $d['jumlah'],1,0);
  $pdf->Cell(40,6, $d['catatan'],1,0);  
  $pdf->Cell(25,6, $d['nama_produk'],1,1);
}
 
$pdf->Output();
 
?>