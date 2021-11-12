<?php

class User_model extends CI_Model
{

    // QUERY MENAMPILKAN DAFTAR USER
    function daftar_user()
    {
        $result = $this->db->query('select id, username, nama from admin');
        return $result;
    }

    // QUERY MENAMPILKAN DAFTAR USER BERDASARKAN ROLE
    function daftar_user_by_role($role)
    {
        $result = $this->db->query('select id, username, nama_lengkap, role, jenis from user where role="' . $role . '"');
        return $result;
    }

    // QUERY MENGECEK USERNAME
    function checkUser($where)
    {
        $this->db->where($where);
        $query = $this->db->get("admin");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //QUERY MENGHAPUS USER
    function hapusUser($where)
    {
        $this->db->where($where);
        $this->db->delete('admin');
    }

    //QUERY MENGEDIT USER
    function edit_user($id, $data)
    {
        $this->db->where('id', $id);
        // $this->db->set('update_time', 'NOW()', FALSE);
        $this->db->update('admin', $data);
    }

    //QUERY MENAMBAH USER
    function input_user($where)
    {
        $this->db->set('id', 'UUID()', FALSE);
        // $this->db->set('create_time', 'NOW()', FALSE);
        $this->db->insert('admin', $where);
    }

    function cek_login($where)
    {
        return $this->db->get_where('admin', $where);
    }
}
