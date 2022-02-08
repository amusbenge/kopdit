<?php

class Kredit_model extends CI_Model
{

    public function getKredit($id_kredit)
    {
        $kredit = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array();
        return $kredit;
    }

    public function getKreditById($id_kredit)
    {
        return $this->db->get_where('v_kredit_anggota', ['id_kredit' => $id_kredit])->row_array();
    }

    public function cekKreditAnggota($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->group_start();
        $this->db->where('status', 'Pengajuan');
        $this->db->or_where('status', 'Diterima');
        $this->db->group_end();

        $cekStatus = $this->db->get('kredit')->result_array();

        if (empty($cekStatus)) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllBunga()
    {
        return $this->db->get('bunga')->result_array();
    }

    public function getBunga($id_bunga)
    {
        return $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array()['nilai'];
    }

    public function getBungaName($id_bunga)
    {
        return $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array()['jenis_bunga'];
    }

    public function getIDAnggotaByIDKredit($id_kredit)
    {
        return $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['id_anggota'];
    }

    public function getEmailByID($id_anggota)
    {
        return $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array()['email'];
    }

    public function getJWaktu($besar_pinjaman)
    {
        $this->db->from('jangka_waktu_angsuran');
        $this->db->where('min <= ', $besar_pinjaman);
        $this->db->where('max >= ', $besar_pinjaman);
        $query = $this->db->get()->row_array();
        return $query['jangka_waktu'];
    }

    public function getKreditAnggota()
    {
        return $kredit = $this->db->get('v_kredit_anggota')->result_array();
    }

    public function getKreditAnggotaByID($id_anggota)
    {
        return $kredit = $this->db->get_where('v_kredit_anggota', ['id_anggota' => $id_anggota, 'status' => 'Diterima', 'aktif' => '1'])->row_array();
    }

    public function cekStatusPengajuan()
    {
        $query = $this->db->select("*")
            ->from('v_kredit_anggota')
            ->where('aktif', '0')
            ->order_by('nilai_akhir', 'desc')
            ->get()
            ->result_array();
        return $query;
    }

    public function cekStatusDiterimaByIdKredit($id_kredit)
    {
        return $status = $this->db->get_where('v_kredit_anggota', array('id_kredit' => $id_kredit, 'status' => 'Diterima', 'aktif' => '1'))->result_array();
    }

    public function cekStatusDiterima()
    {
        return $status = $this->db->get_where('v_kredit_anggota', array('status' => 'Diterima', 'aktif' => '1'))->result_array();
    }

    public function cekStatusDitolak()
    {
        return $status = $this->db->get_where('v_kredit_anggota', array('status' => 'Ditolak', 'aktif' => '1'))->result_array();
    }

    public function cekStatusSelesai()
    {
        return $status = $this->db->get_where('v_kredit_anggota', array('status' => 'Selesai', 'aktif' => '1'))->result_array();
    }

    public function getAngsuranByIdKredit($id_kredit)
    {
        return $this->db->get_where('angsuran', ['id_kredit' => $id_kredit])->result_array();
    }

    public function hitungAngsuran($id_kredit)
    {
        $kredit         = $this->Kredit_model->getKredit($id_kredit);
        $bunga          = $this->Kredit_model->getBunga($kredit['id_bunga']);
        $jangka_waktu   = $this->Kredit_model->getJWaktu($kredit['besar_pinjaman']);
        $pokok          = $kredit['besar_pinjaman'] / $jangka_waktu;
        $sisa_pinjaman  = $kredit['besar_pinjaman'];
        $besar_pinjaman  = $kredit['besar_pinjaman'];
        $total_angsur   = 0;

        $tanggal_diterima = date('Y-m-d');
        $tgl_jatuh_tempo = date('Y-m-d', strtotime('+30 days', strtotime($tanggal_diterima)));
        for ($i = 0; $i < $jangka_waktu; $i++) {
            if ($kredit['id_bunga'] == 1 or $kredit['id_bunga'] == 3) {
                $besar_bunga    = $sisa_pinjaman * $bunga;
            } else {
                $besar_bunga = $besar_pinjaman * $bunga;
            }
            $angsuran       = $pokok + 50000 + $besar_bunga;
            $total_angsur   += $angsuran;

            $data = [
                'id_kredit' => $kredit['id_kredit'],
                'pokok' => $pokok,
                'bunga' => $besar_bunga,
                'sukarela' => 50000,
                'jumlah_angsuran' => $angsuran,
                'jumlah_harus_bayar' => $angsuran,
                'status' => 'Belum Dibayar',
                'tanggal_bayar' => '',
                'jatuh_tempo' => $tgl_jatuh_tempo,
                'bukti' => ''
            ];

            $sisa_pinjaman -= $angsuran;
            $this->db->insert('angsuran', $data);
            $tgl_jatuh_tempo = date('Y-m-d', strtotime('+30 days', strtotime($tgl_jatuh_tempo)));
        }
        $this->db->set('total_angsur', $total_angsur);
        $this->db->where('id_kredit', $kredit['id_kredit']);
        $this->db->update('kredit');
    }

    public function getAngsuranBerikut($id_kredit)
    {
        $this->db->from('angsuran');
        $this->db->where('id_kredit', $id_kredit);
        $this->db->where('jumlah_bayar', 0);
        $this->db->order_by('id_angsuran', 'asc');
        return $this->db->get()->row_array();
    }

    public function cekUmurAnggota($tanggal_lahir)
    {
        $tanggal = new DateTime($tanggal_lahir);
        $today = new DateTime('today');
        return $y = $today->diff($tanggal)->y;
    }

    public function cekBulanMasuk($tgl_masuk)
    {
        $tanggal = new DateTime($tgl_masuk);
        $today = new DateTime('today');
        return $m = $today->diff($tanggal)->m;
    }

    public function cekSisaPinjamanAnggota($id_kredit)
    {
        return $total = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['total_angsur'];
    }
}
