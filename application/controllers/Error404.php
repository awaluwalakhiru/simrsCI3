<?php defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('templates');
    }

    public function error404_v()
    {
        $data['judul'] = '404 Not Found Page';
        $this->templates->load('errors/error404', $data, 'error', 'error');
    }
}
