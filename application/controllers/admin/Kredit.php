<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kredit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kredit_model');
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        $data['title'] = 'Diterima';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->Kredit_model->cekStatusDiterima();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/index', $data);
        $this->load->view('templates/footer');
    }

    public function ditolak()
    {
        $data['title'] = 'Ditolak';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->Kredit_model->cekStatusDitolak();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/ditolak', $data);
        $this->load->view('templates/footer');
    }



    public function selesai()
    {
        $data['title'] = 'Selesai';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->Kredit_model->cekStatusSelesai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $data['title'] = 'Pengajuan';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->Kredit_model->cekStatusPengajuan();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function hapusKreditDiterima($id_kredit)
    {
        $status = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['status'];
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('kredit');
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('angsuran');

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kredit/');
    }



    public function hapusKreditDitolak($id_kredit)
    {
        $status = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['status'];
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('kredit');
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('angsuran');

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kredit/ditolak');
    }

    public function hapusKreditPengajuan($id_kredit)
    {
        $status = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['status'];
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('kredit');
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('angsuran');

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kredit/pengajuan');
    }

    public function hapusKreditSelesai($id_kredit)
    {
        $status = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array()['status'];
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('kredit');
        $this->db->where('id_kredit', $id_kredit);
        $this->db->delete('angsuran');

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kredit/selesai');
    }

    public function detail($id_kredit)
    {
        $data['title'] = 'Detail Kredit';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->db->get_where('v_kredit_anggota', ['id_kredit' => $id_kredit])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/detailKredit', $data);
        $this->load->view('templates/footer');
    }

    public function kredit()
    {
        $data['title'] = 'Kredit';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit'] = $this->db->get('v_kredit_anggota')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/kredit', $data);
        $this->load->view('templates/footer');
    }

    public function angsuran($id_kredit)
    {
        $data['angsuran']   = $this->db->get_where('angsuran', ['id_kredit' => $id_kredit])->result_array();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kredit']     = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array();
        $data['title'] = 'Angsuran';
        $data['total_angsur'] = $this->Kredit_model->cekSisaPinjamanAnggota($id_kredit);
        $data['id_kredit'] = $id_kredit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kredit/angsuran', $data);
        $this->load->view('templates/footer');
    }

    public function konfirKredit($id_kredit)
    {
        $status = $this->input->post('status');
        if ($status == 'Pengajuan') {
            $this->session->set_flashdata('gagal', 'Mohon! untuk mengkongkonfirmasi data kredit');
            redirect('admin/kredit/pengajuan');
        } else {
            $data = [
                'status' => $status,
                'aktif'  => 1
            ];

            $this->db->where('id_kredit', $id_kredit);
            $this->db->update('kredit', $data);

            $this->sendEmail($id_kredit, $status);

            $this->session->set_flashdata('flash', 'Terkonfirmasi');
            $tanggal = date('Y-m-d');

            if ($status == 'Diterima') {
                $data = [
                    'tgl_terima' => date('Y-m-d')
                ];

                $this->db->where('id_kredit', $id_kredit);
                $this->db->update('kredit', $data);

                redirect('admin/kredit');
            } elseif ($status == 'Ditolak') {
                redirect('admin/kredit/ditolak');
            }
        }
    }

    private function sendEmail($id_kredit, $status)
    {
        $id_anggota = $this->Kredit_model->getIDAnggotaByIDKredit($id_kredit);
        $email = $this->Kredit_model->getEmailByID($id_anggota);
        // $kredit = $this->Kredit_model->getKredit($id_kredit);

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

        if ($status == 'Diterima') {
            $message = $this->load->view('templates/email/email_diterima', '', true);
            $this->email->subject('Kredit');
            $this->email->message($message);
        } else if ($status == 'Ditolak') {
            $message = $this->load->view('templates/email/email_ditolak', '', true);
            $this->email->subject('Kredit');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function cetak_kredit()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['kredit'] = $this->Kredit_model->cekStatusPengajuan(['mode' => 'utf-8', 'format' => 'A4-L']);
        $html = $this->load->view('laporan/cetak_kredit', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan kredit', 'I');
    }

    public function cetak_kredit_diterima()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data['kredit'] = $this->Kredit_model->cekStatusDiterima();
        $html = $this->load->view('laporan/cetak_kredit', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('kredit diterima.pdf', 'I');
    }

    public function cetak_kredit_ditolak()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data['kredit'] = $this->Kredit_model->cekStatusDitolak();
        $html = $this->load->view('laporan/cetak_kredit', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('kredit ditolak.pdf', 'I');
    }

    public function cetak_kredit_selesai()
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data['kredit'] = $this->Kredit_model->cekStatusSelesai();
        $html = $this->load->view('laporan/cetak_kredit', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('kredit selesai.pdf', 'I');
    }

    public function cetakKreditById($id_kredit)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = $this->Kredit_model->getKreditById($id_kredit);
        $html = $this->load->view('laporan/cetakkreditbyid', ['kredit' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('data kredit.pdf', 'I');
    }

    public function cetakAngsuran($id_kredit)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $data['angsuran'] = $this->Kredit_model->getAngsuranByIdKredit($id_kredit);
        $data['anggota'] = $this->Kredit_model->getKreditById($id_kredit);
        $html = $this->load->view('laporan/cetak_angsuran', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('angsuran.pdf', 'I');
    }
}
