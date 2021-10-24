<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{
    public function index()
    {

        $data['title'] = 'Anggota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/backup/index');
        $this->load->view('templates/footer');

        //load Class utilitas from database
        $this->load->dbutil();
        
        //rule
        $rule = array(
            'format' => 'zip',
            'file_name' => 'mybackup.sql'
        );

        $backup=&$this->dbutil->backup($rule);

        $nama_db = 'myDB'.'.zip';
        $simpan = base_url('assets/backup/'.$nama_db);

        $this->load->helper('file');
        write_file($simpan, $backup);

        $this->load->helper('download');
        force_download($nama_db, $backup);
    }
}