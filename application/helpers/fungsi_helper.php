<?php defined('BASEPATH') or exit('No direct script access allowed');
function is_login()
{
    $CI = &get_instance();
    $CI->load->library('session');
    $online = $CI->session->userdata('online');

    if ($online) {
        redirect('beranda');
    }
}

function is_not_login()
{
    $CI = &get_instance();
    $CI->load->library('session');
    $online = $CI->session->userdata('online');

    if (!$online) {
        redirect('auth');
    }
}
