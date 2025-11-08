<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    protected $_table ='barang';
    protected $primary = 'id';

    /**
     * Mengambil semua data barang dengan JOIN ke tabel satuan dan kategori
     * @return array
     */
    public function getAll()
    {
        // 1. Definisikan Query SQL dengan JOIN
        $sql = "SELECT 
                    a.id, 
                    a.barkode, 
                    a.name,
                    b.name AS satuan, 
                    c.name AS kategori, 
                    a.harga_beli, 
                    a.harga_jual, 
                    a.stok 
                FROM barang a 
                LEFT JOIN satuan b on a.satuan_id = b.id 
                LEFT JOIN kategori c ON a.kategori_id = c.id
                ORDER BY a.id ASC";

        // 2. JALANKAN QUERY
        $query = $this->db->query($sql);
        
        // 3. KEMBALIKAN HASILNYA SEBAGAI ARRAY OF OBJECTS
        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan array of objects
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }
    
    /**
     * Menyimpan data barang baru ke database
     * @return bool
     */
    public function save()
    {
        $data = array(
            // PERBAIKAN SINTAKS (Tanda kurung seimbang)
            'barkode' => htmlspecialchars($this->input->post('barkode', TRUE)),
            'name' => htmlspecialchars($this->input->post('name', TRUE)),
            'harga_beli' => htmlspecialchars($this->input->post('harga_beli', TRUE)),
            'harga_jual' => htmlspecialchars($this->input->post('harga_jual', TRUE)),
            'stok' => htmlspecialchars($this->input->post('stok', TRUE)),
            'kategori_id' => htmlspecialchars($this->input->post('kategori_id', TRUE)), 
            'satuan_id' => htmlspecialchars($this->input->post('satuan_id', TRUE)),    
            'supplier_id' => htmlspecialchars($this->input->post('supplier_id', TRUE)), 
            'user_id' => $this->session->userdata('id'),
        );
        return $this->db->insert($this->_table, $data);
    }
    public function getById($id)
    {
    return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function update($id)
{
    $data = array(
        'barkode' => htmlspecialchars($this->input->post('barkode', TRUE)),
        'name' => htmlspecialchars($this->input->post('name', TRUE)),
        'harga_beli' => htmlspecialchars($this->input->post('harga_beli', TRUE)),
        'harga_jual' => htmlspecialchars($this->input->post('harga_jual', TRUE)),
        'kategori_id' => htmlspecialchars($this->input->post('kategori_id', TRUE)),
        'satuan_id' => htmlspecialchars($this->input->post('satuan_id', TRUE)),
        'supplier_id' => htmlspecialchars($this->input->post('supplier_id', TRUE)),
        'user_id' => $this->session->userdata('id'),
    );
    
    $this->db->where($this->primary, $id); 
    return $this->db->update($this->_table, $data);
    }
    public function delete($id)
    {
    $this->db->where($this->primary, $id);
    return $this->db->delete($this->_table);
    }
}