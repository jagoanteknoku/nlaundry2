<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('cek_model');
        $s_login = $this->session->status;
        /*if($s_login !== 'logged'){
            redirect('auth/login');
        }*/
    }

    private $data;

	public function index()
	{
        $data['title'] = 'Transaksi';
        $data['data'] = $this->cek_model->get_transaksi();
        $this->load->view('admin/transaksi_view', $data);
    }

    public function edit($id)
    {
        $data['transaksi'] = $this->user_model->transaksi($id);
        $this->load->view('admin/edit_transaksi_view', $data);

    }

}
