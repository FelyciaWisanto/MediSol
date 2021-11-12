<?php

class Obat_model extends CI_Model
{

    // QUERY MENAMPILKAN DAFTAR obat
    function daftar_obat()
    {
        $result = $this->db->query('select * from obat');
        return $result;
    }

    function obat_home()
    {
        $result = $this->db->query('select * from obat limit 4');
        return $result;
    }

    function obat_byid($id)
    {
        $result = $this->db->query('select * from obat where id="' . $id . '"');
        return $result;
    }

    // QUERY MENAMPILKAN DAFTAR obat BERDASARKAN ROLE
    function daftar_obat_by_role($role)
    {
        $result = $this->db->query('select id, obatname, nama_lengkap, role, jenis from obat where role="' . $role . '"');
        return $result;
    }

    // QUERY MENGECEK obatNAME
    function checkobat($where)
    {
        $this->db->where($where);
        $query = $this->db->get("admin");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //QUERY MENGHAPUS obat
    function hapusobat($where)
    {
        $this->db->where($where);
        $this->db->delete('obat');
    }

    //QUERY MENGEDIT obat
    function edit_obat($id, $data)
    {
        $this->db->where('id', $id);
        // $this->db->set('update_time', 'NOW()', FALSE);
        $this->db->update('obat', $data);
    }

    //QUERY MENAMBAH obat
    function input_obat($where)
    {
        $this->db->set('id', 'UUID()', FALSE);
        // $this->db->set('create_time', 'NOW()', FALSE);
        $this->db->insert('obat', $where);
    }

    function cek_login($where)
    {
        return $this->db->get_where('admin', $where);
    }
}
