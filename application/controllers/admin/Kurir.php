<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

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
        $data['title'] = 'Kurir';
        $data['data'] = $this->db->get('kurir')->result_array();
        $this->load->view('admin/kurir_view', $data);
    }

    public function edit($id)
    {
        $data['kurir'] = $this->user_model->kurir($id);
        $this->load->view('admin/edit_kurir_view', $data);

    }

}
