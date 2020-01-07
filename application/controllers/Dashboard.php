<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_m', 'pasien_m', 'dokter_m', 'obat_m', 'rekam_m']);
    }

    public function data()
    {
        is_not_login();
        is_not_admin();
        $data['title'] = 'Dashboard';
        $data['jumlah_pasien'] = $this->pasien_m->count_pasien();
        $data['jumlah_dokter'] = $this->dokter_m->count_dokter();
        $data['jumlah_obat'] = $this->obat_m->count_obat();
        $data['jumlah_rekam_medis'] = $this->rekam_m->count_rekam();
        $data['pasien_terbaru'] = $this->pasien_m->new_pasien();

        $this->templates->load_inner('dashboard/data', $data, '', 'sweetalert');
    }

    public function list()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user_m->get_users();
        $this->templates->load_inner('dashboard/list', $data, 'dashboard', 'dashboard');
    }
}
