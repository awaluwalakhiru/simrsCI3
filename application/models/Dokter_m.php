<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_dokter = 'tb_dokter';
    }

    public function count_dokter()
    {
        return $this->db->get($this->table_dokter)->num_rows();
    }

    public function get_dokter()
    {
        return $this->db->get($this->table_dokter)->result();
    }

    public function get_dokter_with_id($id)
    {
        return $this->db->get_where($this->table_dokter, ['id_dokter' => $id])->row();
    }

    public function add_dokter($data)
    {
        $this->db->insert($this->table_dokter, $data);
        return $this->db->affected_rows();
    }

    public function del_dokter($id)
    {
        $this->db->delete($this->table_dokter, ['id_dokter' => $id]);
        return $this->db->affected_rows();
    }

    public function edit_dokter($id, $data)
    {
        $this->db->update($this->table_dokter, $data, ['id_dokter' => $id]);
        return $this->db->affected_rows();
    }
}
