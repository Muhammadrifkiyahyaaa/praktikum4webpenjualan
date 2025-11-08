<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kategori extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title'=> 'view data Kategori',
            'userlog'=> infologin(),
            'kategori'=> $this->kategori_model->getAll(),
            'content'=>'kategori/index'
        );
        $this->load->view('template/main',$data);
    }
    public function add()
    {
        $data = array(
            'title'=> 'Tambah Data Kategori',
            'content'=> 'Kategori/add_form'
        );
        $this ->load->view('template/main',$data);
    }
    public function save()
    {
        $this->kategori_model->save();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data Kategori Berhasil Disimpan");
        }
        redirect('kategori');
    }
    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Kategori',
            'kategori' => $this->kategori_model->getById($id),
            'content' => 'kategori/edit_form'
        );
        $this->load->view('template/main',$data);
    }
   public function edit()
    {
    $this->kategori_model->editData();
    if($this->db->affected_rows()>0){
        $this->session->set_flashdata('success',"Data Kategori Berhasil di Update");
    }
    redirect('kategori');
    }
    function delete($id)
    {
        $this->kategori_model->delete($id);
        redirect('kategori');
    }
    
}