<?php
// application/views/customer/report_kustom.php

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// === PENGATURAN GAMBAR ===
$image_path = FCPATH . 'assets/images/cart.png'; 
$image_width = 20; 
$start_x = 10;     
$start_y = 10;     

// Sisipkan Gambar: 
$pdf->Image($image_path, $start_x, $start_y, $image_width, 0); 

// === HEADER PERUSAHAAN (TEKS DI SAMPING GAMBAR) ===
$text_start_x = $start_x + $image_width + 5; 
$pdf->SetY($start_y); 
$pdf->SetX($text_start_x); 
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,5,'KOOPERASI HARUM MANIS BERSATU',0,1,'C'); 

$pdf->SetX($text_start_x); 
$pdf->SetFont('Times','B',8);
$pdf->Cell(0,5,'WEBSITE : WWW.HARUMBERSATU.COM / E-MAIL : ADMIN@HARUMBERSATU.COM',0,1,'C');

$pdf->SetX($text_start_x); 
$pdf->Cell(0,5,'Banjarmasin Utara Telp. / Fax : 081349685149 / KOOPERASI HARUM MANIS BERSATU',0,1,'C');

$pdf->Ln(2); 

// Garis Pemisah
$pdf->SetLineWidth(0);
$pdf->Line(10,32,197,32);
$pdf->SetLineWidth(1);
$pdf->Line(10,33,197,33);
$pdf->Cell(0,10,'',0,1);

// === JUDUL LAPORAN ===
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN DATA CUSTOMER',0,1,'C');
$pdf->Cell(30,8,'',0,1);

// === HEADER TABEL ===
$pdf->SetFont('Times','B',9);
$pdf->Cell(7,6,'NO',1,0,'C');
$pdf->Cell(37,6,'EMAIL',1,0,'C'); 
$pdf->Cell(37,6,'NAMA CUSTOMER',1,0,'C');
$pdf->Cell(30,6,'TELP',1,0,'C');
$pdf->Cell(45,6,'ALAMAT',1,1,'C');

// === ISI TABEL ===
$i = 1;
foreach ($data as $d){ 
    $pdf->SetFont('Times','',9);
    $pdf->Cell(7,6,$i++,1,0);
    $pdf->Cell(37,6,$d['nik'],1,0); 
    $pdf->Cell(37,6,$d['name'],1,0);
    $pdf->Cell(30,6,$d['telp'],1,0);
    $pdf->Cell(45,6,$d['alamat'],1,1);
}

// === OUTPUT PDF ===
$pdf->SetFont('Times','',10);
$pdf->Output('laporan_kustom.pdf','I');
?>