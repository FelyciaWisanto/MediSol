<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
define('EXT', '.' . pathinfo(__FILE__, PATHINFO_EXTENSION));
define('PUBPATH', str_replace(SELF, '', FCPATH)); // added

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Permintaan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Permintaan_model');

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

    public function daftar_permintaan_post()
    {
        $id_tim = $this->post('id_tim');
        $response['suskes'] = true;
        $response['count'] = $this->Permintaan_model->daftar_permintaan_by_tim('assigned', $id_tim)->num_rows();        
        $response['data'] = $this->Permintaan_model->daftar_permintaan_by_tim('assigned', $id_tim)->result();        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function daftar_selesai_post()
    {
        $id_tim = $this->post('id_tim');
        $response['suskes'] = true;
        $response['count'] = $this->Permintaan_model->daftar_permintaan_by_tim('completed', $id_tim)->num_rows();        
        $response['data'] = $this->Permintaan_model->daftar_permintaan_by_tim('completed', $id_tim)->result();        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function detail_permintaan_post()
    {
        $id = $this->post('id_permintaan');
        $response['suskes'] = true;        
        $permintaan = $this->Permintaan_model->detail_permintaan_by_id($id)->row_array();
        $tempData['id'] = $permintaan['id'];
        $tempData['nomor_pelanggan'] = $permintaan['nomor_pelanggan'];
        $tempData['nomor_permintaan'] = $permintaan['nomor_permintaan'];
        $tempData['zona_wilayah'] = $permintaan['zona_wilayah'];
        $tempData['alamat'] = $permintaan['alamat'];
        $tempData['jenis_kerusakan'] = $permintaan['jenis_kerusakan'];
        $tempData['nomor_spk'] = $permintaan['nomor_spk'];
        $tempData['nomor_berita_acara'] = $permintaan['nomor_berita_acara'];
        $tempData['status'] = $permintaan['status'];
        $tempData['start_time'] = $permintaan['start_time'];
        $tempData['end_time'] = $permintaan['end_time'];
        $tempData['before_foto'] = FCPATH . "asset/upload_images/".$permintaan['before_foto'];
        $tempData['end_time'] = $permintaan['before_merk'];
        $tempData['after_foto'] = FCPATH . "asset/upload_images/".$permintaan['after_foto'];                
        $tempData['before_merk'] = $permintaan['before_merk'];
        $tempData['after_merk'] = $permintaan['after_merk'];
        $tempData['before_diameter'] = $permintaan['before_diameter'];
        $tempData['after_diameter'] = $permintaan['after_diameter'];
        $tempData['after_nomor_segel'] = $permintaan['after_nomor_segel'];
        $tempData['before_nomor_segel'] = $permintaan['before_nomor_segel'];
        $tempData['before_nomor_seri'] = $permintaan['before_nomor_seri'];
        $tempData['before_keterangan'] = $permintaan['before_keterangan'];
        $tempData['after_nomor_seri'] = $permintaan['after_nomor_seri'];
        $tempData['tanggal_laporan'] = $permintaan['tanggal_laporan'];
        $tempData['nama_teknisi'] = $permintaan['nama_teknisi'];
        $tempData['nama_tukang_1'] = $permintaan['nama_tukang_1'];
        $tempData['nama_tukang_2'] = $permintaan['nama_tukang_2'];
        $tempData['satisfaction_index'] = $permintaan['satisfaction_index'];
        $response['data'] = $tempData;        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function input_permintaan_post(){
        $target_dir = FCPATH . "asset/upload_images";
        if(!file_exists($target_dir)){
            //membuat folder image
            mkdir($target_dir, 0777, true);
        }
        $jsonArray = json_decode(file_get_contents('php://input'),true);         
        $id = $jsonArray['id_permintaan'];        
        $before_foto = $jsonArray['before_foto'];
        $after_foto = $jsonArray['after_foto'];
        $tanda_tangan = $jsonArray['tanda_tangan'];        
        $start_time = $jsonArray['start_time'];
        $end_time = $jsonArray['end_time'];
        $before_merk = $jsonArray['before_merk'];
        $before_diameter = $jsonArray['before_diameter'];
        $before_no_segel = $jsonArray['before_no_segel'];
        $before_no_seri = $jsonArray['before_no_seri'];
        $before_keterangan = $jsonArray['before_keterangan'];
        $after_merk = $jsonArray['after_merk'];
        $after_diameter = $jsonArray['after_diameter'];
        $after_no_segel = $jsonArray['after_no_segel'];
        $after_no_seri = $jsonArray['after_no_seri'];
        $satis = $jsonArray['satisfaction_index'];
        $material = $jsonArray['material'];
        $nama_before = rand().".jpeg";
        $nama_after = rand().".jpeg";
        $nama_ttd = rand().".jpeg";				
		$target_dir1 = $target_dir."/".$nama_before;
		$target_dir2 = $target_dir."/".$nama_after;
        $target_dir3 = $target_dir."/".$nama_ttd;        

        foreach((array)$material as $a){            
            $dataMaterial = array(
                'id_permintaan'=> $a['id_permintaan'],
                'nama'=> $a['nama'],
                'jumlah'=> $a['jumlah']
            );
            $this->Permintaan_model->tambah_permintaan_lampiran($dataMaterial);
        }
        
        $data = array(
            'start_time' => $start_time,
            'end_time' => $end_time,
            'status' => "completed",
            'before_foto' => $nama_before,
            'before_merk' => $before_merk,
            'before_diameter' => $before_diameter,
            'before_nomor_segel' => $before_no_segel,
            'before_nomor_seri' => $before_no_seri,
            'before_keterangan' => $before_keterangan,
            'after_foto' => $nama_after,
            'after_merk' => $after_merk,
            'after_diameter' => $after_diameter,
            'after_nomor_segel' => $after_no_segel,
            'after_nomor_seri' => $after_no_seri,            
            'tanda_tangan' => $nama_ttd,
            'satisfaction_index' => $satis
        );
        $this->Permintaan_model->edit_permintaan($id,$data);

        file_put_contents($target_dir1, base64_decode($before_foto));
        file_put_contents($target_dir2, base64_decode($after_foto));
        file_put_contents($target_dir3, base64_decode($tanda_tangan));        
        $response['target_dir'] = $jsonArray['id_permintaan'];
        $response['success'] = true;
        $response['message'] = "Data berhasil disimpan";        
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
