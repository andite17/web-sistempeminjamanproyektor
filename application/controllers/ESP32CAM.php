<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ESP32CAM extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
        $this->load->model('ESP32CAM_model');
        //  $this->load->model('controlServo_model'); 
    }

    public function index()
    {
        $data['title'] = 'Rent the Projector';
        $this->load->view('template/header', $data);
        $this->load->view('pinjam/index', $data);
        $this->load->view('template/footer');


        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        // print_r($userid);

        if ($this->input->post('submit')) {
            $codeProjector = $this->input->post('projector');
            $cek = $this->ESP32CAM_model->searchStatusProjector($codeProjector);
            $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if (empty($cek)) {
                $this->ESP32CAM_model->openDoorLocker($codeProjector);
                $this->session->set_flashdata('message', 'Anda Berhasil Pinjam Proyektor');
                redirect('ESP32CAM');
            } elseif ($cek == $userid['id']) {
                # code...
                $this->ESP32CAM_model->openDoorLocker($codeProjector);
                $this->session->set_flashdata('message', 'Anda Berhasil Pinjam Proyektor');
                redirect('ESP32CAM');
            } else {
                // print_r("anda salah");
                $this->session->set_flashdata('message', 'Data tidak sesuai peminjam');
                redirect('ESP32CAM');
            }
        }
    }
    public function getStatus()
    {
        if (!empty($_GET['locker_id'])) {
            $locker_id = $this->input->get('locker_id');
            $result = $this->ESP32CAM_model->getLokerStatus($locker_id);
            echo json_encode($result);
            // // $response = ["status" => $result];
            // $response = ["status" => 12];
            // echo json_encode($response);
        } else {
            $response = ["status" => "Failed Transmission!!!"];
            echo json_encode($response);
        }
    }

    public function sendImage()
    {
        // memvalidasi perangkat dengan mencocokkan token
        if (!empty($_POST['token']) && !empty($_POST['image'])) {
            if ($this->input->post('token') == '9622429c-b8a2-4bde-9ecd-fb0b8020a48e') {
                date_default_timezone_set('Asia/Jakarta');
                // $time = date(' d-m-Y H-i-s');
                $time = time();
                $idLoker = $this->input->post('locker_id'); // menyimpan id locker
                // $status = $this->input->post('locker_status'); // menyimpan status untuk menutup locker
                $idUser = $this->input->post('id_peminjam');;
                $img = 'assets/img/pinjam/loker' . $idLoker . "/" . $time . '.png';
                $data = base64_decode($_POST['image']);
                file_put_contents($img, $data); // membuat image file
                // $this->ESP32CAM_model->closeDoorLocker($idLoker, $status); // function untuk menutup pintu
                $cekLogPinjam = $this->ESP32CAM_model->cek_log_pinjam($idUser); // mengecek history log peminjaman sebelumnya
                if ($cekLogPinjam) {
                    $this->ESP32CAM_model->create_log_balik($cekLogPinjam, $img); // function untuk membuat log belik
                    $this->ESP32CAM_model->delete_id_peminjam($idLoker); // function untuk membuat log peminjaman
                    $this->ESP32CAM_model->closeDoorLocker($idLoker, 0, 0);
                    echo json_encode([
                        "status" => "Success",
                        "ket" => "balik"
                    ]);
                } else {
                    $this->ESP32CAM_model->create_log_pinjam($idUser, $idLoker, $img); // function untuk membuat log peminjaman
                    $this->ESP32CAM_model->closeDoorLocker($idLoker, 0, $idUser); // function untuk membuat log belik
                    echo json_encode([
                        "status" => "Success",
                        "ket" => "pinjam"
                    ]);
                }

                // $response = ["status" => "Success"];
                // echo json_encode($response);
            } else {
                $response = ["status" => "Wrong Token !!!"];
                echo json_encode($response);
            }
        } else {
            $response = ["status" => "No data has been sended"];
            echo json_encode($response);
        }
    }

    public function sensor()
    {
        if (
            !empty($_GET['sensor1']) &&
            !empty($_GET['sensor2'])
            // !empty($_GET['sensor3']) && 
            // !empty($_GET['sensor4'])
        ) {
            $this->ESP32CAM_model->get_sensor_data($_GET['sensor1'], $_GET['sensor2'], $_GET['sensor3'], $_GET['sensor4']);
            echo json_encode(["status" => "Success!!!"]);
        } else {
            echo json_encode(["status" => "No data has been sended !!!"]);
        }
    }
}
