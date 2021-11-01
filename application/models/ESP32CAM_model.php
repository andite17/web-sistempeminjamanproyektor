<?php

class ESP32CAM_model extends CI_model
{
    public function getLokerStatus($id)
    {
        $this->db->select('is_active');
        $this->db->select('id_validasi_pinjam');
        $this->db->where('id', $id);
        $this->db->from('projec');
        $query = $this->db->get()->result_array();
        return $query[0];
    }

    // public function closeDoorLocker($id, $status)
    // {
    //     $this->db->set('is_active', $status);
    //     $this->db->where('id', $id);
    //     $this->db->update('projec');
    // }

    public function searchStatusProjector($where)
    {
        $a = $this->db->query("SELECT `id_validasi_pinjam` FROM `projec` WHERE `kode_proyektor` = '$where'")->result_array();
        // print_r($a[0]['id_validasi_pinjam']);
        return $a[0]['id_validasi_pinjam'];
    }

    public function cek_log_pinjam($id_pinjam)
    {
        $cek = $this->db->query("SELECT `id` FROM `log_pinjam` WHERE `id_peminjam`='$id_pinjam' AND `waktu_balik`= '' AND `img_balik` = '' ")->num_rows();
        if ($cek > 0) {
            $cekLog = $this->db->query("SELECT `id` FROM `log_pinjam` WHERE `id_peminjam`='$id_pinjam' AND `waktu_balik`= '' AND `img_balik` = '' ")->result_array()[0]['id'];
            return $cekLog;
        }
        // $cekLog = $this->db->query("SELECT `id` FROM `log_pinjam` WHERE `id_peminjam`='5' AND `waktu_balik`= '' AND `img_balik` = '' ")->result_array()[0]['id'];
    }

    public function create_log_pinjam($userid, $idlocker, $img)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date('d-m-Y H:i:s');
        $this->db->query("INSERT INTO `log_pinjam`(`id`, `id_peminjam`, `id_locker`, `waktu_pinjam`, `img_pinjam`) VALUES ('','$userid', '$idlocker','$time','$img')");
    }
    // public function create_log_balik($id, $img)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $time = date('d-m-Y H:i:s');
    //     $this->db->query("UPDATE `log_pinjam` SET `waktu_pinjam` = '$time', `img_pinjam` = '$img' WHERE `id` = '$id' ");
    // }
    public function create_log_balik($id, $img)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date('d-m-Y H:i:s');
        $this->db->query("UPDATE `log_pinjam` SET `waktu_balik` = '$time', `img_balik` = '$img' WHERE `id` = '$id' ");
        // $this->db->set('waktu_balik', $time);
        // $this->db->set('img_balik', $img);
        // $this->db->where('id', $id);
        // $this->db->update('log_pinjam');
    }
    public function closeDoorLocker($where, $status, $iduser)
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->set('is_active', $status);
        $this->db->set('id_validasi_pinjam', $iduser);
        $this->db->where('id', $where);
        // $this->db->where('id_validasi_pinjam', NULL);
        $this->db->update('projec');
    }

    public function delete_id_peminjam($idLoker)
    {
        // $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];

        $this->db->query("UPDATE `projec` SET `id_validasi_pinjam` = NULL WHERE `projec`.`id` = '$idLoker' ");
    }

    // public function get_sensor_data($s1 = 0, $s2 = 0, $s3 = 0, $s4 = 0)
    // {
    //     $this->db->query("INSERT INTO `sensor` (`loker`,`status`) VALUES (1,$s1),(2,$s2),(3,$s3),(4,$s4) ON DUPLICATE KEY UPDATE `status`= VALUES(`status`) ");
    // }
    public function get_sensor_data($s1 = 0, $s2 = 0, $s3 = 0, $s4 = 0)
    {
        $data = array(
            array(
                'loker' => 1,
                'status' => $s1,
            ),
            array(
                'loker' => 2,
                'status' => $s2,
            ),
            array(
                'loker' => 3,
                'status' => $s3,
            ),
            array(
                'loker' => 4,
                'status' => $s4
            )
        );
        $this->db->update_batch('sensor', $data, 'loker'); 
    }
}
