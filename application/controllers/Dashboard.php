<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('user_m');
    }

    public function data()
    {
        $username = $this->encryption->decrypt($this->session->userdata('username'));
        $user_data = $this->user_m->get_user($username);
        $elapsed = time() - $user_data->login;
        $data['login'] = floor($elapsed / 60);
        $data['username'] = ucfirst($username);
        $this->templates->load_inner('dashboard/data', $data);
    }
}
