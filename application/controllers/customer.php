<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data = array(
            'title' => 'Master Pelanggan',
            'customer' => $this->Customer_model->getAll(),
            'content' => 'customer/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambah Pelanggan',
            'content' => 'customer/add_form'
        );
        $this->load->view('template/main', $data);
    }
    public function laporan()
    {
        $data =  array(
            'title'=> ' Tambah Laporan data kuatomer',
            'content'=> 'customer/laporan'
        );
        $this ->load->view('template/main',$data);
    }

    public function save()
    {
        if ($this->Customer_model->save()) {
            $this->session->set_flashdata('success', 'Data pelanggan berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data pelanggan!');
        }
        redirect('customer');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Pelanggan',
            'customer' => $this->Customer_model->getById($id),
            'content' => 'customer/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function update()
    {
        $id = $this->input->post('id', TRUE);
        if ($this->Customer_model->update($id)) {
            $this->session->set_flashdata('success', 'Data pelanggan berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah data pelanggan!');
        }
        redirect('customer');
    }

    public function delete($id)
    {
        if ($this->Customer_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data pelanggan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data pelanggan!');
        }
        redirect('customer');
    }
}