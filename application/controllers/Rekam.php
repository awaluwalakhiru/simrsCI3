<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Rekam extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekam_m');
        $this->load->model('pasien_m');
        $this->load->model('dokter_m');
        $this->load->model('poliklinik_m');
        $this->load->model('obat_m');
        $this->load->model('rekam_obat_m');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->helper('form');
        is_not_login();
    }

    public function rekam_v()
    {
        $data['title'] = 'Rekam Medis';
        $data['gabung'] = $this->rekam_m->all_join();

        $this->templates->load_inner('rekam/data', $data, 'rekam', 'rekam');
    }

    public function add_v()
    {
        $data['title'] = 'Rekam Medis';
        $data['pasien'] = $this->pasien_m->get_all();
        $data['dokter'] = $this->dokter_m->get_dokter();
        $data['poliklinik'] = $this->poliklinik_m->get_all_poliklinik();
        $data['obat'] = $this->obat_m->get_all_obat();
        $this->templates->load_inner('rekam/add', $data, 'rekam', 'rekam');
    }

    public function add()
    {
        $id_pasien = $this->encryption->decrypt($this->input->post('nama_pasien', true));
        $id_dokter = $this->encryption->decrypt($this->input->post('nama_dokter', true));
        $id_poliklinik = $this->encryption->decrypt($this->input->post('nama_poliklinik', true));
        $keluhan = $this->input->post('keluhan', true);
        $diagnosa = $this->input->post('diagnosa', true);
        $tanggal_periksa = htmlspecialchars($this->input->post('tanggal_periksa', true));

        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required');
        $this->form_validation->set_rules('nama_poliklinik', 'Nama Poliklinik', 'trim|required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');
        $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'trim|required');
        $this->form_validation->set_rules('tanggal_periksa', 'Tanggal Periksa', 'trim|required');

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
                'id_rekam_medis' => $id,
                'id_pasien' => $id_pasien,
                'id_dokter' => $id_dokter,
                'id_poliklinik' => $id_poliklinik,
                'keluhan' => $keluhan,
                'diagnosa' => $diagnosa,
                'tanggal_periksa' => $tanggal_periksa,
            ];
            $query = $this->rekam_m->add_rekam_medis($data);
            if ($query > 0) {
                $id_obat = $this->input->post('nama_obat', true);

                foreach ($id_obat as $obat) {
                    $obat = [
                        'id_rekam_medis' => $id,
                        'id_obat' => $this->encryption->decrypt($obat)
                    ];
                    $this->rekam_m->add_rekam_medis_obat($obat);
                }

                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data rekam medis berhasil ditambahkan');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data rekam medis gagal ditambahkan');
            }
            redirect('rekam');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $id_decrypt = $this->encryption->decrypt(base64_decode(($id)));
        $query = $this->rekam_m->delete_rekam_medis($id_decrypt);
        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data rekam medis berhasil dihapus');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data rekam medis gagal dihapus');
        }
        redirect('rekam');
    }

    public function update_v()
    {
        $data['title'] = 'Rekam Medis';
        $data['pasien'] = $this->pasien_m->get_all();
        $data['dokter'] = $this->dokter_m->get_dokter();
        $data['poliklinik'] = $this->poliklinik_m->get_all_poliklinik();
        $data['obat'] = $this->obat_m->get_all_obat();
        $data['gabung'] = $this->rekam_m->all_join()[0];
        $id = $this->encryption->decrypt(base64_decode($this->uri->segment(3)));
        $data['rekam_medis'] = $this->rekam_m->get_by_id_rekam_medis($id);
        $rekam_medis_obat = $this->rekam_m->get_by_id_rekam_medis_obat($id);
        $obat = [];
        for ($i = 0; $i < count($rekam_medis_obat); $i++) {
            $obat[] = $rekam_medis_obat[$i]->id_obat;
        }
        $data['rekam_obat'] = $obat;

        $this->templates->load_inner('rekam/edit', $data, 'rekam', 'rekam');
    }

    public function update()
    {
        $id_rekam_medis = $this->encryption->decrypt($this->input->post('id_rekam_medis', true));
        $id_pasien = $this->encryption->decrypt($this->input->post('nama_pasien', true));
        $id_dokter = $this->encryption->decrypt($this->input->post('nama_dokter', true));
        $id_poliklinik = $this->encryption->decrypt($this->input->post('nama_poliklinik', true));
        $keluhan = $this->input->post('keluhan', true);
        $diagnosa = $this->input->post('diagnosa', true);
        $tanggal_periksa = htmlspecialchars($this->input->post('tanggal_periksa', true));
        $obat = $this->input->post('nama_obat');
        $obats = [];
        foreach ($obat as $id_obat) {
            $obats[] = $this->encryption->decrypt($id_obat);
        }

        $data = [
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter,
            'id_poliklinik' => $id_poliklinik,
            'keluhan' => $keluhan,
            'diagnosa' => $diagnosa,
            'tanggal_periksa' => $tanggal_periksa
        ];
        $rekam_obat = $this->rekam_obat_m->get_rekam_obat($id_rekam_medis);
        $id_rekam_obats = [];
        foreach ($rekam_obat as $id_rekam_obat) {
            $id_rekam_obats[] = $id_rekam_obat->id_rekam_medis_obat;
        }

        $query = $this->rekam_m->update_rekam_medis($id_rekam_medis, $data);

        if ($query > 0) {
            for ($i = 0; $i < count($id_rekam_obats); $i++) {
                $this->rekam_obat_m->update_rekam_obat($id_rekam_obats[$i], ['id_obat' => $obats[$i]]);
            }
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data rekam medis berhasil diupdate');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data rekam medis gagal diupdate');
        }
        redirect('rekam');
    }
}
