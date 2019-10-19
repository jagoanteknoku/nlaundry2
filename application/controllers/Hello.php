<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index()
	{
        echo 'Hellow World';
		//$this->load->view('welcome_message');
	}
}
