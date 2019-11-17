<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
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
        $data['kurir'] = $this->admin_model->kurir($id);
        $this->load->view('admin/edit_kurir_view', $data);

    }

    public function save($id)
    {
        if(isset($id))
        {
            $nama = $this->input->post('nama', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $this->admin_model->save_kurir($id, $nama, $alamat, $phone);
            redirect('admin/kurir');
        } else {
            redirect('admin/kurir');
        }
    }

    public function delete($id)
    {
        $data['kurir'] = $this->admin_model->delete_kurir($id);
        $this->session->set_flashdata(array('message', 'Data berhasil di Hapus !! '));
        redirect('admin/kurir');
    }
    
    public function add()
    {
        if($this->input->post('add'))
        {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
    
            if($this->form_validation->run() == TRUE)
            {
                $nama   = $this->input->post('nama', TRUE);
                $alamat = $this->input->post('alamat', TRUE);
                $phone  = $this->input->post('phone', TRUE);
                $this->admin_model->add_kurir($nama, $alamat, $phone);
                redirect('admin/kurir');
            } else {
                $this->load->view('admin/add_kurir_view');
            }
        } else {
            $this->load->view('admin/add_kurir_view');
        }

    }
}
