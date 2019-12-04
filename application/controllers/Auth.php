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
        $data['judul']   = 'Login';
        $data['captcha'] = $this->make_captcha();
        $this->templates->load('auth/login', $data);
    }

    public function login()
    {
        $this->load->library('encryption');

        $captcha      = htmlspecialchars(html_escape($this->input->post('captcha', true)));
        $captcha_user = htmlspecialchars(html_escape($this->input->post('captcha_user', true)));
        $username     = htmlspecialchars(html_escape($this->input->post('username', true)));
        $password     = htmlspecialchars(html_escape($this->input->post('password', true)));
        $user_ip      = $this->input->ip_address();

        $is_user            = $this->user_m->has_user($username);
        $user_data          = $this->user_m->get_user($username);
        $user_data_id       = $user_data->id;
        $user_data_password = $user_data->password;
        $user_time_login    = time();
        $user_data_level    = $user_data->level;

        if ($is_user > 0) {
            $match = password_verify($password, $user_data_password);
            if ($match) {
                if ($captcha_user == $captcha) {
                    $this->session->set_userdata([
                        'id'       => $user_data_id,
                        'username' => $this->encryption->encrypt($username),
                        'login'    => $user_time_login,
                        'level'    => $user_data_level,
                        'user_ip'  => $user_ip,
                    ]);
                    $query = $this->user_m->user_login($user_data_id, $user_time_login);

                    if ($query > 0) {
                        if ($user_data_level == 'admin') {
                            redirect('beranda');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_userdata([
                            'alert' => 'danger',
                        ]);
                        $this->session->set_flashdata('pesan', 'Anda gagal masuk');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_userdata([
                        'alert' => 'danger',
                    ]);
                    $this->session->set_flashdata('pesan', 'Captcha anda tidak cocok');
                    redirect('auth');
                }
            } else {
                $this->session->set_userdata([
                    'alert' => 'danger',
                ]);
                $this->session->set_flashdata('pesan', 'Password anda tidak cocok');
                redirect('auth');
            }
        } else {
            $this->session->set_userdata([
                'alert' => 'danger',
            ]);
            $this->session->set_flashdata('pesan', 'Username ' . $username . ' belum terdaftar');
            redirect('auth');
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
        $password      = htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
        $password2     = htmlspecialchars($this->input->post('password2', true));
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
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|is_unique[tb_user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
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
        $this->templates->load('auth/reset', $data);
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
            $this->session->set_userdata([
                'alert' => 'success',
            ]);
            $this->session->set_flashdata('pesan', 'Reset link telah dikirim');
            redirect('auth/lupa_v');
        }
    }

    public function make_captcha()
    {
        $vals = array(
            'word'        => '',
            'img_path'    => './captcha/',
            'img_url'     => base_url() . 'captcha',
            'font_path'   => './assets/fonts/nunito-v9-latin-regular.ttf',
            'img_width'   => '280',
            'img_height'  => 45,
            'expiration'  => 7200,
            'word_length' => 8,
            'font_size'   => 20,
            'img_id'      => 'Imageid',
            'pool'        => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'      => array(
                'background' => array(255, 255, 255),
                'border'     => array(255, 255, 255),
                'text'       => array(0, 0, 0),
                'grid'       => array(255, 40, 40),
            ),
        );

        $cap = create_captcha($vals);
        return $cap;
    }

    public function delete_captcha()
    {
        delete_files('./captcha/');
    }

    public function delete_cache()
    {
        delete_files('./application/cache/');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $_SESSION = [];
        session_destroy();
        session_unset();
        redirect('auth');
    }
}
