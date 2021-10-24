<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['artikel'] = $this->db->get('artikel')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahArtikel()
    {
        $data['title'] = 'Tambah Artikel';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required '=> 'Harus diisi!'
        ]);
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim', [
            'required' => 'Harus diisi!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/artikel/tambahArtikel', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            $tanggal = date('Y-m-d');

            $this->db->set('judul', $judul);
            $this->db->set('isi', $isi);
            $this->do_upload();
            $this->db->set('tanggal_buat', $tanggal);
            $this->db->insert('artikel');

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/artikel');
        }
    }

    public function do_upload()
    {   
        $artikel = $this->db->get('artikel')->result_array();

        $config['upload_path'] = './assets/img/artikel';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['height'] = '400';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/artikel/tambahArtikel', $error);
        } else {                    
            $new_image = $this->upload->data('file_name');
            $this->db->set('foto', $new_image);
        }

    }

    public function detailArtikel($id_artikel)
    {
        $data['title'] = 'Tambah Artikel';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['artikel'] = $this->db->get_where('artikel', ['id_artikel' => $id_artikel ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/artikel/detailArtikel', $data);
        $this->load->view('templates/footer');
    }

    public function hapusArtikel($id_artikel)
    {
        $artikel = $this->db->get_where('artikel', ['id_artikel' => $id_artikel ])->row_array();
        $old_image = $artikel['foto'];

        unlink(FCPATH . 'assets/img/artikel/' . $old_image);

        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('artikel');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/artikel');
    }
}
