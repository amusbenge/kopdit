<?php

class Kriteria_model extends CI_model
{
    public function getAllSubPenghasilan()
    {
        return $this->db->get('sub_krit_penghasilan')->result_array();
    }

    public function getAllSubPekerjaan()
    {
        return $this->db->get('sub_krit_pekerjaan')->result_array();
    }

    public function getAllSubPinjaman()
    {
        return $this->db->get('sub_krit_besarpinjaman')->result_array();
    }

    public function getAllSubTujuan()
    {
        return $this->db->get('sub_krit_tujuan')->result_array();
    }

    public function getAllSubSimpanan()
    {
        return $this->db->get('sub_krit_simpanan')->result_array();
    }

    public function getAllSubBarang()
    {
        return $this->db->get('sub_krit_barang')->result_array();
    }

    public function getAllJaminan()
    {
        return $this->db->get('jaminan')->result_array();
    }

    public function getSubKriteria($id_kriteria)
    {
        $sub = $this->db->get_where('sub_kriteria', ['id_kriteria' => $id_kriteria])->result_array();
        return $sub;
    }

    public function getSubKriteriaBySub($id_sub)
    {
        $sub_kriteria = $this->db->get_where('sub_kriteria', ['id_sub' => $id_sub])->row_array();
        $sub_kriteria['gap'] = 0;
        return $sub_kriteria;
    }

    public function getNilaiPencapaian($id_kriteria)
    {
        $kriteria = $this->getKriteria($id_kriteria);
        return $kriteria['nilai_pencapaian'];
    }

    public function getKriteria($id_kriteria)
    {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }

    public function getGap($gap)
    {
        return $this->db->get_where('gap', ['gap' => $gap])->row_array();
    }

}