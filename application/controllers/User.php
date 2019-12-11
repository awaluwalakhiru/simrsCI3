<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "ini halaman controller User/index level user";
        echo anchor('auth/keluar', 'Keluar');
    }
}
