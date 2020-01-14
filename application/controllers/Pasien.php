<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Pasien extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->helper(['form', 'file']);
        $this->load->model('pasien_m');
        is_not_login();
    }

    public function pasien_v()
    {
        $data['title'] = 'Pasien';
        $this->templates->load_inner('pasien/data', $data, 'pasien', 'pasien');
    }

    public function all_pasien()
    {
        $hasil = $this->pasien_m->get_datatables();
        $no = $_POST['start'];
        $data = [];
        foreach ($hasil as $field) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $field->nomor_identitas;
            $row[] = $field->nama_pasien;
            $row[] = ($field->jenis_kelamin === 'L') ? "Laki-laki" : "Perempuan";
            $row[] = $field->alamat;
            $row[] = $field->no_telepon;
            $row[] = urlencode(base64_encode($this->encryption->encrypt($field->id_pasien)));
            $data[] = $row;
        }
        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pasien_m->count_total(),
            "recordsFiltered" => $this->pasien_m->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function add_v()
    {
        $data['title'] = 'Pasien';
        $this->templates->load_inner('pasien/add', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nomor_identitas', 'Nomor Identitas', 'trim|required|is_unique[tb_pasien.nomor_identitas]|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|required|numeric|min_length[11]|max_length[14]');

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
                'id_pasien' => $id,
                'nomor_identitas' => htmlspecialchars($this->input->post('nomor_identitas', true)),
                'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
            ];

            $query = $this->pasien_m->add($data);

            if ($query > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data pasien berhasil ditambahkan');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data pasien gagal ditambahkan');
            }
            redirect('pasien');
        }
    }

    public function update_v()
    {
        $data['title'] = 'Pasien';
        $id = $this->encryption->decrypt(base64_decode($this->uri->segment(3)));
        $data['pasien'] = $this->pasien_m->get_pasien_by_id($id);

        $this->templates->load_inner('pasien/edit', $data);
    }

    public function update()
    {
        $id = html_escape($this->encryption->decrypt($this->input->post('id_pasien', true)));
        $data = [
            'nomor_identitas' => html_escape($this->input->post('nomor_identitas', true)),
            'nama_pasien' => html_escape($this->input->post('nama_pasien', true)),
            'jenis_kelamin' => html_escape($this->input->post('jenis_kelamin', true)),
            'alamat' => html_escape($this->input->post('alamat', true)),
            'no_telepon' => html_escape($this->input->post('no_telepon', true))
        ];

        $query = $this->pasien_m->update($id, $data);
        if ($query >= 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data pasien berhasil diupdate');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data pasien gagal diupdate');
        }
        redirect('pasien');
    }

    public function delete()
    {
        $id = $this->encryption->decrypt(base64_decode($this->uri->segment(3)));
        $query = $this->pasien_m->delete($id);

        if ($query > 0) {
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Data pasien berhasil dihapus');
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Data pasien gagal dihapus');
        }
        redirect('pasien');
    }

    public function import_v()
    {
        $data['title'] = 'Pasien';
        $this->templates->load_inner('pasien/import', $data);
    }

    public function import()
    {
        $this->security->xss_clean($_FILES['import']['name']);
        $this->security->sanitize_filename($_FILES['import']['name']);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xls|xlsx|ods';
        $config['max_size']             = 2000;
        $config['file_ext_tolower']     = true;
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('import')) {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            redirect('pasien/ambil_v');
        } else {
            $obj = PHPExcel_IOFactory::load($this->upload->data()['full_path']);
            $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

            for ($i = 3; $i <= count($all_data); $i++) {
                $uuid = Uuid::uuid4()->toString();
                $nomor_identitas = strtolower(htmlspecialchars(trim($all_data[$i]['A'])));
                $nama_pasien = strtolower(htmlspecialchars(trim($all_data[$i]['B'])));
                $jenis_kelamin = strtolower(htmlspecialchars(trim($all_data[$i]['C'])));
                $alamat = strtolower(htmlspecialchars(trim($all_data[$i]['D'])));
                $no_telepon = strtolower(htmlspecialchars(trim($all_data[$i]['E'])));
                $data = [
                    'id_pasien' => $uuid,
                    'nomor_identitas' => $nomor_identitas,
                    'nama_pasien' => $nama_pasien,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'no_telepon' => $no_telepon,
                ];
                $query = $this->pasien_m->add($data);
            }
            if ($query > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Data pasien berhasil ditambahkan');
                delete_files('./uploads/', true, true);
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Data pasien gagal ditambahkan');
                delete_files('./uploads/', true, true);
            }
            redirect('pasien');
        }
    }
}
