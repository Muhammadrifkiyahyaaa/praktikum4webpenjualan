<?php
// application/views/customer/report_customer_full.php

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// === PENGATURAN GAMBAR ===
$image_path = FCPATH . 'assets/images/cart.png'; 
$image_width = 20;   // Lebar gambar
$start_x_img = 10;   // Posisi X gambar
$start_y_img = 10;   // Posisi Y gambar

// Sisipkan Gambar: 
$pdf->Image($image_path, $start_x_img, $start_y_img, $image_width, 0); 


// === PENGATURAN TEKS HEADER ===
$text_start_x = $start_x_img + $image_width + 5; // Posisi X teks: 35mm
$header_width = 162; // Lebar Cell untuk teks: 162mm (agar rata tengah di sisa ruang)

// 1. BARIS PERTAMA: NAMA PERUSAHAAN (Diatas Tengah Vertikal)
$pdf->SetY(13); 
$pdf->SetX($text_start_x); 
$pdf->SetFont('Times','B',20);
$pdf->Cell($header_width, 5, 'KOOPERASI HARUM MANIS BERSATU', 0, 1, 'C'); 

// 2. BARIS KEDUA: WEBSITE / EMAIL
$pdf->SetX($text_start_x); 
$pdf->SetFont('Times','B',8);
$pdf->Cell($header_width, 4, 'WEBSITE : WWW.HARUMBERSATU.COM / E-MAIL : ADMIN@HARUMBERSATU.COM', 0, 1, 'C');

// 3. BARIS KETIGA: ALAMAT / TELP
$pdf->SetX($text_start_x); 
$pdf->Cell($header_width, 4, 'Banjarmasin Utara Telp. / Fax : 081349685149 / KOOPERASI HARUM MANIS BERSATU', 0, 1, 'C');


// Garis Pemisah (Dipindahkan ke bawah setelah teks selesai)
$pdf->Ln(2); 
$pdf->SetY(32); // Atur posisi Y garis
$pdf->SetX(10); // Atur posisi X garis agar dari tepi
$pdf->SetLineWidth(0);
$pdf->Line(10, $pdf->GetY(), 197, $pdf->GetY()); // Garis tipis
$pdf->SetLineWidth(1);
$pdf->Line(10, $pdf->GetY() + 1, 197, $pdf->GetY() + 1); // Garis tebal


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
$pdf->Output('laporan_customer_full.pdf','I');
?>