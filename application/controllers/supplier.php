<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data = array(
            'title' => 'Master Supplier',
            'supplier' => $this->Supplier_model->getAll(),
            'content' => 'supplier/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambah Supplier',
            'content' => 'supplier/add_form'
        );
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        if ($this->Supplier_model->save()) {
            $this->session->set_flashdata('success', 'Data supplier berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data supplier!');
        }
        redirect('supplier');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Supplier',
            'supplier' => $this->Supplier_model->getById($id),
            'content' => 'supplier/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function update()
    {
        $id = $this->input->post('id', TRUE);
        if ($this->Supplier_model->update($id)) {
            $this->session->set_flashdata('success', 'Data supplier berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah data supplier!');
        }
        redirect('supplier');
    }

    public function delete($id)
    {
        if ($this->Supplier_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data supplier berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data supplier!');
        }
        redirect('supplier');
    }
}