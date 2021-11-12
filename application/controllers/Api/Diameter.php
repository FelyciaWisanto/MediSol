<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Diameter extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Diameter_model');

        // cek token        
        $token = $this->authorization_token->validateToken();

        if ($token['status']) {
            // NOTHING 
        } else {
            $respon = array(
                'sukses' => false,
                'gagal_detail' => 'akses ditolak! Anda membutuhkan token yang valid'
            );
            $this->response($respon, REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    public function daftar_diameter_get()
    {
        $response['suskes'] = true;
        $response['count'] = $this->Diameter_model->daftar_diameter()->num_rows();
        $response['data'] = $this->Diameter_model->daftar_diameter()->result();
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
