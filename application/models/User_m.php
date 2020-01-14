<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_user = 'tb_user';
        $this->table_user_token = 'tb_user_token';
    }

    public function register($data)
    {
        $this->db->insert($this->table_user, $data);
        return $this->db->affected_rows();
    }

    public function get_user($data)
    {
        return $this->db->get_where($this->table_user, ['email' => $data])->row();
    }

    public function get_users()
    {
        return $this->db->get($this->table_user)->result();
    }

    public function get_user_token($data)
    {
        return $this->db->get_where($this->table_user_token, ['email' => $data])->row();
    }

    public function user_login($id, $time)
    {
        $data = [
            'login' => $time,
            'online' => 1
        ];
        $this->db->update($this->table_user, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function user_logout($id, $time)
    {
        $data = [
            'logout' => $time,
            'online' => 0
        ];
        $this->db->update($this->table_user, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function insert_token($email, $token)
    {
        $data = [
            'email' => $email,
            'token' => $token,
            'created' => time()
        ];
        $this->db->insert($this->table_user_token, $data);
        return $this->db->affected_rows();
    }

    public function delete_token($email, $token)
    {
        $this->db->delete($this->table_user_token, ['email' => $email, 'token' => $token]);
        return $this->db->affected_rows();
    }

    public function update_password_user($email, $password)
    {
        $data = [
            'password' => $password
        ];
        $this->db->update($this->table_user, $data, ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function update_user($id, $data)
    {
        $this->db->update($this->table_user, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
