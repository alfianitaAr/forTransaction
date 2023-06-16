<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function add_user($data) {
        $this->db->insert('admin', $data);
    }

    public function get_user($where) {
        return $this->db->get_where('admin', $where);
    }
}
