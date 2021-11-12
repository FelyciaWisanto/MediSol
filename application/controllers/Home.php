<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
    }

    public function index()
    {
        $data['daftar_obat'] = $this->Obat_model->obat_home()->result();
        $this->load->template_user('user/halaman_utama', $data);
    }
}
