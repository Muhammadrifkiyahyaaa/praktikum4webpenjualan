<?php
// application/views/customer/report_header_only.php

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// === PENGATURAN GAMBAR ===
$image_path = FCPATH . 'assets/images/cart.png'; 
$image_width = 20; // Lebar gambar 20 mm
$start_x_img = 10; // Posisi X gambar
$start_y_img = 10; // Posisi Y gambar

// Sisipkan Gambar: 
$pdf->Image($image_path, $start_x_img, $start_y_img, $image_width, 0); 


// === PENGATURAN TEKS HEADER ===
$text_start_x = $start_x_img + $image_width + 5; // Posisi X teks: 35mm
$header_width = 162; // Lebar Cell untuk teks (197 - 10 - 20 - 5 = 162mm)

// 1. BARIS PERTAMA: NAMA PERUSAHAAN (Diatas Tengah Vertikal)
// Y diset lebih tinggi agar center dengan gambar
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
$pdf->Cell($header_width, 4, 'Banjarmasin Utara Telp. / Fax : 081349685149 / "KOOPERASI HARUM MANIS BERSATU"', 0, 1, 'C');

// Pindah ke baris baru setelah header selesai (untuk garis pemisah)
$pdf->Ln(2); 

// Garis Pemisah (Koordinat X dan Y disesuaikan agar rapi)
$pdf->SetLineWidth(0);
$pdf->Line(10,32,197,32); 
$pdf->SetLineWidth(1);
$pdf->Line(10,33,197,33); 


$pdf->Cell(0,10,'',0,1);


$pdf->Output('laporan_header_only.pdf','I');
?>