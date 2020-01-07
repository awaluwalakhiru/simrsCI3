<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_obat_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_rekam_medis_obat = 'tb_rekam_medis_obat';
    }

    public function update_rekam_obat($id, $data)
    {
        $this->db->update($this->table_rekam_medis_obat, $data, ['id_rekam_medis_obat' => $id]);
        $this->db->affected_rows();
    }

    public function get_rekam_obat($id)
    {
        return $this->db->get_where($this->table_rekam_medis_obat, ['id_rekam_medis' => $id])->result();
    }
}
