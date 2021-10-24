<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kredit_model');
        $this->load->model('Kopdit_model');
    }

    public function index()
    {       
        $data['title']      = "Beranda";
        $data['anggota']    = $this->session->all_userdata();
        $data['jumlah'] = $this->Kopdit_model->hitungJumlahAnggota(1);
        $data['totalKredit'] = $this->Kopdit_model->hitungJumlahKredit();
        $data['totalPinjaman'] = $this->Kopdit_model->hitungJumlahPinjaman('Diterima');
            $deposit = $this->Kopdit_model->hitungJumlahDeposit();
            $kredit = $this->Kopdit_model->hitungJumlahPenarikan();
        $data['totalSimpanan'] = $deposit - $kredit;
        $data['artikel'] = $this->Kopdit_model->tampilkanArtikel();

        if (empty($data['anggota']['anggota'])) {
            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('beranda/index.php', $data);
            $this->load->view('templates/front_footer', $data);
        } else {
            $id_anggota         = $data['anggota']['anggota']['id_anggota'];
            $data['cekKredit']  = $this->Kredit_model->cekKreditAnggota($id_anggota);
            $data['kredit']     = $this->Kredit_model->getKreditAnggotaByID($id_anggota);
            $id_kredit = $data['kredit']['id_kredit'];
            $data['cekAngsuran'] = $this->Kredit_model->getAngsuranByIdKredit($id_kredit);

            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('beranda/index.php', $data);
            $this->load->view('templates/front_footer', $data);
        }
    }
}
