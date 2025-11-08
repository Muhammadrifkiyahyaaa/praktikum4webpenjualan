<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat library PDF yang telah Anda buat
        $this->load->library('pdf'); 
    }

    /**
     * Fungsi untuk menghasilkan laporan data customer.
     * Menggunakan FPDF secara langsung di dalam controller.
     */
    public function customerlap()
    {
        // 1. Inisialisasi PDF
        $pdf = new FPDF('P','mm','A4'); // P: Portrait, mm: Satuan, A4: Ukuran kertas
        $pdf->AddPage();
        
        // 2. Judul Laporan
        $pdf->SetFont('Times','B',18);
        $pdf->Cell(0,5,'LAPORAN DATA CUSTOMER',0,1,'C');
        $pdf->Cell(30,8,'',0,1); // Jarak

        // 3. Header Tabel
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(7,6,'NO',1,0,'C');
        $pdf->Cell(37,6,'NIK',1,0,'C');
        $pdf->Cell(37,6,'NAMA CUSTOMER',1,0,'C');
        $pdf->Cell(30,6,'TELP',1,0,'C');
        $pdf->Cell(45,6,'ALAMAT',1,1,'C');

        // 4. Isi Tabel (Mengambil data dari database)
        $i = 1;
        // Ambil data dari tabel 'customer' (sesuai koreksi Anda)
        $data = $this->db->get('customer')->result_array(); 
        
        foreach ($data as $d){
            $pdf->SetFont('Times','',9);
            $pdf->Cell(7,6,$i++,1,0);
            $pdf->Cell(37,6,$d['nik'],1,0);
            $pdf->Cell(37,6,$d['name'],1,0);
            $pdf->Cell(30,6,$d['telp'],1,0);
            $pdf->Cell(45,6,$d['alamat'],1,1);
        }

        // 5. Output PDF (I: Inline/tampilkan di browser)
        $pdf->SetFont('Times','',10);
        $pdf->Output('laporan_customer.pdf','I');
    }
    public function headerlap()
    {
        $this->load->view('customer/report_header_only');
    }
    public function customerfull()
    {
        $data['data'] = $this->db->get('customer')->result_array(); 
        $this->load->view('customer/report_customer_full', $data); 
    }
    public function kustomkustom()
    {
        $data['data'] = $this->db->get('customer')->result_array(); 
        $this->load->view('customer/report_kustom', $data); 
    }


        public function laporan_pembelian()
    {
        
        $this->db->select('
            p.invoice, 
            p.tanggal, 
            s.name as supplier_name,
            db.qty, 
            db.harga, 
            db.subtotal, 
            b.name as barang_name
        ');
        $this->db->from('detail_beli db');
        $this->db->join('pembelian p', 'p.id = db.pembelian_id'); // Join ke tabel pembelian
        $this->db->join('supplier s', 's.id = p.supplier_id');   // Join ke tabel supplier
        $this->db->join('barang b', 'b.id = db.barang_id');      // Join ke tabel barang
        $this->db->order_by('p.invoice', 'ASC');

        $data['pembelian_detail'] = $this->db->get()->result_array();

        $this->load->view('laporan/report_pembelian', $data);
    }

    public function laporan_penjualan()
    {
        $this->db->select('
            pj.invoice, 
            pj.tanggal, 
            c.name as customer_name,
            dj.qty, 
            dj.harga, 
            dj.subtotal, 
            b.name as barang_name
        ');
        $this->db->from('detail_jual dj');
        $this->db->join('penjualan pj', 'pj.id = dj.penjualan_id'); // Join ke tabel penjualan
        $this->db->join('customer c', 'c.id = pj.custome_id');     // Join ke tabel customer
        $this->db->join('barang b', 'b.id = dj.barang_id');        // Join ke tabel barang
        $this->db->order_by('pj.invoice', 'ASC');

        $data['penjualan_detail'] = $this->db->get()->result_array();

        $this->load->view('laporan/report_penjualan', $data);
    }
}