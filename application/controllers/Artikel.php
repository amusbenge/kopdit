<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kopdit_model');
    }

    public function index()
    {
        $data['title'] = 'Artikel';
        $data['anggota'] = $this->session->all_userdata();
        $data['artikel'] = $this->db->get('artikel')->result_array();

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailArtikel($id_artikel)
    {
        $data['title'] = 'Artikel';
        $data['anggota'] = $this->session->all_userdata();
        $data['artikel'] = $this->db->get_where('artikel', ['id_artikel' => $id_artikel ])->row_array();
        $data['postingan'] = $this->Kopdit_model->tampilkanArtikel();

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('artikel/detailArtikel', $data);
        $this->load->view('templates/front_footer');
    }

}