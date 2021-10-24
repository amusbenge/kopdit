<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->db->get('admin')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manager/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahAdmin()
    {
        $data['title'] = "Tambah Admin";
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nm_admin', 'Nama Admin', 'required|trim', [
            'required' => 'Harus Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'required' => 'Harus Diisi!',
            'is_unique' => 'Email Sudah Ada',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
            'required' => 'Harus Diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',[
            'min_length' => 'Password Terlalu Pendek!',
            'required' => 'Harus Diisi!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Harus Diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data mengirimkan data user yang masuk
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/manager/tambahAdmin');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nm_admin'      => $this->input->post('nm_admin'),
                'email'         => $this->input->post('email'),
                'role_id'       => $this->input->post('role_id'),
                'status'        => $this->input->post('status'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),  
                'image'         => 'default.jpg',
                'is_active'     => 1,
                'date_created'  => date('Y-m-d')
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<b>Akun Anda Berhasil Dibuat!</b><br></div>');
            redirect('admin/manager');
        }
    }


    public function hapusAdmin($id_admin)
    {
        $data['title'] = "Tambah Admin";
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<b>Akun Anda Berhasil Dihapus!</b>
			</div>');
        redirect('admin/manager');

    }
}
