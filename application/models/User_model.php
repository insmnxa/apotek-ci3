<?php

class User_model extends CI_Model
{
    public $id;
    public $username;
    public $password;
    public $is_active;

    public function insert()
    {
        $this->id = uniqid('UR');
        $this->username = $this->input->post('username');
        $this->password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->is_active = 0;

        $this->db->insert('users', $this);
    }

    public function get_user(string $id = '')
    {
        if (empty($id)) {
            $query = $this->db->get('users');
            return $query->result();
        }

        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row();
    }

    public function update(string $id)
    {
        $data = [];

        if ($this->input->post('password')) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => $this->input->post('user_status')
            ];
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'is_active' => $this->input->post('user_status')
            ];
        }

        $this->db->update('users', $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function count_users()
    {
        return $this->db->count_all_results('users');
    }
}
