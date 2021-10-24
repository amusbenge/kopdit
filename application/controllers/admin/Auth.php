<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin/admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'Trim|required|valid_email',[
            'required' => 'Harus diisi!',
            'valid_email' => 'Email Tidak Valid'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Administrator";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) { //jika user ada
            if ($admin['is_active'] == 1) {
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'email' => $admin['email'],
                        'role_id' => $admin['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($admin['role_id'] == 1) {
                        redirect('admin/beranda'); //masuk halaman User
                    } else {
                        redirect('admin/beranda'); //masuk halaman user
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang ada masukan salah!</div>'); //tampilkan password salah pesan danger
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
				Email anda belum aktif! 
				</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email anda belum terdaftar pada system kami!
			</div>');
            redirect('admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda telah keluar..!!</div>');
        redirect('admin');
    }

    public function blocked()
    {
        $data['title'] = "Akses Ditolak";
        $this->load->view('templates/blocked_header', $data);
        $this->load->view('admin/auth/blocked');
        $this->load->view('templates/blocked_footer');
    }
}
