<?php defined('BASEPATH') or exit('No direct script access allowed');

class Obat_m extends MY_Model
{
<<<<<<< HEAD
    public $column_order = [null, 'nama_obat', 'ket_obat'];
    public $column_search = ['nama_obat', 'ket_obat'];
    public $order = ['id_obat' => 'asc'];

=======
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
    public function __construct()
    {
        parent::__construct();
        $this->table_obat = 'tb_obat';
    }

    public function count_obat()
    {
        return $this->db->get($this->table_obat)->num_rows();
    }
<<<<<<< HEAD

    public function get_all_obat()
    {
        return $this->db->get($this->table_obat)->result();
    }

    public function get_obat_by_id($id)
    {
        return $this->db->get_where($this->table_obat, ['id_obat' => $id])->row();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table_obat);
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
        $this->db->from($this->table_obat);
        return $this->db->count_all_results();
    }

    public function add_obat($data)
    {
        $this->db->insert($this->table_obat, $data);
        return $this->db->affected_rows();
    }

    public function update_obat($id, $data)
    {
        $this->db->update($this->table_obat, $data, ['id_obat' => $id]);
        return $this->db->affected_rows();
    }

    public function delete_obat($id)
    {
        $this->db->delete($this->table_obat, ['id_obat' => $id]);
        return $this->db->affected_rows();
    }
=======
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
}
