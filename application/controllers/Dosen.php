<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pinjam_model');
    }
    public function index()
    {
        $data['title'] = 'Validasi Peminjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row_array();
        $data['pinjam'] = $this->Pinjam_model->get_by_role();
        // $data['pinjam'] = $this->Pinjam_model->tampil_data()->result();
        $data['validasi_akun'] = $this->Pinjam_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data['title'] = 'Validasi Peminjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proyektor'] = $this->db->get_where('validasi_pinjam', ['id' => $id])->result();
        $data['get_id'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dosen/approval', $data);
        $this->load->view('templates/footer');
    }

    public function approval($id)
    {

        $a = $this->input->post('proyektor_id[]');
        $b = $this->input->post('is_active[]');

        $i = 1;
        foreach ($b as $is_active) {
            if (!empty($is_active)) {
                $where = [
                    'id' => $id,
                    'proyektor_id' => $a[$i]
                ];
                $data = ['is_active' => $is_active];
                $this->Pinjam_model->update('validasi_pinjam', $data, $where);
                $i++;
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Peminjaman Proyektor Berhasil di Verifikasi <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
      </button>
      </div>');
        redirect('dosen');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('validasi_pinjam');
        redirect('dosen');
    }
}
