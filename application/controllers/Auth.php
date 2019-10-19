<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $s_login = $this->session->status;
    }

	public function index()
	{
        if($s_login !== 'logged'){
            redirect('auth/login');
        }else{
            redirect('user');
        }
            
    }
        
    public function login()
    {
        $user = $this->input->post('username');
        $paswd = $this->input->post('password');
        if($this->user_model->auth_login($user, $paswd)){
            $this->session->set_userdata(array('status' => 'logged'));
        } else {
            $this->session->set_flashdata(array('error' => 'Username atau Password Salah !!'));
        }
        $this->load->view('auth_view');
    }

}
