<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_user';
    }

    public function register($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function has_user($data)
    {
        $this->db->get_where($this->table, ['username' => $data]);
        return $this->db->affected_rows();
    }

    public function get_user($data)
    {
        return $this->db->get_where($this->table, ['username' => $data])->row();
    }

    public function user_login($id, $time)
    {
        $data = [
            'login' => $time
        ];
        $this->db->update($this->table, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
