<?php defined('BASEPATH') or exit('No direct script access allowed');

class Obat_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_obat = 'tb_obat';
    }

    public function count_obat()
    {
        return $this->db->get($this->table_obat)->num_rows();
    }
}
