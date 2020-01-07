<?php defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_poliklinik = 'tb_poliklinik';
    }

    public function get_all_poliklinik()
    {
        return $this->db->get($this->table_poliklinik)->result();
    }

    public function get_poliklinik_by_id($id)
    {
        return $this->db->get_where($this->table_poliklinik, ['id_poliklinik' => $id])->row();
    }

    public function add_poliklinik($data)
    {
        $this->db->insert($this->table_poliklinik, $data);
        return $this->db->affected_rows();
    }

    public function update_poliklinik($id, $data)
    {
        $this->db->update($this->table_poliklinik, $data, ['id_poliklinik' => $id]);
        return $this->db->affected_rows();
    }

    public function delete_poliklinik($id)
    {
        $this->db->delete($this->table_poliklinik, ['id_poliklinik' => $id]);
        return $this->db->affected_rows();
    }
}
