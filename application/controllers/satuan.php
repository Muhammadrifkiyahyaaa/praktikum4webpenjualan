<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data = array(
            'title' => 'Master Satuan',
            'satuan' => $this->Satuan_model->getAll(),
            'content' => 'satuan/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambah Satuan',
            'content' => 'satuan/add_form'
        );
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        if ($this->Satuan_model->save()) {
            $this->session->set_flashdata('success', 'Data satuan berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data satuan!');
        }
        redirect('satuan');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Satuan',
            'satuan' => $this->Satuan_model->getById($id),
            'content' => 'satuan/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function update()
    {
        $id = $this->input->post('id', TRUE);
        if ($this->Satuan_model->update($id)) {
            $this->session->set_flashdata('success', 'Data satuan berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah data satuan!');
        }
        redirect('satuan');
    }

    public function delete($id)
    {
        if ($this->Satuan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data satuan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data satuan!');
        }
        redirect('satuan');
    }
}