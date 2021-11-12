<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Product_model');
    }

    public function index()
    {
        $jumlah_data = $this->Product_model->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'product/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 6;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        // $data['daftar_obat'] = $this->Product_model->daftar_obat()->result();
        $data['daftar_obat'] = $this->Product_model->data($config['per_page'], $from);
        $this->load->template_user('user/product', $data);
    }

    public function detail()
    {
        $id = $this->input->get('id');
        $data['obat'] = $this->Product_model->obat_byid($id)->result();
        $data['apotek'] = $this->Product_model->apotek_byid($id)->result();
        $this->load->template_user('user/product_detail', $data);
    }
}
