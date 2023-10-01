<?php
session_start();
require_once('../../tcpdf/tcpdf.php');


// Tạo đối tượng TCPDF
$pdf = new TCPDF();

$pdf->setHeaderFont(Array('dejavusans', '', 10, '', false));
$pdf->setFooterFont(Array('dejavusans', '', 8, '', false));
$pdf->SetFont('dejavusans', '', 10, '', false);


// Thêm trang và ghi HTML vào tệp PDF
$pdf->AddPage();
$pdf->writeHTML($_SESSION["content"], true, false, true, false, '');

// Xuất tệp PDF
$pdf->Output('HoaDon.pdf', 'I');
?>
