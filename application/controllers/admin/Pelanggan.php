<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
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
        $data['pelanggan'] = $this->user_model->pelanggan($id);
        $this->load->view('admin/edit_pelanggan_view', $data);
        
    }

}
