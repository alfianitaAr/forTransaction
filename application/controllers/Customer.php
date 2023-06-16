<?php

use Dompdf\Dompdf;

class Customer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data['aktif'] = 'customer';
		$this->load->model('M_customer', 'm_customer');
	}

	public function index(){
		$this->data['title'] = 'Data Customer';
		$this->data['all_customer'] = $this->m_customer->lihat();
		$this->data['no'] = 1;

		$this->load->view('customer/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah customer';

		$this->load->view('customer/tambah', $this->data);
	}

	public function proses_tambah(){
		$data = [
			'kode_customer' => $this->input->post('kode_customer'),
			'nama_customer' => $this->input->post('nama_customer'),
			'telp_customer' => $this->input->post('telp_customer'),
		];

		if($this->m_customer->tambah($data)){
			$this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Ditambahkan!');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Ditambahkan!');
			redirect('customer');
		}
	}

	public function ubah($kode_customer){
		$this->data['title'] = 'Ubah Customer';
		$this->data['customer'] = $this->m_customer->lihat_id($kode_customer);

		$this->load->view('customer/ubah', $this->data);
	}

	public function proses_ubah($kode_customer){
		$data = [
			'kode_customer' => $this->input->post('kode_customer'),
			'nama_customer' => $this->input->post('nama_customer'),
			'telp_customer' => $this->input->post('telp_customer'),
		];

		if($this->m_customer->ubah($data, $kode_customer)){
			$this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Diubah!');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Diubah!');
			redirect('customer');
		}
	}

	public function hapus($kode_customer){
		if($this->m_customer->hapus($kode_customer)){
			$this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Dihapus!');
			redirect('customer');
		} else {
			$this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Dihapus!');
			redirect('customer');
		}
	}
}