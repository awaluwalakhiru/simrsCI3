<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table_user;
    protected $table_user_token;
    protected $table_dokter;
    protected $table_obat;
    protected $table_pasien;
    protected $table_poliklinik;
    protected $table_rekam_medis;
    protected $table_rekam_medis_obat;

    public function __construct()
    {
        parent::__construct();
    }
}
