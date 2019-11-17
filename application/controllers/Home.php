<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
		parent::__construct();
		$this->load->model('cek_model');
    }
	public function index()
	{
		$data['title'] = 'Otong Laundry';
		$this->load->view('home_view', $data);
		if($this->input->get('i_resi'))
		{
			$resi = $this->input->get('i_resi');
			redirect('cek/'.$resi);
		}
	}

	public function cek($resi)
	{
		$data['data'] = $this->cek_model->get_data($resi);
		if(empty($data['data'])){
			redirect('/');
		}
		$data['title'] = 'Otong Laundry';
        $this->load->view('cek_view', $data);
	}

}
