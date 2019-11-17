<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $s_login = $this->session->status;
        if($s_login !== 'logged'){
            redirect('auth/login');
        }
    }

    private $data;

	public function index()
	{
        $data['penghasilan'] = $this->dashboard_model->penghasilan_hari_lalu(0);
        $data['hari1'] = $data['hari2'] = $this->dashboard_model->hari_lalu(7);
        $data['trs_masuk'] = $this->dashboard_model->laundry_masuk(7);
        $data['trs_keluar'] = $this->dashboard_model->laundry_keluar(7);
        $data['max_trs_masuk'] = max($data['trs_masuk']);
        $data['max_trs_keluar'] = max($data['trs_keluar']);
        $data['antrian'] = $this->dashboard_model->jumlah_status('0');
        $data['siap'] = $this->dashboard_model->jumlah_status('2');
        $data['selesai'] = $this->dashboard_model->jumlah_status('5');
        $this->load->view('admin/dashboard_view', $data);
    }

}
