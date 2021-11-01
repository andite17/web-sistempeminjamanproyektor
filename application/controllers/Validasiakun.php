<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasiakun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Validasiakun_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Validasi Akun';
        $this->load->model('Validasiakun_model');
        $datafix['user'] = $this->Validasiakun_model->get_data();
        $datafix['user'] = $this->Validasiakun_model->get_by_role();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('validasiakun', $datafix);
        $this->load->view('templates/footer', $data);
    }
    public function hapus($id)
    {
        $this->load->model('Validasiakun_model');
        $this->Validasiakun_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
        redirect('validasiakun');
    }
    public function detail($id)
    {
        $this->load->model('Validasiakun_model');
        $data['title'] = 'Detail Data User';
        $data['user'] = $this->Validasiakun_model->getUserById($id);
        $datafix['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $datafix);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'name' => $this->input->post('name'),
            'nim' => $this->input->post('nim'),
            'angkatan_kelas' => $this->input->post('angkatan_kelas'),
            'email' => $this->input->post('email'),
            'program_studi' => $this->input->post('program_studi'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'role_id' => 3,
            'is_active' => 1
        ];
        $this->load->model('Validasiakun_model');
        $this->Validasiakun_model->input_data($data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
        redirect('validasiakun');
    }
    public function edit($id)
    {
        $data['title'] = 'Validasi Akun';
        $datafix['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Validasiakun_model');
        $data['user'] = $this->Validasiakun_model->getUserById($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('angkatan_kelas', 'Angkatan & Kelas', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('menu_pinjam', 'Menu Pinjam', 'required');
        $this->form_validation->set_rules('kode_loker', 'Kode Loker', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('is_active', 'Aktifasi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $datafix);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Validasiakun_model->ubahDataUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
            redirect('validasiakun');
        }
    }
    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('name');
        $nim = $this->input->post('nim');
        $angkatan_kelas = $this->input->post('angkatan_kelas');
        $email = $this->input->post('email');
        $program_studi = $this->input->post('program_studi');
        $username = $this->input->post('username');
        $menu_pinjam = $this->input->post('menu_pinjam');
        $kode_loker = $this->input->post('kode_loker');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');

        $data = array(
            'name' => $nama,
            'nim' => $nim,
            'angkatan_kelas' => $angkatan_kelas,
            'email' => $email,
            'program_studi' => $program_studi,
            'username' => $username,
            'menu_pinjam' => $menu_pinjam,
            'kode_loker' => $kode_loker,
            'role_id' => $role_id,
            'is_active' => $is_active
        );

        $where = array(
            'id' => $id
        );

        $this->Validasiakun_model->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>  </div>');
        redirect('validasiakun');
    }
}
