<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Poliklinik extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('poliklinik_m');
        is_not_login();
    }

    public function poliklinik_v()
    {
        $data['title'] = 'Poliklinik';
        $data['poliklinik'] = $this->poliklinik_m->get_all_poliklinik();
        $this->templates->load_inner('poliklinik/data', $data, 'poliklinik', 'poliklinik');
    }

    public function add_count()
    {
        $data['title'] = 'Poliklinik';
        $this->templates->load_inner('poliklinik/count', $data);
    }

    public function add_v()
    {
        $data['title'] = 'Poliklinik';
        $data['jumlah'] = (htmlspecialchars($this->input->post('jumlah_gedung', true)) == '') ? html_escape($this->input->post('jumlah', true)) : htmlspecialchars($this->input->post('jumlah_gedung', true));
        $this->templates->load_inner('poliklinik/add', $data);
    }

    public function add()
    {
        $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        for ($i = 1; $i <= $jumlah; $i++) {
            $this->form_validation->set_rules('nama_poliklinik-' . $i . '', 'Nama Poliklinik ke ' . $i . '', 'trim|required|min_length[3]|is_unique[tb_poliklinik.nama_poliklinik]');
            $this->form_validation->set_rules('gedung-' . $i . '', 'Nama Gedung ke ' . $i . '', 'trim|required|min_length[3]');
        }

        if ($this->form_validation->run() === false) {
            $this->add_v();
        } else {
            try {
                for ($i = 1; $i <= $jumlah; $i++) {
                    $uuid4 = Uuid::uuid4();
                    $id    = $uuid4->toString();
                    $data = [
                        'id_poliklinik' => $id,
                        'nama_poliklinik' => htmlspecialchars($this->input->post('nama_poliklinik-' . $i . '', true)),
                        'gedung' => htmlspecialchars($this->input->post('gedung-' . $i . '', true))
                    ];
                    $query = $this->poliklinik_m->add_poliklinik($data);
                }
            } catch (UnsatisfiedDependencyException $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            };
            if ($query > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data poliklinik berhasil ditambahkan');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data poliklinik gagal ditambahkan');
            }
            redirect('poliklinik');
        }
    }

    public function update_v()
    {
        $data['title'] = 'Poliklinik';
        $id_encrypt = $this->input->post('pilih', true);

        $hasil = [];
        foreach ($id_encrypt as $id) {
            $hasil[] = $this->poliklinik_m->get_poliklinik_by_id(htmlspecialchars($this->encryption->decrypt($id)));
        }

        $data['poliklinik'] = $hasil;
        $this->templates->load_inner('poliklinik/edit', $data);
    }

    public function update()
    {
        $id = htmlspecialchars($this->input->post('id_poliklinik', true));
        $nama = htmlspecialchars($this->input->post('nama_poliklinik', true));
        $gedung = htmlspecialchars($this->input->post('gedung', true));
        for ($i = 0; $i < count($id); $i++) {
            $data = [
                'nama_poliklinik' => $nama[$i],
                'gedung' => $gedung[$i]
            ];
            $query = $this->poliklinik_m->update_poliklinik($this->encryption->decrypt($id[$i]), $data);
        }
        if ($query >= 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data poliklinik berhasil diupdate');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data poliklinik gagal diupdate');
        }
        redirect('poliklinik');
    }

    public function delete()
    {
        $hasil = $this->input->post('pilih', true);
        foreach ($hasil as $pilih) {
            $pilih = $this->encryption->decrypt($pilih);
            $query = $this->poliklinik_m->delete_poliklinik($pilih);
        }
        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data poliklinik berhasil dihapus');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data poliklinik gagal dihapus');
        }
        redirect('poliklinik');
    }
}
