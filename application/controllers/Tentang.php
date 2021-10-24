<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('tentang/index.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailProfil()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('tentang/detailProfil.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailSejarah()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Sejarah";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('tentang/detailSejarah.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailManajemen()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['manajemen'] = $this->db->get('manajemen')->result_array();
        $data['title'] = "Manajemen";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('tentang/detailManajemen.php', $data);
        $this->load->view('templates/front_footer');
    }
}