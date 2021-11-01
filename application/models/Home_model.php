<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('proyektor')->result_array();
    }
    public function get_sum_count_if()
    {
        $sql = "SELECT count(if(is_active='0', is_active, NULL)) as is_active
                FROM proyektor
                ";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function get_sum_count_if1()
    {
        $sql = "SELECT count(if(is_active='1', is_active, NULL)) as is_active
                FROM proyektor
                ";
        $result = $this->db->query($sql);
        return $result->row();
    }
    // public function hitungProyektor()
    // {
    //     $proyektor = $this->session->set_userdata('proyektor');
    //     return $this->db->query("SELECT COUNT (*) AS jp FROM proyektor WHERE kode_proyektor='$proyektor'");
    // }
    // public function tampilProyektor(){
    //     $proyektor = $this->session->userdata('proyektor');
    //     return $this->db->query()
    // }
}
