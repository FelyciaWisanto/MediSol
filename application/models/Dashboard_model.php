<?php

class Dashboard_model extends CI_Model
{

    function obat()
    {
        $result = $this->db->query('select * from obat');
        return $result;
    }

    function apotek()
    {
        $result = $this->db->query('select * from apotek');
        return $result;
    }

    function admin()
    {
        $result = $this->db->query('select * from admin');
        return $result;
    }

    // QUERY MENAMPILKAN DAFTAR apotek
    function daftar_apotek()
    {
        $result = $this->db->query('select * from apotek');
        return $result;
    }

    function apotekby($id)
    {
        $result = $this->db->query('select * from apotek where id = "' . $id . '"');
        return $result;
    }

    function daftar_obat_apotek($id)
    {
        $result = $this->db->query('SELECT obat.*, obat_apotek.id as id_obat_apotek FROM obat, obat_apotek, apotek WHERE apotek.id = obat_apotek.id_apotek AND obat_apotek.id_obat = obat.id AND apotek.id = "' . $id . '"');
        return $result;
    }

    function daftar_obat($id)
    {
        $result = $this->db->query('SELECT obat.* FROM obat');
        return $result;
    }

    // QUERY MENAMPILKAN DAFTAR apotek BERDASARKAN ROLE
    function daftar_apotek_by_role($role)
    {
        $result = $this->db->query('select id, apotekname, nama_lengkap, role, jenis from apotek where role="' . $role . '"');
        return $result;
    }

    // QUERY MENGECEK apotekNAME
    function checkapotek($where)
    {
        $this->db->where($where);
        $query = $this->db->get("admin");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //QUERY MENGHAPUS apotek
    function hapusapotek($where)
    {
        $this->db->where($where);
        $this->db->delete('apotek');
    }

    function hapus_obat($where)
    {
        $this->db->where($where);
        $this->db->delete('obat_apotek');
    }

    //QUERY MENGEDIT apotek
    function edit_apotek($id, $data)
    {
        $this->db->where('id', $id);
        // $this->db->set('update_time', 'NOW()', FALSE);
        $this->db->update('apotek', $data);
    }

    //QUERY MENAMBAH apotek
    function input_apotek($where)
    {
        $this->db->set('id', 'UUID()', FALSE);
        // $this->db->set('create_time', 'NOW()', FALSE);
        $this->db->insert('apotek', $where);
    }

    function input_obat_apotek($where)
    {
        $this->db->set('id', 'UUID()', FALSE);
        // $this->db->set('create_time', 'NOW()', FALSE);
        $this->db->insert('obat_apotek', $where);
    }

    function cek_login($where)
    {
        return $this->db->get_where('admin', $where);
    }
}
