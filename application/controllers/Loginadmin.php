<?php

class Loginadmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_admin');
	}

	public function index(){
		$this->load->view('V_loginadmin');
	}

	public function exec() {
        $where = [
            'username_admin' => $this->input->post('username_admin'),
            'password_admin' => $this->input->post('password_admin'),
        ];
        $user = $this->M_admin->get_user($where);

        if ($user->num_rows() > 0) {
            $this->session->set_flashdata('notification', 'Login success!');
            $this->session->set_userdata('user', $user->row_array());
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('notification', 'wrong username or password');
            redirect('loginadmin');
        }
    }
}