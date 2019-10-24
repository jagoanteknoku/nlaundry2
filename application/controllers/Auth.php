<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $s_login = $this->session->status;
    }

	public function index()
	{
        if($s_login !== 'logged'){
            redirect('auth/login');
        }else{
            redirect('admin');
        }
            
    }
        
    public function login()
    {
        $this->load->view('auth_view');
    }

    public function auth_login()
    {
        $user = $this->input->post('username', TRUE);
        $paswd = $this->input->post('password', TRUE);
        if($this->admin_model->auth_login($user, $paswd)){
            $this->session->set_userdata(array('status' => 'logged'));
            redirect('admin/pelanggan');
        } else {
            $this->session->set_flashdata(array('message' => 'Username atau Password Salah !!'));
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
    }

}
