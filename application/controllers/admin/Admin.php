<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $id = $this->input->post('id_admin');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $data_updt = [
                        'nm_admin' => $name,
                        'image' => $new_image
                    ];
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $new_image = $data['user']['image'];
                $data_updt = [
                    'nm_admin' => $name,
                    'image' => $new_image
                ];
            }

            $this->SuperModel->updateWhere($data_updt, $id, 'admin');

            $this->session->set_flashdata('pesan', 'diupdate'); 
            redirect('admin/admin');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|min_length[3]|matches[new_password2]|trim');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password', 'required|min_length[3]|matches[new_password1]|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/admin/changepassword', $data);
            $this->load->view('templates/footer');
        } else { //jika benar
            $id_admin = $this->input->post('id_admin');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', 'Password anda salah');
                redirect('admin/admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', 'Password baru sama dengan Password lama');
                    redirect('admin/admin/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $data_updt = [
                        'password' => $password_hash
                    ];

                    $this->SuperModel->updateWhere($data_updt, $id_admin, 'admin');

                    $this->session->set_flashdata('pesan', 'diupdate');
                    redirect('admin/admin');
                }
            }
        }
    }
}
