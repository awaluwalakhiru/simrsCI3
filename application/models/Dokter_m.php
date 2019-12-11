<?php defined('BASEPATH') or exit('No direct script access allowed');

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
}
