<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signupadmin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
    }

	public function index()	{
		$this->load->view('V_signupadmin');
    }
    
    public function exec() {
        $data = [
            'nama_admin' => $this->input->post('nama_admin'),
            'username_admin' => $this->input->post('username_admin'),
            'password_admin' => $this->input->post('password_admin')
        ];
        $this->M_admin->add_user($data);
        $this->session->set_flashdata('notification', 'You have signed up successfully!');
        redirect('loginadmin');
    }
}
