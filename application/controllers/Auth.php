<?php defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(['form', 'captcha', 'file']);
        $this->load->model('user_m');
    }

    public function login_v()
    {
        is_login();
        $this->session->unset_userdata('captcha_word');
        $data['judul']   = 'Login';
        $data['image'] = $this->make_captcha();
        $this->templates->load('auth/login', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|callback_check_password');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|min_length[8]|callback_check_captcha');

        if ($this->form_validation->run() === false) {
            $this->login_v();
        } else {
            $this->session->unset_userdata('captcha_word');

            $email     = htmlspecialchars($this->input->post('email', true));
            $user_data          = $this->user_m->get_user($email);
            $user_data_id = $user_data->id;
            $user_data_email = $user_data->email;
            $user_data_username = $user_data->username;
            $user_data_level = $user_data->level;
            $user_data_online = $user_data->online;
            $user_time_login = time();

            $this->user_m->user_login($user_data_id, $user_time_login);
            $this->session->set_userdata([
                'id'       => $user_data_id,
                'email'       => $user_data_email,
                'username' => $user_data_username,
                'login'    => $user_time_login,
                'level'    => $user_data_level,
                'online' => $user_data_online
            ]);

            if ($this->session->userdata('level') === 'admin') {
                redirect('beranda');
            } else {
                redirect('dokter');
            }
        }
    }

    public function register_v()
    {
        $data['judul'] = 'Register';
        $this->templates->load('auth/register', $data, 'register', 'register');
    }

    public function register()
    {
        try {
            $uuid4 = Uuid::uuid4();
            $id    = $uuid4->toString();
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

        $nama_depan    = htmlspecialchars($this->input->post('nama_depan', true));
        $nama_belakang = htmlspecialchars($this->input->post('nama_belakang', true));
        $username      = htmlspecialchars($this->input->post('username', true));
        $email         = htmlspecialchars($this->input->post('email', true));
        $password      = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        $input         = [
            'id'            => $id,
            'nama_depan'    => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'username'      => $username,
            'email'         => $email,
            'password'      => $password,
            'created'       => time(),
        ];

        $this->form_validation->set_rules('nama_depan', 'Nama depan', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->register_v();
        } else {
            $hasil = $this->user_m->register($input);
            if ($hasil > 0) {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Selamat Anda telah sukses registrasi.');
                redirect('auth');
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Maaf Anda gagal registrasi!');
                redirect('auth/daftar');
            }
        }
    }

    public function reset_v()
    {
        $data['judul'] = 'Reset';
        $this->templates->load('auth/reset', $data, 'register', 'register');
    }

    public function reset()
    {
        $email = $this->input->post('email', true);
        $token = $this->input->post('token', true);
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        $user_data = $this->user_m->get_user_token($email);

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->reset_v();
        } else {
            if ($user_data != null) {
                $user_token = $this->user_m->get_user_token($email)->token;

                if ($user_token == $token) {
                    $user_token_created = $user_data->created;
                    $selisih = time() - $user_token_created;

                    if ($selisih < (60 * 60)) {
                        $reset_password = $this->user_m->update_password_user($email, $password);

                        if ($reset_password > 0) {
                            $this->session->set_userdata([
                                'alert' => 'success',
                            ]);
                            $this->session->set_flashdata('pesan', 'Selamat password anda telah direset');
                            $this->user_m->delete_token($email, $token);
                        } else {
                            $this->session->set_userdata([
                                'alert' => 'danger',
                            ]);
                            $this->session->set_flashdata('pesan', 'Maaf password anda gagal direset');
                        }
                    } else {
                        $this->session->set_userdata([
                            'alert' => 'danger',
                        ]);
                        $this->session->set_flashdata('pesan', 'Maaf token anda telah kadaluarsa');
                        $this->user_m->delete_token($email, $token);
                    }
                } else {
                    $this->session->set_userdata([
                        'alert' => 'danger',
                    ]);
                    $this->session->set_flashdata('pesan', 'Maaf token anda tidak sesuai');
                }
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Maaf email tidak sesuai atau belum terdaftar');
            }
            redirect('auth/balik_v');
        }
    }

    public function forget_v()
    {
        $data['judul'] = 'Forget';
        $this->templates->load('auth/forget', $data);
    }

    public function forget()
    {
        $email = htmlspecialchars(html_escape($this->input->post('email', true)));

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->forget_v();
        } else {
            $token = base64_encode(random_bytes(16));

            $judul = 'Halaman reset password';
            $isi = 'Mohon klik tautan berikut untuk reset password anda <a href="' . site_url() . 'auth/balik_v?email=' . $email . '&token=' . urlencode($token) . '">Klik disini</a>';

            $this->user_m->insert_token($email, $token);

            $this->load->library('email');
            $this->email->from('awalp8627@gmail.com', 'Admin SIMRS');
            $this->email->to($email);
            $this->email->subject($judul);
            $this->email->message($isi);

            if (!$this->email->send()) {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Reset link gagal dikirim');
            } else {
                $this->session->set_userdata([
                    'alert' => 'success',
                ]);
                $this->session->set_flashdata('pesan', 'Reset link telah dikirim');
            }
            redirect('auth/lupa_v');
        }
    }

    public function make_captcha()
    {
        $options = array(
            'word'        => '',
            'img_path'    => './captcha/',
            'img_url'     => base_url() . 'captcha',
            'font_path'   => './assets/fonts/nunito-v9-latin-regular.ttf',
            'img_width'   => '250',
            'img_height'  => 50,
            'word_length' => 8,
            'font_size'   => 22,

            // White background and border, black text and red grid
            'colors'      => array(
                'background' => array(255, 255, 255),
                'border'     => array(255, 255, 255),
                'text'       => array(0, 0, 0),
                'grid'       => array(255, 40, 40),
            ),
        );

        $cap = create_captcha($options);
        $this->session->set_userdata('captcha_word', $cap['word']);
        return $cap['image'];
    }

    public function check_password()
    {
        $email     = htmlspecialchars($this->input->post('email', true));
        $password     = $this->input->post('password', true);
        $user_data          = $this->user_m->get_user($email);

        if ($user_data != null) {
            $user_data_password = $user_data->password;
            $match = password_verify($password, $user_data_password);

            if ($match) {
                return true;
            } else {
                $this->form_validation->set_message('check_password', 'Kolom {field} tidak sesuai');
                return false;
            }
        }
    }

    public function check_email()
    {
        $email     = htmlspecialchars($this->input->post('email', true));
        $user_data          = $this->user_m->get_user($email);
        if ($user_data != null) {
            return true;
        } else {
            $this->form_validation->set_message('check_email', 'Kolom {field} belum terdaftar');
            return false;
        }
    }

    public function check_captcha()
    {
        $userinput = $this->input->post('captcha', true);
        $usersession = $this->session->userdata('captcha_word');
        if ($userinput === $usersession) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'Kolom {field} tidak sesuai');
            return false;
        }
    }

    private function delete_captcha()
    {
        delete_files('./captcha/', true, true);
    }

    private function delete_cache()
    {
        delete_files('./application/cache/', true, true);
    }

    public function logout()
    {
        $user_data_id = $this->session->userdata('id');
        $user_time_logout = time();
        $query = $this->user_m->user_logout($user_data_id, $user_time_logout);

        if ($query > 0) {
            $this->session->sess_destroy();
            $_SESSION = [];
            unset($_SESSION);
            session_destroy();
            session_unset();
            $this->delete_cache();
            $this->delete_captcha();
        }
        redirect('auth');
    }
}
