<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
<<<<<<< HEAD
    protected $table_user, $table_user_token, $table_dokter, $table_pasien, $table_obat, $table_poliklinik, $table_rekam_medis, $table_rekam_medis_obat, $column_search, $column_order, $order;
=======
    protected $table_user;
    protected $table_user_token;
    protected $table_dokter;
    protected $table_obat;
    protected $table_pasien;
    protected $table_poliklinik;
    protected $table_rekam_medis;
    protected $table_rekam_medis_obat;
>>>>>>> f2a6d8f63ca989c96c3542592626967af8149708

    public function __construct()
    {
        parent::__construct();
    }
}
