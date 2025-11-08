<?php
// application/views/laporan/report_penjualan.php

// Inisiasi FPDF dengan format Landscape (L)
$pdf = new FPDF('L','mm','A4'); 
$pdf->AddPage();

// === HEADER ===
// SALIN KODE CUSTOM HEADER FPDF ANDA DI SINI
// (Yang berisi logo keranjang dan KOOPERASI HARUM MANIS BERSATU)
// Pastikan kode header FPDF Anda berhenti dan memindahkan kursor ke Y=40.

$pdf->SetY(40);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'LAPORAN TRANSAKSI PENJUALAN',0,1,'C');
$pdf->Ln(5);

// HEADER TABEL
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(255, 204, 204); // Warna latar header (Merah Muda Muda)
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(35, 7, 'INVOICE', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'TANGGAL', 1, 0, 'C', true);
$pdf->Cell(45, 7, 'CUSTOMER', 1, 0, 'C', true);
$pdf->Cell(70, 7, 'NAMA BARANG', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'HARGA JUAL', 1, 0, 'C', true);
$pdf->Cell(15, 7, 'QTY', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'SUBTOTAL', 1, 1, 'C', true);

// ISI TABEL
$i = 1;
$current_invoice = null;
$grand_total = 0;

foreach ($penjualan_detail as $d){ 
    $pdf->SetFont('Times','',9);
    
    // Periksa apakah invoice ini berbeda dari baris sebelumnya
    if ($d['invoice'] !== $current_invoice) {
        $pdf->Cell(10,6,$i++,1,0,'C');
        $pdf->Cell(35,6,$d['invoice'],1,0,'L'); 
        $pdf->Cell(25,6,$d['tanggal'],1,0,'C');
        $pdf->Cell(45,6,$d['customer_name'],1,0,'L');
        $current_invoice = $d['invoice'];
    } else {
        // Jika invoice sama, cetak cell kosong
        $pdf->Cell(10,6,'',1,0); 
        $pdf->Cell(35,6,'',1,0); 
        $pdf->Cell(25,6,'',1,0);
        $pdf->Cell(45,6,'',1,0);
    }
    
    // Detail Barang
    $pdf->Cell(70,6,$d['barang_name'],1,0,'L');
    $pdf->Cell(20,6,number_format($d['harga']),1,0,'R');
    $pdf->Cell(15,6,$d['qty'],1,0,'C');
    $pdf->Cell(25,6,number_format($d['subtotal']),1,1,'R'); // Pindah baris
    
    // Hitung Grand Total (Total dari semua subtotal di detail_jual)
    $grand_total += $d['subtotal'];
}

// FOOTER TOTAL KESELURUHAN
$pdf->SetFont('Times','B',10);
$pdf->Cell(220, 7, 'TOTAL PENJUALAN KESELURUHAN', 1, 0, 'R', true);
$pdf->Cell(25, 7, number_format($grand_total), 1, 1, 'R', true);


$pdf->Output('laporan_penjualan.pdf','I');
?>