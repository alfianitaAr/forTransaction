<?php

class M_customer extends CI_Model{
	protected $_table = 'm_customer';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($kode_customer){
		$query = $this->db->get_where($this->_table, ['kode_customer' => $kode_customer]);
		return $query->row();
	}

	public function lihat_nama_customer($nama_customer){
		//$query = $this->db->select('*');
		//$query = $this->db->where(['nama_customer' => $nama_customer]);
		//$query = $this->db->get($this->_table);
		$query = $this->db->get_where($this->_table, ['nama_customer' => $nama_customer]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $kode_customer){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_customer' => $kode_customer]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_customer){
		return $this->db->delete($this->_table, ['kode_customer' => $kode_customer]);
	}
}