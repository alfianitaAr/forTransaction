<?php

use Dompdf\Dompdf;

class Detailpenjualan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->data['aktif'] = 'detailpenjualan';
		$this->load->model('M_detail_penjualan', 'm_detail_penjualan');
	}

	public function index(){
		$this->data['title'] = 'Data Penjualan';
		$this->data['all_dpenjualan'] = $this->m_detail_penjualan->lihat();
		$this->data['no'] = 1;

		$this->load->view('dpenjualan/lihat', $this->data);
	}

}