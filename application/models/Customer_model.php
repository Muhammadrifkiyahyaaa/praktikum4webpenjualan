<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    protected $_table ='customer';
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
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'name' => htmlspecialchars($this->input->post('name', TRUE)),
            'telp' => htmlspecialchars($this->input->post('telp', TRUE)),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
        );
        return $this->db->insert($this->_table, $data);
    }

    public function update($id)
    {
        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'name' => htmlspecialchars($this->input->post('name', TRUE)),
            'telp' => htmlspecialchars($this->input->post('telp', TRUE)),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
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