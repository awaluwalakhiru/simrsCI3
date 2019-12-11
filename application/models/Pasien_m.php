<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_pasien = 'tb_pasien';
    }

    public function count_pasien()
    {
        return $this->db->get($this->table_pasien)->num_rows();
    }

    public function new_pasien()
    {
        $id = 'id_pasien';
        $this->db->order_by($id, 'DESC');
        $this->db->limit(5);
        return $this->db->get($this->table_pasien)->result();
    }
}
