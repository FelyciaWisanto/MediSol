<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Apotek_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['daftar_apotek'] = $this->Apotek_model->daftar_apotek()->result();
        $this->load->template('admin/apotek', $data);
    }

    public function obat()
    {
        $id = $this->input->get('id');
        $data['daftar_obat_apotek'] = $this->Apotek_model->daftar_obat_apotek($id)->result();
        $data['daftar_obat'] = $this->Apotek_model->daftar_obat($id)->result();
        $data['apotek'] = $this->Apotek_model->apotekby($id)->result();
        $data['id_apotek'] = $id;
        $this->load->template('admin/obat_apotek', $data);
    }

    public function tambah_obat()
    {
        $id_obat = $this->input->post('id_obat');
        $id_apotek = $this->input->post('id_apotek');



        for ($i = 0; $i < count($id_obat); $i++) {
            // $data[$i]['id_obat'] = $id_obat[$i];
            // $data[$i]['id_apotek'] = $id_apotek;
            $data = array(
                'id_obat' => $id_obat[$i],
                'id_apotek' => $id_apotek,
            );
            $result2 = $this->Apotek_model->input_obat_apotek($data);
        }


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('apotek/obat?id=' . $id_apotek));
        } else {
            $this->session->set_flashdata('success', 'Obat Apotek Berhasil Ditambahkan');
            redirect(base_url('apotek/obat?id=' . $id_apotek));
        }
    }

    public function tambah_apotek()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $longitude = $this->input->post('longitude');
        $langitude = $this->input->post('langitude');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'longitude' => $longitude,
            'langitude' => $langitude,
        );
        $result2 = $this->Apotek_model->input_apotek($data);
        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect(base_url('apotek'));
        } else {
            $this->session->set_flashdata('success', 'Apotek Berhasil Ditambahkan');
            redirect(base_url('apotek'));
        }
    }

    public function edit_apotek()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('edit_nama');
        $alamat = $this->input->post('edit_alamat');
        $longitude = $this->input->post('edit_longitude');
        $langitude = $this->input->post('edit_langitude');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'longitude' => $longitude,
            'langitude' => $langitude,
        );

        $result2 = $this->Apotek_model->edit_apotek($id, $data);

        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
            redirect(base_url('apotek'));
        } else {
            $this->session->set_flashdata('success', 'Apotek Berhasil Diupdate');
            redirect(base_url('apotek'));
        }
    }

    public function hapus_apotek()
    {
        $id = $this->input->get('id');

        $data = array(
            'id' => $id,
        );

        $result2 = $this->Apotek_model->hapusapotek($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Apotek gagal dihapus');
            redirect(base_url('apotek'));
        } else {
            $this->session->set_flashdata('success', 'Apotek Berhasil Dihapus');
            redirect(base_url('apotek'));
        }
    }

    public function hapus_obat()
    {
        $id = $this->input->get('id');
        $id_apotek = $this->input->get('id_apotek');

        $data = array(
            'id' => $id,
        );

        $result2 = $this->Apotek_model->hapus_obat($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Obat Apotek gagal dihapus');
            redirect(base_url('apotek/obat?id=' . $id_apotek));
        } else {
            $this->session->set_flashdata('success', 'Obat Apotek Berhasil Dihapus');
            redirect(base_url('apotek/obat?id=' . $id_apotek));
        }
    }
}
