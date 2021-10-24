<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kopdit_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah'] = $this->Kopdit_model->hitungJumlahAnggota(1);
        $data['totalKredit'] = $this->Kopdit_model->hitungJumlahKredit();
        $data['totalPinjaman'] = $this->Kopdit_model->hitungJumlahPinjaman('Diterima');
            $deposit = $this->Kopdit_model->hitungJumlahDeposit();
            $kredit = $this->Kopdit_model->hitungJumlahPenarikan();
        $data['totalSimpanan'] = $deposit - $kredit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/beranda/index', $data);
        $this->load->view('templates/footer');
    }
}
