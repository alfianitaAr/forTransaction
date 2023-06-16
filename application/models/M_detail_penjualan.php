<?php

class M_detail_penjualan extends CI_Model {
	protected $_table = 'detail_penjualan';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	
	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_transaction($no_transaction){
		return $this->db->get_where($this->_table, ['no_transaction' => $no_transaction])->result();
	}

	public function hapus($no_transaction){
		return $this->db->delete($this->_table, ['no_transaction' => $no_transaction]);
	}
}