<?php

class Anggota_model extends CI_Model
{
    public function getAllAnggota()
    {
        return $this->db->get('anggota')->result_array();
    }

    public function getAnggotaByID($id_anggota)
    {
        return $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();
    }

    public function getSimpByID($id_anggota)
    {
        return $this->db->get_where('v_deposit', ['id_anggota' => $id_anggota])->result_array();
    }

    public function getAllSimp()
    {
        return $this->db->get('v_simpanan')->result_array();
    }

    public function generateNoBukuAnggota($id)
    {
        $id_anggota = $id;
        $customid = "BA." . $id_anggota;

        return $customid;
    }

    public function getDepositById($id)
    {
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get_where('v_deposit', ['id_anggota' => $id])->result_array();
    }

    public function getSimpananById($id)
    {
        return $this->db->get_where('v_simpanan', ['id_anggota' => $id])->result_array();
    }
}
