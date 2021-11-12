<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['daftar_obat'] = $this->Obat_model->daftar_obat()->result();
        $this->load->template('admin/obat', $data);
    }

    public function tambah()
    {
        $this->load->template('admin/obat_tambah');
    }

    public function edit()
    {
        $id = $this->input->get('id');
        $data['obat'] = $this->Obat_model->obat_byid($id)->result();
        $this->load->template('admin/obat_edit', $data);
    }

    public function tambah_obat()
    {
        $nama = $this->input->post('nama');
        $komposisi = $this->input->post('komposisi');
        $efek_samping = $this->input->post('efek_samping');
        $indikasi = $this->input->post('indikasi');
        $dosis = $this->input->post('dosis');
        $aturan_pakai = $this->input->post('aturan_pakai');
        $perhatian = $this->input->post('perhatian');
        $keterangan = $this->input->post('editordata');

        $config['upload_path'] = './asset/obat/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        // $this->upload->do_upload('gambar');

        if (!$this->upload->do_upload('gambar')) {
            $data = $this->upload->display_errors();
            $this->session->set_flashdata('error', $data);
            redirect(base_url('obat/tambah'));
        } else {
            $uploaded_data = $this->upload->data();
            $data = array(
                'nama' => $nama,
                'komposisi' => $komposisi,
                'efek_samping' => $efek_samping,
                'indikasi' => $indikasi,
                'dosis' => $dosis,
                'aturan_pakai' => $aturan_pakai,
                'perhatian' => $perhatian,
                'gambar' => $uploaded_data['file_name'],
                'keterangan' => $keterangan,
            );
            $result2 = $this->Obat_model->input_obat($data);
            if ($result2) {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect(base_url('obat/tambah'));
            } else {
                $this->session->set_flashdata('success', 'Obat Berhasil Ditambahkan');
                redirect(base_url('obat'));
            }
        }
    }

    public function edit_obat()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('edit_nama');
        $komposisi = $this->input->post('edit_komposisi');
        $efek_samping = $this->input->post('edit_efek_samping');
        $indikasi = $this->input->post('edit_indikasi');
        $dosis = $this->input->post('edit_dosis');
        $aturan_pakai = $this->input->post('edit_aturan_pakai');
        $perhatian = $this->input->post('edit_perhatian');
        $keterangan = $this->input->post('editordataedit');

        $config['upload_path'] = './asset/obat/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        // $this->upload->do_upload('edit_gambar');

        if (is_uploaded_file($_FILES['edit_gambar']['tmp_name'])) {
            if (!$this->upload->do_upload('edit_gambar')) {
                $data = $this->upload->display_errors();
                $this->session->set_flashdata('error', $data);
                redirect(base_url('obat'));
            } else {
                $uploaded_data = $this->upload->data();
                $data = array(
                    'nama' => $nama,
                    'komposisi' => $komposisi,
                    'efek_samping' => $efek_samping,
                    'indikasi' => $indikasi,
                    'dosis' => $dosis,
                    'aturan_pakai' => $aturan_pakai,
                    'perhatian' => $perhatian,
                    'gambar' => $uploaded_data['file_name'],
                    'keterangan' => $keterangan,
                );
                $result2 = $this->Obat_model->edit_obat($id, $data);
                if ($result2) {
                    $this->session->set_flashdata('error', 'Data gagal Diupdate');
                    redirect(base_url('obat'));
                } else {
                    $this->session->set_flashdata('success', 'Obat Berhasil Diupdate');
                    redirect(base_url('obat'));
                }
            }
        } else {
            $data = array(
                'nama' => $nama,
                'komposisi' => $komposisi,
                'efek_samping' => $efek_samping,
                'indikasi' => $indikasi,
                'dosis' => $dosis,
                'aturan_pakai' => $aturan_pakai,
                'perhatian' => $perhatian,
                'keterangan' => $keterangan,
            );
            $result2 = $this->Obat_model->edit_obat($id, $data);
            if ($result2) {
                $this->session->set_flashdata('error', 'Data gagal Diupdate');
                redirect(base_url('obat'));
            } else {
                $this->session->set_flashdata('success', 'Obat Berhasil Diupdate');
                redirect(base_url('obat'));
            }
        }
    }

    public function hapus_obat()
    {
        $id = $this->input->get('id');

        $data = array(
            'id' => $id,
        );

        $result2 = $this->Obat_model->hapusobat($data);


        if ($result2) {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('obat'));
        } else {
            $this->session->set_flashdata('success', 'Obat Berhasil Dihapus');
            redirect(base_url('obat'));
        }
    }
}
