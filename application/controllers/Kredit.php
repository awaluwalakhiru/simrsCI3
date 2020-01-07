<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kredit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function created()
    {
        $data['title'] = 'Created By';
        $this->templates->load_inner('kredit/data', $data);
    }
}
