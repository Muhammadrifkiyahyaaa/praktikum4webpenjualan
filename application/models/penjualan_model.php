<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan_model extends CI_Model {

    public function get_all_customer()
    {
        $this->db->select('id, nik, name');
        return $this->db->get('customer')->result_array();
    }

    public function get_barang_by_barcode($barcode)
    {
        $this->db->select('b.id, b.barkode, b.name, b.harga_jual, b.stok, s.name as satuan_name');
        $this->db->from('barang b');
        $this->db->join('satuan s', 's.id = b.satuan_id');
        $this->db->where('b.barkode', $barcode);
        return $this->db->get()->row_array();
    }
    
    public function simpan_transaksi($data_penjualan, $data_detail)
    {
        $this->db->insert('penjualan', $data_penjualan);
        $penjualan_id = $this->db->insert_id();

        foreach ($data_detail as &$detail) {
            $detail['penjualan_id'] = $penjualan_id;
        }
        $this->db->insert_batch('detail_jual', $data_detail);
        
        $this->update_stok($data_detail);

        return TRUE;
    }

    private function update_stok($data_detail)
    {
        foreach ($data_detail as $detail) {
            $barang_id = $detail['barang_id'];
            $qty_terjual = $detail['qty'];

            $this->db->set('stok', 'stok - ' . $qty_terjual, FALSE);
            $this->db->where('id', $barang_id);
            $this->db->update('barang');
        }
    }
}