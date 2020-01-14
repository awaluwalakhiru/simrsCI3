<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_rekam_medis = 'tb_rekam_medis';
        $this->table_pasien = 'tb_pasien';
        $this->table_dokter = 'tb_dokter';
        $this->table_poliklinik = 'tb_poliklinik';
        $this->table_obat = 'tb_obat';
        $this->table_rekam_medis_obat = 'tb_rekam_medis_obat';
    }

    public function count_rekam()
    {
        return $this->db->get($this->table_rekam_medis)->num_rows();
    }

    public function get_by_id_rekam_medis($id)
    {
        return $this->db->get_where($this->table_rekam_medis, ['id_rekam_medis' => $id])->row();
    }

    public function get_by_id_rekam_medis_obat($id)
    {
        return $this->db->get_where($this->table_rekam_medis_obat, ['id_rekam_medis' => $id])->result();
    }

    public function all_join()
    {
        $this->db->from($this->table_rekam_medis);
        $this->db->join($this->table_pasien, 'tb_rekam_medis.id_pasien=tb_pasien.id_pasien');
        $this->db->join($this->table_dokter, 'tb_rekam_medis.id_dokter=tb_dokter.id_dokter');
        $this->db->join($this->table_poliklinik, 'tb_rekam_medis.id_poliklinik=tb_poliklinik.id_poliklinik');
        return $this->db->get()->result();
    }

    public function add_rekam_medis($data)
    {
        $this->db->insert($this->table_rekam_medis, $data);
        return $this->db->affected_rows();
    }

    public function add_rekam_medis_obat($obat)
    {
        $this->db->insert($this->table_rekam_medis_obat, $obat);
        return $this->db->affected_rows();
    }

    public function rekam_obat_join($id_rekam_medis)
    {
        $this->db->from($this->table_rekam_medis_obat);
        $this->db->join($this->table_obat, 'tb_rekam_medis_obat.id_obat=tb_obat.id_obat');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        return $this->db->get()->result();
    }

    public function delete_rekam_medis($id)
    {
        $this->db->delete($this->table_rekam_medis, ['id_rekam_medis' => $id]);
        return $this->db->affected_rows();
    }

    public function update_rekam_medis($id, $data)
    {
        $this->db->update($this->table_rekam_medis, $data, ['id_rekam_medis' => $id]);
        return $this->db->affected_rows();
    }
}
