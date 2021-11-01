<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('log_pinjam')->result_array();
    }
    public function get_by_name()
    {
        $this->db->select('
        log_pinjam.*, user.id AS id_peminjam, user.name,
        ');
        $this->db->join('user', 'log_pinjam.id_peminjam = user.id');
        $this->db->from('log_pinjam');
        $query = $this->db->get();
        return $query->result_array();
    }
}
