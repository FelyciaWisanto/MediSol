<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['obat'] = $this->Dashboard_model->obat()->num_rows();
        $data['apotek'] = $this->Dashboard_model->apotek()->num_rows();
        $data['admin'] = $this->Dashboard_model->admin()->num_rows();
        $this->load->template('admin/dashboard', $data);
    }
}
