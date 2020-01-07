<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table_user, $table_user_token, $table_dokter, $table_pasien, $table_obat, $table_poliklinik, $table_rekam_medis, $table_rekam_medis_obat, $column_search, $column_order, $order;

    public function __construct()
    {
        parent::__construct();
    }
}
