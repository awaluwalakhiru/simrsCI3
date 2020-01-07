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
<<<<<<< HEAD
}

function is_admin()
{
    $CI = &get_instance();
    $CI->load->library('session');
    $CI->load->model('user_m');

    $admin = $CI->session->userdata('level');

    if ($admin === 'admin') {
        redirect('beranda');
    }
}

function is_not_admin()
{
    $CI = &get_instance();
    $CI->load->model('user_m');
    $CI->load->library('session');

    $admin = $CI->session->userdata('level');

    if ($admin !== 'admin') {
        redirect('dokter');
    }
=======
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708
}
