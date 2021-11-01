<?php

use GuzzleHttp\Psr7\Query;

defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function isMobile()
    {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    public function gettolong()
    {
        $query = "SELECT `pinjam`.*, `user`.`name`
                  FROM `pinjam` JOIN `user`
                  ON `pinjam`.`name_dosen` = `user`.`name`
                ";

        return $this->db->query($query)->result_array();
        $query = "SELECT `pinjam`.*, `user`.`name`
                  FROM `pinjam` JOIN `user`
                  ON `pinjam`.`name_dosen` = `user`.`name`
                ";

        return $this->db->query($query)->result_array();
    }
    // public function getApproval()
    // {
    //     $getMenurole = $this->session->userdata('role_id');
    //     return $this->db->query("SELECT * FROM user_access_menu WHERE role_id > $getMenurole");
    // }
    public function getpinjam($id)
    {
        return $this->db->get_where('pinjam', ['id' => $id])->result_array();
    }
    public function input_data($data)
    {
        $this->db->insert('pinjam', $data);
        $this->db->insert('validasi_pinjam', $data);
    }
    // public function ubahDataPinjam()
    // {
    //     $data = [
    //         'nama_dosen' => $this->input->post('nama_dosen', true),
    //         'is_active' => $this->input->post('is_active', true)
    //     ];
    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('pinjam', $data);
    //     $this->db->update('validasi_pinjam', $data);
    // }
    public function inputDataPinjam($data)
    {
        $this->db->insert('validasi_pinjam', $data);
    }
    public function get_data()
    {
        return $this->db->get('validasi_pinjam')->result_array();
    }
    public function get_by_role()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select('
        validasi_pinjam.*, pinjam.user_id AS name_dosen, pinjam.name_dosen
        
        ');
        $this->db->join('pinjam', 'validasi_pinjam.name_dosen = pinjam.user_id');
        $this->db->from('validasi_pinjam');
        $this->db->where('pinjam.user_id', $userid['id']);
        $this->db->where('validasi_pinjam.is_active', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_datapinjam()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select('
        validasi_pinjam.*, pinjam.user_id AS name_dosen, pinjam.name_dosen
        
        ');
        $this->db->join('pinjam', 'validasi_pinjam.name_dosen = pinjam.user_id');
        $this->db->from('validasi_pinjam');
        $this->db->where('validasi_pinjam.nama_peminjam', $userid['name']);
        $query = $this->db->get();
        return $query->result();
    }
    public function hitungPinjam()
    {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT COUNT (*) AS jp FROM validasi_pinjam WHERE nama_peminjam='$username'");
    }
    public function tampilPinjam()
    {
        $username = $this->session->userdata('username');
        return $this->db->query("SELECT * FROM validasi_pinjam,pinjam WHERE validasi_pinjam.nama_peminjam=pinjam.name_dosen AND validasi_pinjam.nama_peminjam='$username'");
    }
    public function update($table, $data, $where)
    {
        $this->db->where($where)->update($table, $data);
        return TRUE;
    }
    // public function tampil_data()
    // {
    //     $id = $this->session->userdata('username');
    //     $this->db->select('*');
    //     $this->db->from('user as validasi_pinjam');
    //     $this->db->join('validasi_pinjam as nama_peminjam', 'validasi_pinjam.id = nama_peminjam.id');
    //     $this->db->order_by('validasi_pinjam.name');
    //     $this->db->where('username', $id);
    //     $query = $this->db->get();
    //     return $query;
    // }

    // validasi_pinjam.*, proyektor.id AS proyektor_id, proyektor.kode_proyektor

    public function record_loker_user($kodeLoker)
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        $this->db->query("UPDATE `user` SET `kode_loker` = '$kodeLoker' WHERE `id` = '$userid' ");
    }

    public function openDoorLocker($where)
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->set('is_active', 1);
        $this->db->set('id_validasi_pinjam', $userid['id']);
        $this->db->where('kode_proyektor', $where);
        // $this->db->where('id_validasi_pinjam', NULL);
        $this->db->update('projec');
    }

    public function cek_record_loker_user()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];

        $cek = $this->db->query("SELECT `kode_loker` FROM `user` WHERE `id`='$userid' AND `kode_loker`= '' ")->num_rows();
        return $cek;
    }
    public function get_loker_user()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        $cekLog = $this->db->query("SELECT `kode_loker` FROM `user` WHERE `id` = '$userid'")->result_array()[0]['kode_loker'];
        return $cekLog;
    }
    public function searchStatusProjector($where)
    {
        $a = $this->db->query("SELECT `id_validasi_pinjam` FROM `projec` WHERE `kode_proyektor` = '$where'")->result_array();

        return $a[0]['id_validasi_pinjam'];
    }
    public function delete_kode_loker_user()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];

        $v = $this->db->query("UPDATE `user` SET `kode_loker` = '' WHERE `id` = '$userid' ");

        print_r($v);
    }
}
