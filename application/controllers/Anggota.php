<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->model('Anggota_model');
        $this->load->model('Kopdit_model');
        $this->load->model('Kredit_model');
    }

    public function index()
    {
        $data['title'] = "Profil";
        $data['anggota'] = $this->session->all_userdata();

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/index.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function edit()
    {
        $data['title'] = "Profil";
        $data['anggota'] = $this->session->all_userdata();
        $data['pekerjaan'] = $this->Kriteria_model->getAllSubPekerjaan();
        $id_anggota = $data['anggota']['anggota']['id_anggota'];

        // Set rules
        $this->form_validation->set_rules('no_buku', 'No Buku', 'required|trim');
        $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|max_length[16]|trim');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tempat Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|max_length[12]|trim');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'Rt', 'required|max_length[3]|trim|numeric');
        $this->form_validation->set_rules('rw', 'Rw', 'required|max_length[3]|trim|numeric');
        $this->form_validation->set_rules('kel_des', 'Kelurahan/Desa', 'required|trim');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kota_kab', 'Kota/Kabupaten', 'required|trim');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|max_length[5]|numeric');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('anggota/ubah', $data);
            $this->load->view('templates/front_footer');
        } else {
            $user['anggota'] = $this->session->all_userdata();
            $data = [
                'no_buku'               => htmlspecialchars($this->input->post('no_buku', true)),
                'nm_anggota'             => htmlspecialchars($this->input->post('nm_anggota', true)),
                'nik'                     => htmlspecialchars($this->input->post('nik', true)),
                'tmpt_lahir'             => htmlspecialchars($this->input->post('tmpt_lahir', true)),
                'tgl_lhr'                 => htmlspecialchars($this->input->post('tgl_lhr', true)),
                'agama'                 => htmlspecialchars($this->input->post('agama', true)),
                'no_hp'                 => htmlspecialchars($this->input->post('no_hp', true)),
                'jns_kelamin'             => htmlspecialchars($this->input->post('jns_kelamin', true)),
                'alamat'                 => htmlspecialchars($this->input->post('alamat', true)),
                'rt'                     => htmlspecialchars($this->input->post('rt', true)),
                'rw'                     => htmlspecialchars($this->input->post('rw', true)),
                'kel_des'                 => htmlspecialchars($this->input->post('kel_des', true)),
                'kec'                     => htmlspecialchars($this->input->post('kec', true)),
                'kota_kab'                 => htmlspecialchars($this->input->post('kota_kab', true)),
                'prov'                     => htmlspecialchars($this->input->post('prov', true)),
                'kode_pos'                 => htmlspecialchars($this->input->post('kode_pos', true)),
                'pendidikan_terakhir'     => htmlspecialchars($this->input->post('pendidikan_terakhir', true))
            ];

            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $user['anggota']['anggota']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $data['foto'] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($data);
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('anggota');
            $this->db->from('anggota');

            $this->db->where('id_anggota', $id_anggota);
            $data2 = $this->db->get()->row_array();
            $this->session->set_userdata(['anggota' => $data2]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Profil Berhasil!!</div>');
            redirect('anggota');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['anggota'] = $this->session->all_userdata();
        $id_anggota = $data['anggota']['anggota']['id_anggota'];

        $this->form_validation->set_rules('current_pass', 'Password Sekarang', 'required|trim', [
            'required' => 'Harus diisi!'
        ]);
        $this->form_validation->set_rules('pass1', 'Password Baru', 'required|trim|min_length[3]|matches[pass2]', [
            'required' => 'Harus diisi!',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Konfirmasi Password tidak sama'
        ]);
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[pass1]', [
            'required' => 'Harus diisi!',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Konfirmasi Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('anggota/ubahPassword.php', $data);
            $this->load->view('templates/front_footer');
        } else {
            $current_pass = $this->input->post('current_pass');
            $new_pass = $this->input->post('pass1');

            if (!password_verify($current_pass, $data['anggota']['anggota']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah!!</div>');
                redirect('anggota/ubahPassword');
            } else {
                if ($current_pass == $new_pass) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Baru</div>');
                    redirect('anggota/ubahPassword');
                } else {

                    $password_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_anggota', $id_anggota);
                    $this->db->update('anggota');

                    $this->session->unset_userdata('anggota');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diubah</div>');
                    redirect('auth');
                }
            }
        }
    }

    //Controller Kontak
    public function kontak()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kontak";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/kontak.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function kirimEmail()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kontak";

        if (empty($data['anggota']['anggota'])) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda belum login!</strong> Silahkan login terlebih dahulu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');
        } else {
            $this->form_validation->set_rules('subject', 'Subject', 'required|trim', [
                'required' => 'Harus diisi!'
            ]);
            $this->form_validation->set_rules('message', 'Pesan', 'required|trim', [
                'required' => 'Harus diisi!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/front_header', $data);
                $this->load->view('templates/front_topbar', $data);
                $this->load->view('anggota/kontak.php', $data);
                $this->load->view('templates/front_footer');
            } else {
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');

                $this->sendEmail($email, $name, $subject, $message);

                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terimakasih!</strong> Pesan anda telah dikirim.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('anggota/kontak/#contact');
            }
        }
    }

    public function sendEmail($email, $name, $subject, $message)
    {
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

        $this->email->from($email, $name);
        $this->email->to('kspswastisari@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //Controller Artikel
    public function artikel()
    {
        $data['title'] = 'Artikel';
        $data['anggota'] = $this->session->all_userdata();
        $data['artikel'] = $this->db->get('artikel')->result_array();

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/artikel', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailArtikel($id_artikel)
    {
        $data['title'] = 'Artikel';
        $data['anggota'] = $this->session->all_userdata();
        $data['artikel'] = $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row_array();
        $data['postingan'] = $this->Kopdit_model->tampilkanArtikel();

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/detailArtikel', $data);
        $this->load->view('templates/front_footer');
    }

    //Controller Beranda
    public function beranda()
    {
        $data['title']          = "Beranda";
        $data['anggota']        = $this->session->all_userdata();
        $data['jumlah']         = $this->Kopdit_model->hitungJumlahAnggota(1);
        $data['totalKredit']    = $this->Kopdit_model->hitungJumlahKredit();
        $data['totalPinjaman']  = $this->Kopdit_model->hitungJumlahPinjaman('Diterima');
        $deposit                = $this->Kopdit_model->hitungJumlahDeposit();
        $kredit                 = $this->Kopdit_model->hitungJumlahPenarikan();
        $data['totalSimpanan']  = $deposit - $kredit;
        $data['artikel']        = $this->Kopdit_model->tampilkanArtikel();

        if (empty($data['anggota']['anggota'])) {
            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('anggota/beranda', $data);
            $this->load->view('templates/front_footer', $data);
        } else {
            $id_anggota         = $data['anggota']['anggota']['id_anggota'];
            $data['cekKredit']  = $this->Kredit_model->cekKreditAnggota($id_anggota);
            $data['kredit']     = $this->Kredit_model->getKreditAnggotaByID($id_anggota);
            $id_kredit = $data['kredit']['id_kredit'];
            $data['cekAngsuran'] = $this->Kredit_model->getAngsuranByIdKredit($id_kredit);

            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('anggota/beranda', $data);
            $this->load->view('templates/front_footer', $data);
        }
    }

    //Controller Tentang
    public function tentang()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/tentang', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailProfil()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/detailProfil.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailSejarah()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Sejarah";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/detailSejarah.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function detailManajemen()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['manajemen'] = $this->db->get('manajemen')->result_array();
        $data['title'] = "Manajemen";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('anggota/detailManajemen.php', $data);
        $this->load->view('templates/front_footer');
    }
}
