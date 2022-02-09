<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        if ($this->session->userdata('anggota')) {
            redirect('beranda');
        }

        $this->form_validation->set_rules('email', 'Email', 'Trim|required|valid_email', ['required' => 'Harus diisi!'], [
            'required' => 'Harus diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Anggota";
            $this->load->view('templates/login_header.php', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $anggota = $this->db->get_where('anggota', ['email' => $email])->row_array();

        if ($anggota) {
            if ($anggota['aktif'] == 1) {
                if (password_verify($password, $anggota['password'])) {
                    $data['anggota'] = $anggota;
                    $this->session->set_userdata($data);
                    redirect('anggota/beranda');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang ada masukan salah!</div>'); //tampilkan password salah pesan danger
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
				Email anda belum aktif! 
				</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email anda belum terdaftar pada system kami!
			</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('anggota')) {
            redirect('beranda');
        }

        $data['title'] = "Pendaftaran Anggota";
        $data['pekerjaan'] = $this->Kriteria_model->getAllSubPekerjaan();

        $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No. Handphone', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[anggota.email]', [
            'is_unique' => 'Email sudah terdaftar!',
            'valid_email' => 'Email tidak valid',
            'required' => 'Harus diisi'
        ]);
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Harus Diisi',
            'matches' => 'Password tidak sama'
        ]);
        if (empty($_FILES['bukti']['name'])) {
            $this->form_validation->set_rules('bukti', 'Bukti', 'required|trim', [
                'required' => 'Harus Diisi'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/login_header.php', $data);
            $this->load->view('auth/register.php', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $data = [
                'no_buku'               => "",
                'nm_anggota'             => htmlspecialchars($this->input->post('nm_anggota', true)),
                'nik'                     => "",
                'tmpt_lahir'             => "",
                'tgl_lhr'                 => htmlspecialchars($this->input->post('tgl_lhr', true)),
                'agama'                 => "",
                'no_hp'                 => htmlspecialchars($this->input->post('no_hp', true)),
                'email'                 => htmlspecialchars($this->input->post('email', true)),
                'foto'                     => 'default.jpg',
                'jns_kelamin'             => htmlspecialchars($this->input->post('jns_kelamin', true)),
                'alamat'                 => "",
                'rt'                     => "",
                'rw'                     => "",
                'kel_des'                 => "",
                'kec'                     => "",
                'kota_kab'                 => "",
                'prov'                     => "",
                'kode_pos'                 => "",
                'pendidikan_terakhir'     => "",
                'pekerjaan'             => htmlspecialchars($this->input->post('pekerjaan', true)),
                'tgl_masuk'             => date('Y-m-d'),
                'password'                 => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'aktif'                    => 0,
            ];

            $upload_bukti = $_FILES['bukti']['name'];

            $this->db->set($data);
            $this->db->insert('anggota');

            //simpan data simpanan awal anggota
            $id_anggota = $this->db->insert_id();
            $no_buku = $this->Anggota_model->generateNoBukuAnggota($id_anggota);

            $data_anggota = [
                'no_buku' => $no_buku
            ];
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('anggota', $data_anggota);

            $data_simpanan = [
                'id_anggota'    => $id_anggota,
                'deposit'       => 350000,
                'tanggal'       => date('Y-m-d')
            ];

            if ($upload_bukti) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/simpanan';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bukti')) {
                    $data_simpanan['bukti'] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($data_simpanan);
            $this->db->insert('simpanan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<b>Akun Anda Berhasil Dibuat!</b><br> Mohon untuk menunggu konfirmasi <br> dan Silahkan Cek Email Anda
            </div>');

            redirect('auth');
        }
    }

    public function lupaPass()
    {
        $data['title'] = 'Lupa Password';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Harus Diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/login_header.php', $data);
            $this->load->view('auth/lupaPass.php', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $token = base64_encode(random_bytes(32));
            $email = $this->input->post('email', true);

            $emailAnggota = $this->db->get_where('anggota', ['email' => $email])->row_array();

            //cek Email Anggota
            if ($emailAnggota) {
                $this->_sendEmail($email);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
			<b>Gagal!</b><br> Anda Belum Mendaftar Sebagai Anggota
			</div>');
                redirect('auth');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<b>Link Reset telah dikirim</b><br> Silahkan Cek Email untuk Reset Password Anda
			</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($email)
    {
        $data['email'] = $email;
        $message = $this->load->view('templates/email/email_reset_pass', $data, true);

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'kspswastisari@gmail.com',
            'smtp_pass' => 'kspswastisari2020',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('kspswastisari@gmail.com', 'KSP Swastisari');
        $this->email->to($email);

        $this->email->subject('Reset Password');
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPass($email)
    {
        $data['title'] = 'Reset Password';
        $data['email'] = urldecode($email);

        $this->form_validation->set_rules('pass1', 'Password Baru', 'required|trim|min_length[3]|matches[pass2]', [
            'required' => 'Harus Diisi',
            'matches'  => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[pass1]', [
            'required' => 'Harus Diisi',
            'matches'  => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/login_header.php', $data);
            $this->load->view('auth/resetPass.php', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $new_pass = $this->input->post('pass1');
            $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

            $this->db->set('password', $pass_hash);
            $this->db->where('email', $this->input->post('email'));
            $this->db->update('anggota');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Anda Berhasil diubah</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('anggota');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Terimakasih!</strong> Anda Berhasil Logout.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect('auth');
    }
}
