<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Obat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('obat_m');
    }

    public function obat_v()
    {
        $data['title'] = 'Obat';
        $data['obat'] = $this->obat_m->get_all_obat();
        $this->templates->load_inner('obat/data', $data, 'obat', 'obat');
    }

    public function all_obat()
    {
        $hasil = $this->obat_m->get_datatables();
        $no = $_POST['start'];
        $data = [];

        foreach ($hasil as $field) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $field->nama_obat;
            $row[] = $field->ket_obat;
            $row[] = urlencode(base64_encode($this->encryption->encrypt($field->id_obat)));
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->obat_m->count_total(),
            "recordsFiltered" => $this->obat_m->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function add_v()
    {
        $data['title'] = 'Obat';
        $this->templates->load_inner('obat/add', $data);
    }


    public function add()
    {
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('ket_obat', 'Ket_Obat', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->add_v();
        } else {
            try {
                $uuid4 = Uuid::uuid4();
                $id    = $uuid4->toString();
            } catch (UnsatisfiedDependencyException $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }

            $data = [
                'id_obat' => $id,
                'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
                'ket_obat' => htmlspecialchars($this->input->post('ket_obat', true))
            ];

            $query = $this->obat_m->add_obat($data);
            if ($query > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data obat berhasil ditambahkan');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data obat gagal ditambahkan');
            }
            redirect('obat');
        }
    }

    public function update_v()
    {
        $data['title'] = 'Obat';
        $id = htmlspecialchars($this->encryption->decrypt(base64_decode($this->uri->segment(3))));
        $data['obat'] = $this->obat_m->get_obat_by_id($id);

        $this->templates->load_inner('obat/edit', $data);
    }

    public function update()
    {
        $id = htmlspecialchars($this->encryption->decrypt($this->input->post('id_obat', true)));
        $data = [
            'nama_obat' => htmlspecialchars($this->input->post('nama_obat', true)),
            'ket_obat' => htmlspecialchars($this->input->post('ket_obat', true)),
        ];

        $query = $this->obat_m->update_obat($id, $data);
        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data obat berhasil diupdate');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data obat gagal diupdate');
        }
        redirect('obat');
    }

    public function delete()
    {
        $id =  $this->encryption->decrypt(base64_decode($this->uri->segment(3)));
        $query = $this->obat_m->delete_obat($id);

        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data obat berhasil dihapus');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data obat gagal dihapus');
        }
        redirect('obat');
    }
}
