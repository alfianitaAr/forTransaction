<?php

use Dompdf\Dompdf;

class Penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_penjualan', 'm_penjualan');
		$this->load->model('M_detail_penjualan', 'm_detail_penjualan');
		$this->data['aktif'] = 'penjualan';
	}

	public function index(){
		$this->data['title'] = 'Data Penjualan';
		$this->data['all_penjualan'] = $this->m_penjualan->lihat();

		$this->load->view('penjualan/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Penjualan';
		$this->data['all_barang'] = $this->m_barang->lihat_stok();

		$this->load->view('penjualan/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));
		
		$data_penjualan = [
			'no_transaction' => $this->input->post('no_transaction'),
			'tgl_transaction' => $this->input->post('tgl_transaction'),
			'kode_customer' => $this->input->post('kode_customer'),
			'nama_customer' => $this->input->post('nama_customer'),
			'subtotal_transaction' => $this->input->post('subtotal_transaction'),
			'diskon_transaction' => $this->input->post('diskon_transaction'),
			'ongkir_transaction' => $this->input->post('ongkir_transaction'),
			'total_bayar' => $this->input->post('total_hidden'),
		];

		$data_detail_penjualan = [];

		for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
			array_push($data_detail_penjualan, ['nama_barang' => $this->input->post('nama_barang_hidden')[$i]]);
			$data_detail_penjualan[$i]['no_transaction'] = $this->input->post('no_transaction');
			$data_detail_penjualan[$i]['harga_barang'] = $this->input->post('harga_barang_hidden')[$i];
			$data_detail_penjualan[$i]['jumlah_barang'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if($this->m_penjualan->tambah($data_penjualan) && $this->m_detail_penjualan->tambah($data_detail_penjualan)){
			for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
				$this->m_barang->min_stok($data_detail_penjualan[$i]['jumlah_barang'], $data_detail_penjualan[$i]['nama_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		}
	}

	public function detail($no_transaction){
		$this->data['title'] = 'Detail Penjualan';
		$this->data['penjualan'] = $this->m_penjualan->lihat_no_transaction($no_transaction);
		$this->data['all_detail_penjualan'] = $this->m_detail_penjualan->lihat_no_transaction($no_transaction);
		$this->data['no'] = 1;

		$this->load->view('penjualan/detail', $this->data);
	}

	public function hapus($no_transaction){
		if($this->m_penjualan->hapus($no_transaction) && $this->m_detail_penjualan->hapus($no_transaction)){
			$this->session->set_flashdata('success', 'Invoice Penjualan <strong>Berhasil</strong> Dihapus!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penjualan <strong>Gagal</strong> Dihapus!');
			redirect('penjualan');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function get_all_customer(){
		$data = $this->m_customer->lihat_nama_customer($_POST['nama_customer']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('penjualan/keranjang');
	}

}