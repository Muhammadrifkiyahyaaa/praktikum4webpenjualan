<?php
// application/views/laporan/report_pembelian.php

$pdf = new FPDF('L','mm','A4'); // Menggunakan format Landscape (L) agar kolom banyak muat
$pdf->AddPage();

// === HEADER ===
// ... (Salin kode header FPDF (Koperasi Harum Manis Bersatu) Anda di sini) ...
// Saya asumsikan kursor berada di Y=40 setelah header.

$pdf->SetY(40);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN TRANSAKSI PEMBELIAN',0,1,'C');
$pdf->Ln(5);

// HEADER TABEL
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(200, 220, 255); // Warna latar header
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(35, 7, 'INVOICE', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'TANGGAL', 1, 0, 'C', true);
$pdf->Cell(45, 7, 'SUPPLIER', 1, 0, 'C', true);
$pdf->Cell(70, 7, 'NAMA BARANG', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'HARGA BELI', 1, 0, 'C', true);
$pdf->Cell(15, 7, 'QTY', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'SUBTOTAL', 1, 1, 'C', true);

// ISI TABEL
$i = 1;
$current_invoice = null;

foreach ($pembelian_detail as $d){ 
    $pdf->SetFont('Times','',9);
    
    // Cetak Nomor, Invoice, Tanggal, dan Supplier hanya sekali per invoice
    if ($d['invoice'] !== $current_invoice) {
        $pdf->Cell(10,6,$i++,1,0,'C');
        $pdf->Cell(35,6,$d['invoice'],1,0,'L'); 
        $pdf->Cell(25,6,$d['tanggal'],1,0,'C');
        $pdf->Cell(45,6,$d['supplier_name'],1,0,'L');
        $current_invoice = $d['invoice'];
    } else {
        // Jika invoice sama, cetak cell kosong untuk kolom tersebut
        $pdf->Cell(10,6,'',1,0); 
        $pdf->Cell(35,6,'',1,0); 
        $pdf->Cell(25,6,'',1,0);
        $pdf->Cell(45,6,'',1,0);
    }
    
    // Detail Barang
    $pdf->Cell(70,6,$d['barang_name'],1,0,'L');
    $pdf->Cell(20,6,number_format($d['harga']),1,0,'R');
    $pdf->Cell(15,6,$d['qty'],1,0,'C');
    $pdf->Cell(25,6,number_format($d['subtotal']),1,1,'R'); // 1 di akhir berarti pindah baris
}

$pdf->Output('laporan_pembelian.pdf','I');
?>