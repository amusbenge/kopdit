<?php

class Kopdit_model extends CI_Model
{
    public function tampilkanArtikel()
    {
        $this->db->order_by('id_artikel', 'desc');
        return $this->db->get('artikel')->result_array();
    }

    public function hitungJumlahAnggota($aktif)
    {
        $this->db->where('aktif', $aktif);
        $query = $this->db->get('anggota');
        return $query->num_rows();   
    }

    public function hitungJumlahKredit()
    {
        $query = $this->db->query('SELECT * FROM kredit WHERE status="Diterima"');
        return $query->num_rows();
    }

    public function hitungJumlahPinjaman($status)
    {
        $this->db->select_sum('total_angsur');
        $this->db->from('kredit');
        $this->db->where('status', $status);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->row()->total_angsur;
        } else {
            return 0;
        }
    }

    public function hitungJumlahDeposit()
    {
        $this->db->select_sum('deposit');
        $query = $this->db->get('simpanan');

        if ($query->num_rows()>0) {
            return $query->row()->deposit;
        } else {
            return 0;
        }        
    }

    public function hitungJumlahPenarikan()
    {
        $this->db->select_sum('kredit');
        $query = $this->db->get('simpanan');

        if ($query->num_rows()>0) {
            return $query->row()->kredit;
        } else {
            return 0;
        }
    }
}