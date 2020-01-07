<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->library(array('form_validation', 'encryption'));
        $this->load->helper('form');
    }

    public function profile()
    {
<<<<<<< HEAD
        $data['title'] = 'User';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user_m->get_user($email);
        $this->templates->load_inner('user/data', $data, 'user', 'user');
    }

    public function settings()
    {
        $data['title'] = 'User';
        $email = html_escape($this->session->userdata('email'));
        $data['user'] = $this->user_m->get_user($email);
        $this->templates->load_inner('user/setting', $data, 'user', 'user');
    }

    public function update()
    {
        if ($_FILES['foto']['name'] != 'default.png' && $_FILES['foto']['name'] != '') {
            $id = html_escape($this->encryption->decrypt($this->input->post('id', true)));

            $data = [
                'nama_depan' => html_escape($this->input->post('nama_depan', true)),
                'nama_belakang' => html_escape($this->input->post('nama_belakang', true)),
                'username' => html_escape($this->input->post('username', true)),
                'facebook' => html_escape($this->input->post('facebook', true)),
                'twitter' => html_escape($this->input->post('twitter', true)),
                'github' => html_escape($this->input->post('github', true)),
                'instagram' => html_escape($this->input->post('instagram', true)),
                'job' => $this->input->post('job', true),
                'biografi' => $this->input->post('biografi', true),
            ];
            $query = $this->user_m->update_user($id, $data);
            if ($query > 0) {
                $config['upload_path']          = './assets/img/avatar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['encrypt_name']         = true;
                $config['file_ext_tolower']     = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_userdata([
                        'alert' => 'danger',
                    ]);
                    $this->session->set_flashdata('pesan', 'Profile gagal diupdate');
                } else {
                    $email = html_escape($this->session->userdata('email'));
                    $old_foto = $this->user_m->get_user($email)->foto;

                    unlink('./assets/img/avatar/' . $old_foto);

                    $data = [
                        'foto' => $this->upload->data('file_name')
                    ];
                    $this->user_m->update_user($id, $data);

                    $this->session->set_userdata([
                        'alert' => 'success',
                    ]);
                    $this->session->set_flashdata('pesan', 'Profile berhasil diupdate');
                }
                redirect('user/bio');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Gagal update profile');
                redirect('user/bio');
            }
        }
=======
        echo "ini halaman controller User/index level user";
        echo anchor('auth/keluar', 'Keluar');
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
    }
}
