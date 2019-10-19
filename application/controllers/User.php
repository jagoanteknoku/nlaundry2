<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        redirect('user/pelanggan');
    }
        
    public function pelanggan()
    {
        $data['title'] = 'Pelanggan ';
        $data['data'] = $this->db->get('pelanggan')->result_array();
        $this->load->view('pelanggan_view', $data);
    }

    public function kurir()
    {
        $data['title'] = 'Kurir';
        $data['data'] = $this->db->get('kurir')->result_array();
        $this->load->view('kurir_view', $data);
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['data'] = $this->cek_model->get_transaksi();
        //print_r($data);
        $this->load->view('transaksi_view', $data);
    }

    public function edit_kurir($id)
    {
        $data['kurir'] = $this->user_model->kurir($id);
        $this->load->view('kurir_view', $data);

    }

    public function edit_pelanggan($id)
    {
        $data['pelanggan'] = $this->user_model->pelanggan($id);
        $this->load->view('pelanggan_view', $data);
        
    }

    public function edit_transaksi($id)
    {
        $data['transaksi'] = $this->user_model->transaksi($id);
        $this->load->view('transaksi_view', $data);

    }

}
