<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('cek_model');
        $s_login = $this->session->status;
        if($s_login !== 'logged'){
            redirect('auth/login');
        }
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
        $data['pelanggan'] = $this->db->get('pelanggan')->result_array();
        $data['kurir'] = $this->db->get('kurir')->result_array();
        $data['status'] = $this->db->get('status')->result_array();
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['transaksi'] = $this->cek_model->get_data($id);
        $this->load->view('admin/edit_transaksi_view', $data);

    }

    public function save($id)
    {
        if($this->input->post('save'))
        {
            $pelanggan  = $this->input->post('pelanggan', TRUE);
            $kurir      = $this->input->post('kurir', TRUE);
            $berat      = $this->input->post('berat', TRUE);
            $status     = $this->input->post('status', TRUE);
            $tglmasuk   = $this->input->post('datemasuk', TRUE);
            $tglkeluar  = $this->input->post('datekeluar', TRUE);
        } else {
            redirect('admin/transaksi');
        }
    }

}
