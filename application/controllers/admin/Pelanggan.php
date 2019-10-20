<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $s_login = $this->session->status;
        /*if($s_login !== 'logged'){
            redirect('auth/login');
        }*/
    }

    private $data;

	public function index()
	{
        $data['title'] = 'Pelanggan ';
        $data['data'] = $this->db->get('pelanggan')->result_array();
        $this->load->view('admin/pelanggan_view', $data);
    }
        
    public function edit($id)
    {
        if(empty($id)){
            redirect('admin/pelanggan');
        }
        $data['pelanggan'] = $this->admin_model->pelanggan($id);
        $data['title'] = "EDIT ";
        $this->load->view('admin/edit_pelanggan_view', $data);
    }

    public function save($id)
    {
        if(isset($id))
        {
            $nama = $this->input->post('nama', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $this->admin_model->save_pelanggan($id, $nama, $alamat, $phone);
            redirect('admin/pelanggan');
        } else {
            redirect('admin/pelanggan');
        }
    }

}
