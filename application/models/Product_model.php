<?php

class Product_model extends CI_Model
{
    function data($number, $offset)
    {
        return $query = $this->db->get('obat', $number, $offset)->result();
    }

    function jumlah_data()
    {
        return $this->db->get('obat')->num_rows();
    }

    function obat_byid($id)
    {
        $result = $this->db->query('select * from obat where id="' . $id . '"');
        return $result;
    }

    function apotek_byid($id)
    {
        $result = $this->db->query('select apotek.* from obat, apotek, obat_apotek where obat.id="' . $id . '" and obat_apotek.id_obat ="' . $id . '" and obat_apotek.id_apotek = apotek.id');
        return $result;
    }
}
