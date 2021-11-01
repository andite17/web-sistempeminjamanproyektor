<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjam_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Access Camera';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->Pinjam_model->gettolong();
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('name_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('waktu_pinjam', 'Waktu Pinjam', 'required');
        $this->form_validation->set_rules('waktu_kembali', 'waktu_kembali', 'required');
        $this->form_validation->set_rules('is_active', 'Aktifasi', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/pinjam', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama_dosen' => $this->input->post('name_dosen'),
                'waktu_pinjam' => $this->input->post('waktu_pinjam'),
                'waktu_kembali' => $this->input->post('waktu_kembali'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('pinjam', $data);
            $this->db->insert('validasi_pinjam', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sub menu berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
            redirect('user/pinjam');
        }
    }

    public function tambah_aksi()
    {
        $data['title'] = 'Pinjam Proyektor';
        $datafix['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'nama_dosen' => $this->input->post('nama_dosen'),
            'proyektor_id' => $this->input->post('proyektor_id'),
            'waktu_pinjam' => $this->input->post('waktu_pinjam'),
            'waktu_kembali' => $this->input->post('waktu_kembali'),
            'is_active' => 0
        ];
        $this->load->model('Pinjam_model');
        $this->Pinjam_model->input_data($data, 'pinjam');
        $this->Pinjam_model->input_data($data, 'validasi_pinjam');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Form berhasil dikirimkan, tunggu approve Dosen! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>');
        redirect('user/pinjam');
    }
    public function datapinjam()
    {
        $data['title'] = 'Data Peminjaman';
        $datafix['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Pinjam_model');
        $data['pinjam'] = $this->Pinjam_model->gettolong();
        $data['validasi_pinjam'] = $this->db->get('proyektor')->result_array();
        $datafix['validasi_akun'] = $this->Pinjam_model->get_data();
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('angkatan_kelas', 'Angkatan & Kelas', 'required');
        $this->form_validation->set_rules('name_dosen', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('waktu_pinjam', 'Waktu Pinjam', 'required');
        $this->form_validation->set_rules('waktu_kembali', 'waktu_kembali', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $datafix);
            $this->load->view('user/pinjam', $datafix);
            $this->load->view('templates/footer');
        } else {
            $data1 = [
                'nama_peminjam' => $this->input->post('nama_peminjam'),
                'program_studi' => $this->input->post('program_studi'),
                'angkatan_kelas' => $this->input->post('angkatan_kelas'),
                'name_dosen' => $this->input->post('name_dosen'),
                'waktu_pinjam' => $this->input->post('waktu_pinjam'),
                'waktu_kembali' => $this->input->post('waktu_kembali')
            ];
            $this->load->model('Pinjam_model');
            $this->Pinjam_model->inputDataPinjam($data1, 'validasi_pinjam');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Form berhasil dikirimkan, tunggu approve Dosen! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('pinjam');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/datapinjam', $datafix);
            $this->load->view('templates/footer');
        }
    }
    public function validpinjam()
    {
        $data['title'] = 'Data Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->Pinjam_model->get_datapinjam();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/datapinjam', $data);
        $this->load->view('templates/footer');
    }
    // public function kode()
    // {
    //     $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
    //     $cek_access_camera = $this->db->query("SELECT `menu_pinjam` FROM `user` WHERE `id` = '$userid'")->result_array()[0]['menu_pinjam'];
    //     print_r($cek_access_camera);
    //     if ($cek_access_camera == 1) {

    //         $data['title'] = 'Pilih Proyektor';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('user/kodes', $data);
    //         $this->load->view('templates/footer');


    //         // untuk proses pilih proyektor 
    //         if ($this->input->post('submit')) {
    //             $kodeLoker = $this->input->post('kode_proyektor');
    //             $cek_record_loker = $this->Pinjam_model->cek_record_loker_user(); //ini untuk ngecek ditabel user apakah sudah minjam, jadi 1 user 1 proyektor
    //             $cek_status_loker = $this->Pinjam_model->searchStatusProjector($kodeLoker); //untuk melihat proyektor yang dipilih udah dipinjam belum ditabel projec
    //             $get_loker_user = $this->Pinjam_model->get_loker_user(); //menampilkan kode loker user jadi pas ngembaliin harus mencet loker yang sama

    //             if ($cek_record_loker > 0) { // mengecek jika user belum pinjam
    //                 if (empty($cek_status_loker)) { //mengecek loker yang dipilih udah ada yang minjem belum
    //                     $this->Pinjam_model->record_loker_user($kodeLoker); //masukin kode loker ke tabel user 
    //                     $this->Pinjam_model->openDoorLocker($kodeLoker); //membuka loker
    //                     $this->session->set_flashdata('message', 'berhasil pinjam proyektor');
    //                     echo "berhasil pinjam proyektor";
    //                 } else { //loker yang dipilih sudah dipinjam
    //                     $this->session->set_flashdata('message', 'loker sudah di pinjam');
    //                     echo "loker sudah di pinjam";
    //                 }
    //             } else { //saat tabel user di kolom kode loker sudah diisi
    //                 if ($get_loker_user == $kodeLoker) { // apa yang dipilih sama yg dibalikin sama atau tidak?
    //                     $this->Pinjam_model->openDoorLocker($kodeLoker);
    //                     $this->Pinjam_model->delete_kode_loker_user(); //terhapus kode loker di tabel user jika berhasil mengembalikan
    //                     $this->session->set_flashdata('message', 'berhasil Balikin proyektors');
    //                     echo "berhasil Balikin proyektors";
    //                 } else {
    //                     $this->session->set_flashdata('message', 'loker tidak sesuai');
    //                     echo "loker tidak sesuai";
    //                 }
    //                 echo "kode looker sudah di isi";
    //             }
    //             redirect('pinjam/kode');
    //         }
    //     } else {
    //         redirect('user');
    //     }
    // }

    public function kode()
    {
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        $cek_access_camera = $this->db->query("SELECT `menu_pinjam` FROM `user` WHERE `id` = '$userid'")->result_array()[0]['menu_pinjam'];
        print_r($cek_access_camera);
        if ($cek_access_camera == 1) {

            $data['title'] = 'Pilih Proyektor';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $device = $this->Pinjam_model->isMobile();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            if ($device == 1) {
                $data['device'] = 'Mobile';
                $data['tes'] = $this->input->post('kode_proyektor');
                $this->load->view('user/mobile', $data);
            } else {
                $data['device'] = 'desktop';
                $data['tes'] = $this->input->post('kode_proyektor');
                $this->load->view('user/desktop', $data);
            }
            // $this->load->view('user/kodes', $data);
            $this->load->view('templates/footer');

            // $no = $this->input->post('kode_proyektor');
            // print_r($this->input->post('kode_proyektor'));
            // $this->session->set_flashdata('message', 'berhasil pinjam proyektor' . $no);



            // untuk proses pilih proyektor 
            if ($this->input->post('submit')) {
                $kodeLoker = $this->input->post('kode_proyektor');
                $cek_record_loker = $this->Pinjam_model->cek_record_loker_user(); //ini untuk ngecek ditabel user apakah sudah minjam, jadi 1 user 1 proyektor
                $cek_status_loker = $this->Pinjam_model->searchStatusProjector($kodeLoker); //untuk melihat proyektor yang dipilih udah dipinjam belum ditabel projec
                $get_loker_user = $this->Pinjam_model->get_loker_user(); //menampilkan kode loker user jadi pas ngembaliin harus mencet loker yang sama

                if ($cek_record_loker > 0) { // mengecek jika user belum pinjam
                    if (empty($cek_status_loker)) { //mengecek loker yang dipilih udah ada yang minjem belum
                        $this->Pinjam_model->record_loker_user($kodeLoker); //masukin kode loker ke tabel user 
                        $this->Pinjam_model->openDoorLocker($kodeLoker); //membuka loker
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil pinjam proyektor <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                        echo "berhasil pinjam proyektor";
                    } else { //loker yang dipilih sudah dipinjam
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        loker sudah dipinjam!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                        echo "loker sudah di pinjam";
                    }
                } else { //saat tabel user di kolom kode loker sudah diisi
                    if ($get_loker_user == $kodeLoker) { // apa yang dipilih sama yg dibalikin sama atau tidak?
                        $this->Pinjam_model->openDoorLocker($kodeLoker);
                        $this->Pinjam_model->delete_kode_loker_user(); //terhapus kode loker di tabel user jika berhasil mengembalikan
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Berhasil balikin proyektor <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                        echo "berhasil Balikin proyektors";
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        loker tidak sesuai!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                        echo "loker tidak sesuai";
                    }
                    echo "kode looker sudah di isi";
                }
                redirect('pinjam/kode');
            }
        } else {
            redirect('user');
        }
    }
}
