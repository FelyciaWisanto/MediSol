<?php

use Restserver\Libraries\REST_Controller;
// import library dari REST_Controller
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

// extends class dari REST_Controller
class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Tim_model');

        // Call the verification method and store the return value in the variable    
    }

    public function aksi_login_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        if ($username == null || $password == null) {
            $data['code'] = parent::HTTP_UNAUTHORIZED;
            $data['status'] = false;
            $data['message'] = "Username / Password Kosong";
            $this->response($data, parent::HTTP_UNAUTHORIZED);
        } else {
            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            $cek = $this->User_model->cek_login($where)->num_rows();
            if ($cek > 0) {
                $result = $this->User_model->cek_login($where)->result();
                $result_id_tim = $this->Tim_model->get_id_tim($result[0]->id)->result();
                $data_session = array(
                    'nama_lengkap' => $result[0]->nama_lengkap,
                    'username' => $result[0]->username,
                    'jenis' => $result[0]->jenis,
                    'id_tim' => $result_id_tim[0]->id,
                    'role' => $result[0]->role,
                    'time' => time()
                );

                $user_token = $this->authorization_token->generateToken($data_session);
                $data['status'] = true;
                $data['id'] = $result[0]->id;
                $data['nama_lengkap'] = $result[0]->nama_lengkap;
                $data['username'] = $result[0]->username;
                $data['jenis'] = $result[0]->jenis;
                $data['role'] = $result[0]->role;
                $data['id_tim'] = $result_id_tim[0]->id;
                $data['token'] = $user_token;
                $this->response($data, parent::HTTP_OK);
            } else {
                $data['code'] = parent::HTTP_UNAUTHORIZED;
                $data['status'] = false;
                $data['message'] = "Username / Password Salah";
                $this->response($data, parent::HTTP_UNAUTHORIZED);
            }
        }
    }
}
