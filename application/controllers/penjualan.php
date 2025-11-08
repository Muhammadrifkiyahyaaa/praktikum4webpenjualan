<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller {

    public function index()
    {
        // Load data customer jika dibutuhkan
        $data['customer'] = $this->db->get('customer')->result_array();

        // Tampilkan view
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        // proses simpan transaksi (bisa dikosongkan dulu)
        echo "Transaksi berhasil disimpan.";
    }
}
