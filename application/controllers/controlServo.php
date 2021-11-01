<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controlServo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('controlServo_model');
    }

    public function index()
    {
        $data['servo'] = $this->controlServo_model->getAllServo();
        $data['title'] = 'Control Servo';
        $this->load->view('template/header', $data);
        $this->load->view('controlServo/index', $data);
        $this->load->view('template/footer');

        if ($this->input->post('submit')) {
            $data = array(
                array(
                    'id' => '1',
                    'is_active' => $this->input->post('lemari1')
                ),
                array(
                    'id' => '2',
                    'is_active' => $this->input->post('lemari2')
                ),
                array(
                    'id' => '3',
                    'is_active' => $this->input->post('lemari3')
                ),
                array(
                    'id' => '4',
                    'is_active' => $this->input->post('lemari4')
                )
            );
            $this->db->update_batch('projec', $data, 'id');
        }
    }
}
