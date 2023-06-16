<?php

class M_penjualan extends CI_Model {
	protected $_table = 't_sales';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_transaction($no_transaction){
		return $this->db->get_where($this->_table, ['no_transaction' => $no_transaction])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_transaction){
		return $this->db->delete($this->_table, ['no_transaction' => $no_transaction]);
	}
}