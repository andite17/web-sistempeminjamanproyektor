<?php

class controlServo_model extends CI_model
{
    public function getAllServo()
    {
        return $this->db->get('proyektor')->result_array();
    }
}
