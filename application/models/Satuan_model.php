<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    protected $_table ='satuan';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primary => $id])->row();
    }

    public function save()
    {
        $data = array(
            'name' => htmlspecialchars($this->input->post('name', TRUE)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', TRUE)),
        );
        return $this->db->insert($this->_table, $data);
    }

    public function update($id)
    {
        $data = array(
            'name' => htmlspecialchars($this->input->post('name', TRUE)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', TRUE)),
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