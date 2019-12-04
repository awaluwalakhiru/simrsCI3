<?php defined('BASEPATH') or exit('No direct script access allowed');

class Templates
{
    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function load($view = "", $data = [], $css = "", $js = "", $return = false)
    {
        if ($css == "") {
            $data['css'] = '';
        } else {
            $data['css'] = $this->CI->load->view('templates/css/' . $css, '', true);
        }
        if ($js == "") {
            $data['js'] = '';
        } else {
            $data['js'] = $this->CI->load->view('templates/js/' . $js, '', true);
        }
        $this->CI->load->view('templates/header', $data, $return);
        $this->CI->load->view($view, $data, $return);
        $this->CI->load->view('templates/footer', $data, $return);
    }

    public function load_inner($view = "", $data = [], $css = "", $js = "", $return = false)
    {
        if ($css == "") {
            $data['css'] = '';
        } else {
            $data['css'] = $this->CI->load->view('templates/css/' . $css, '', true);
        }
        if ($js == "") {
            $data['js'] = '';
        } else {
            $data['js'] = $this->CI->load->view('templates/js/' . $js, '', true);
        }
        $this->CI->load->view('templates/header_inner', $data, $return);
        $this->CI->load->view($view, $data, $return);
        $this->CI->load->view('templates/footer_inner', $data, $return);
    }
}
