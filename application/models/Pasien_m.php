<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_m extends MY_Model
{
    public $column_order = [null, 'nomor_identitas', 'nama_pasien', 'jenis_kelamin', 'alamat', 'no_telepon'];
    public $column_search = ['nomor_identitas', 'nama_pasien', 'jenis_kelamin', 'alamat', 'no_telepon'];
    public $order = ['id_pasien' => 'asc'];

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

    private function _get_datatables_query()
    {
        $this->db->from($this->table_pasien);
        $i = 0;
        foreach ($this->column_search as $row) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($row, $_POST['search']['value']);
                } else {
                    $this->db->or_like($row, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->group_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->group_by(key($this->order), $this->order[key($this->order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }

    public function count_total()
    {
        $this->db->from($this->table_pasien);
        return $this->db->count_all_results();
    }

    public function add($data)
    {
        $this->db->insert($this->table_pasien, $data);
        return $this->db->affected_rows();
    }

    public function get_pasien_by_id($id)
    {
        return $this->db->get_where($this->table_pasien, ['id_pasien' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->update($this->table_pasien, $data, ['id_pasien' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->table_pasien, ['id_pasien' => $id]);
        return $this->db->affected_rows();
    }

    public function get_all()
    {
        return $this->db->get($this->table_pasien)->result();
    }
}
