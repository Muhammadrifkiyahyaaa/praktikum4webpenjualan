<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class barang extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'userlog'=> infologin(),
            'barang'=> $this->Barang_model->getAll(),
            'content'=>'Barang/index'
        );
        $this->load->view('template/main',$data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Barang',
            'kategori' => $this->db->get('kategori')->result_array(),
            'satuan' => $this->db->get('satuan')->result_array(),
            'supplier' => $this->db->get('supplier')->result_array(),
            'content'=> 'barang/add_form'
        );
        $this ->load->view('template/main',$data);
    }
    public function save()
    {
        $this->Barang_model->save();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('success','Data Barang berhasil disimpan');
        }
        redirect('barang');
    }
    public function getedit($id)
{
    $data = array(
        'title' => 'Update Data Barang',
        'kategori' => $this->db->get('kategori')->result_array(),
        'satuan' => $this->db->get('satuan')->result_array(),
        'supplier' => $this->db->get('supplier')->result_array(),
        'barang' => $this->Barang_model->getById($id),
        'content' => 'barang/edit_form'
    );
    $this->load->view('template/main', $data);
    }
    public function update()
    {
    $id = $this->input->post('id', TRUE);

    if ($this->Barang_model->update($id)) {
        $this->session->set_flashdata('success', 'Data barang berhasil diubah!');
    } else {
        $this->session->set_flashdata('error', 'Gagal mengubah data barang!');
    }
    
    redirect('barang');
    }
    public function delete($id)
    {
    if ($this->Barang_model->delete($id)) {
        $this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data barang!');
    }
    redirect('barang');
    }
}