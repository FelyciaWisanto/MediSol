<?php

use Restserver\Libraries\REST_Controller;
// import library dari REST_Controller
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class TestApi extends REST_Controller
{
  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Tim_model');
    $this->load->model('User_model');

    // Call the verification method and store the return value in the variable    
  }
  public function index_get()
  {
    // testing response
    // $response['error'] = false;
    // $response['message'] = 'Hai from response';
    // // tampilkan response
    // $this->response($response);

    $data = $this->authorization_token->validateToken();
    // Send the return data as reponse
    $status = parent::HTTP_OK;
    $response = ['status' => $status, 'data' => $data];
    $this->response($data, parent::HTTP_UNAUTHORIZED);
  }

  public function tim_get()
  {
    $token_data['id'] = 1;
    $token_data['user_name'] = 'Jason';
    $token_data['email'] = 'Jason@gmail.com';
    $token_data['time'] = time();

    $user_token = $this->authorization_token->generateToken($token_data);

    // print_r($this->authorization_token->userData());
    // exit;

    $data['daftar_tim'] = $this->Tim_model->daftar_tim()->result();
    $data['daftar_user'] = $this->User_model->daftar_user()->result();
    // $this->load->template('daftar_tim', $data);
    $response['status'] = 200;
    $response['error'] = false;
    $response['token'] = $user_token;
    $response['data'] = $this->User_model->daftar_user()->result();
    $this->response($response);
  }
  public function user_get()
  {
    // testing response
    $response['status'] = 200;
    $response['error'] = false;
    $response['user']['username'] = 'erthru';
    $response['user']['email'] = 'ersaka96@gmail.com';
    $response['user']['detail']['full_name'] = 'Suprianto D';
    $response['user']['detail']['position'] = 'Developer';
    $response['user']['detail']['specialize'] = 'Android,IOS,WEB,Desktop';
    //tampilkan response
    $this->response($response);
  }
}
