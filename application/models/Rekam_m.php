<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_rekam_medis = 'tb_rekam_medis';
    }

    public function count_rekam()
    {
        return $this->db->get($this->table_rekam_medis)->num_rows();
    }
}
