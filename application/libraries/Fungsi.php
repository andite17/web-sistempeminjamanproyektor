<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    public function count_proyektortersedia($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
    public function count_user($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
}
