<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Dokter extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_m', 'dokter_m']);
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->helper('form');
        is_not_login();
    }

    public function dokter_v()
    {
        $data['title'] = 'Dokter';
        $data['dokter'] = $this->dokter_m->get_dokter();

        $this->templates->load_inner('dokter/data', $data, 'dokter', 'dokter');
    }

    public function add_v()
    {
        $data['title'] = 'Dokter';
        $data['dokter'] = $this->dokter_m->get_dokter();

        $this->templates->load_inner('dokter/add', $data, 'dokter', 'dokter');
    }

    public function update_v()
    {
        $data['title'] = 'Dokter';
        $data['dokter'] = $this->dokter_m->get_dokter();
        $id = $this->encryption->decrypt(base64_decode($this->uri->segment(3)));
        $data['dokter'] = $this->dokter_m->get_dokter_with_id($id);

        $this->templates->load_inner('dokter/edit', $data, 'dokter', 'dokter');
    }

    public function add()
    {
        $nama_dokter = $this->input->post('nama_dokter', true);
        $spesialis = $this->input->post('spesialis', true);
        $alamat = $this->input->post('alamat', true);
        $no_telepon = $this->input->post('no_telepon');

        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required|min_length[11]|max_length[14]|is_natural|numeric');

        if ($this->form_validation->run() === false) {
            $this->add_v();
        } else {
            try {
                $uuid4 = Uuid::uuid4();
                $id    = $uuid4->toString();
            } catch (UnsatisfiedDependencyException $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
            $data = [
                'id_dokter' => $id,
                'nama_dokter' => $nama_dokter,
                'spesialis' => $spesialis,
                'alamat' => $alamat,
                'no_telepon' => $no_telepon
            ];
            $query = $this->dokter_m->add_dokter($data);

            if ($query > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data dokter berhasil ditambahkan');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data dokter gagal ditambahkan');
            }
            redirect('dokter');
        }
    }

    public function delete()
    {
        $id = $this->input->post('pilih', true);

        foreach ($id as $row) {
            $row = $this->encryption->decrypt($row);
            $query = $this->dokter_m->del_dokter($row);
        }
        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data dokter berhasil dihapus');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data dokter gagal dihapus');
        }
        redirect('dokter');
    }

    public function update()
    {
        $nama_dokter = $this->input->post('nama_dokter', true);
        $spesialis = $this->input->post('spesialis', true);
        $alamat = $this->input->post('alamat', true);
        $no_telepon = $this->input->post('no_telepon');

        $id = $this->encryption->decrypt($this->input->post('id_dokter', true));
        $data = [
            'nama_dokter' => $nama_dokter,
            'spesialis' => $spesialis,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon,
        ];

        $query = $this->dokter_m->edit_dokter($id, $data);
        if ($query >= 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data dokter berhasil diupdate');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data dokter gagal diupdate');
        }
        redirect('dokter');
    }
}
