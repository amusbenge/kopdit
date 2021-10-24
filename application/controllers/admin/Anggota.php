<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Anggota_model');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Anggota";
        $data['anggota'] = $this->Anggota_model->getAllAnggota();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        // $data['no_ba'] = $this->Anggota_model->autogenerate();

        // Validation
        // $this->form_validation->set_rules('no_buku', 'No Buku', 'required|trim', [
        //     'required' => 'Harus Diisi'
        // ]);
        $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[anggota.email]|valid_email', [
            'is_unique' => 'Email Sudah Terdaftar!',
            'required' => 'Harus diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek',
            'required' => 'Harus Diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data mengirimkan data user yang masuk
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/anggota/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $email = $this->input->post('email', true);

            $data = [
                // 'no_buku'       => htmlspecialchars($this->input->post('no_buku', true)),
                'no_buku'       => "",
                'nm_anggota' 	=> htmlspecialchars($this->input->post('nm_anggota', true)),
                'nik' 		    => "",
                'tmpt_lahir' 	=> "",
                'tgl_lhr' 		=> htmlspecialchars($this->input->post('tgl_lhr', true)),
                'agama' 		=> "",
                'no_hp' 		=> htmlspecialchars($this->input->post('no_hp', true)),
				'email' 		=> htmlspecialchars($email),
                'foto' 		    => 'default.jpg',
                'jns_kelamin' 	=> htmlspecialchars($this->input->post('jns_kelamin', true)),
                'alamat' 	    => "",
                'rt' 	        => "",
                'rw' 	        => "",
                'kel_des' 	    => "",
                'kec' 	        => "",
                'kota_kab' 	    => "",
                'prov' 	        => "",
                'kode_pos' 	    => "",
                'pendidikan_terakhir' 	=> "",
                'pekerjaan' 	=> $this->input->post('pekerjaan'),
                'tgl_masuk' 	=> date('Y-m-d'),
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'aktif'		    => 1,
            ];

            $this->db->insert('anggota', $data);

            // simpan data simpanan awal anggota
            $id = $this->db->insert_id();
            $no_buku = $this->Anggota_model->generateNoBukuAnggota($id);

            $data_anggota = [
                'no_buku' => $no_buku
            ];
            $this->db->where('id_anggota', $id);
            $this->db->update('anggota', $data_anggota);

            $data_simpanan = [
                'id_anggota'    => $id,
                'deposit'       => 300000,
                'tanggal'       => date('Y-m-d'),
                'bukti'         => ""

            ];
            $this->db->insert('simpanan', $data_simpanan);

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/anggota');
        }
    }

    public function index()
    {
        $data['title'] = 'Anggota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->get('anggota')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->delete('anggota');

        $this->db->where('id_anggota', $id);
        $this->db->delete('simpanan');
        
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/anggota');
    }

    public function konfirmasiAnggota($id_anggota)
    {
        $anggota = $this->db->get_where('anggota', ['id_anggota' => $id_anggota ])->row_array();
        $email = $anggota['email'];

        $data=[
            'aktif' => 1
        ];

        $this->_sendEmail($email);

        $this->db->set($data);
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota');

        $this->session->set_flashdata('flash', 'Dikonfirmasi');
        redirect('admin/anggota');
        
    }

    private function _sendEmail($email)
    {
        $message = $this->load->view('templates/email/email_verifyakun', '', true);

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'kspswastisari@gmail.com',
            'smtp_pass' => 'kspswastisari2020',
            'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('kspswastisari@gmail.com', 'KSP Swastisari');
        $this->email->to($email);
        $this->email->subject('Verifikasi akun');
        $this->email->message($message);

        if ($this->email->send()) { 
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}

    }

    

    public function ubah($id_anggota)
    {
        $data['title'] = 'Ubah Data';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['pekerjaan'] = $this->db->get('sub_krit_pekerjaan')->result_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota ])->row_array();

        // Set rules
        $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|max_length[12]', [
            'required' => 'Harus Diisi',
            'max_length' => 'Maksimal No Hp adalah 12 Digit'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('rt', 'Rt', 'required|trim|max_length[3]', [
            'required' => 'Harus Diisi',
            'max_length' => 'Maksimal 3 Digit'
        ]);
        $this->form_validation->set_rules('rw', 'Rw', 'required|trim|max_length[3]', [
            'required' => 'Harus Diisi',
            'max_length' => 'Maksimal 3 Digit'
        ]);
        $this->form_validation->set_rules('kel_des', 'Kelurahan/Desa', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('kota_kab', 'Kota/Kabupaten', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim|max_length[5]', [
            'required' => 'Harus Diisi',
            'max_length' => 'Maksimal 5 Digit'
        ]);
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'Harus Diisi'
        ]);
        $this->form_validation->set_rules('aktif', 'Aktif', 'required|trim|max_length[1]', [
            'required' => 'Harus Diisi',
            'max_length' => 'Maksimal 1 Digit'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/anggota/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('anggota', $this->input->post());
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/anggota');
        }
    }

    public function detail($id_anggota)
    {
        $data['title'] = 'Detail Anggota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id_anggota ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anggota/detail', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_anggota($id_anggota)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $data = $this->Anggota_model->getAnggotaByID($id_anggota);
        $nama = $data['nm_anggota'];
        $html = $this->load->view('laporan/cetak_anggota', ['anggota' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output($nama.'.pdf', 'I');
    }

    public function laporan_Anggota()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data = $this->Anggota_model->getAllAnggota();
        $html = $this->load->view('laporan/laporan_anggota', ['anggota' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan_anggota.pdf', 'I');
    }
}
