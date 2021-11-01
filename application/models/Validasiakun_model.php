<?php

class Validasiakun_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('user')->result_array();
    }
    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->result_array();
    }
    public function input_data($data)
    {
        $this->db->insert('user', $data);
    }
    public function ubahDataUser()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'nim' => $this->input->post('nim', true),
            'angkatan_kelas' => $this->input->post('angkatan_kelas', true),
            'program_studi' => $this->input->post('program_studi', true),
            'email' => $this->input->post('email', true),
            'username' => $this->input->post('username', true),
            'role_id' => $this->input->post('role_id', true),
            'is_active' => $this->input->post('is_active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function get_by_role()
    {
        $this->db->select('
        user.*, user_role.id AS role_id, user_role.role,
        ');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }
}
