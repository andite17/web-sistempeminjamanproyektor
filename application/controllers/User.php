<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->model('Home_model');
        $datafix['proyektor'] = $this->Home_model->get_data();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $datafix['countif'] = $this->Home_model->get_sum_count_if();
        $datafix['countif1'] = $this->Home_model->get_sum_count_if1();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $datafix);
        $this->load->view('templates/footer');
    }
    public function pinjam()
    {
        $data['title'] = 'Pinjam Proyektor';
        $this->load->model('Pinjam_model');
        $datafix['pinjam'] = $this->Pinjam_model->get_data();
        $data = [
            'nama_dosen' => $this->input->post('nama_dosen'),
            'waktu_pinjam' => $this->input->post('waktu_pinjam'),
            'waktu_kembali' => $this->input->post('waktu_kembali'),
        ];
        $this->load->model('Pinjam_model');
        $this->Pinjam_model->input_data($data, 'pinjam');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
        redirect('user/pinjam');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/pinjam', $datafix);
        $this->load->view('templates/footer');
    }
}
