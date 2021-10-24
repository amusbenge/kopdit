<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data['title'] = 'Simpanan';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['simpanan'] = $this->db->get('v_simpanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/simpanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahDeposit($id)
    {
        $data['title']      = 'Simpanan';
        $data['user']       = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota']    = $this->db->get_where('anggota', ['id_anggota' => $id])->row_array();
        $data['simpanan']   = $this->db->get_where('simpanan', ['id_anggota' => $id])->result_array();
        $data['deposit']    = $this->db->get_where('v_deposit', ['id_anggota' => $id])->result_array();

        $this->form_validation->set_rules('no_agt', 'No Anggota', 'required');
        $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('deposit', 'Deposit', 'required', [
            'required' => 'Harus diisi!'
        ]);
        if (empty($_FILES['bukti']['name'])) {
            $this->form_validation->set_rules('bukti', 'required', [
                'required' => 'Harus diisi!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/simpanan/tambahDeposit', $data);
            $this->load->view('templates/footer');
        } else {
            $deposit = $this->input->post('deposit');

            if ($deposit <= 30000) {
                $this->session->set_flashdata('gagal', 'Maaf, Jumlah Uang yang anda masukan tidak memenuhi simpanan wajib bulan ini!! ');
                redirect('admin/simpanan');
            } else {
                $data = [
                    'id_anggota'    => $id,
                    'deposit'       => $deposit,
                    'kredit'        => 0,
                    'tanggal'       => date('Y-m-d'),
                ];

                $upload_bukti = $_FILES['bukti']['name'];

                if ($upload_bukti) {
                    $config['allowed_types']    = 'gif|jpg|png';
                    $config['max_size']         = '2048';
                    $config['upload_path']      = './assets/img/simpanan';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('bukti')) {
                        $data['bukti'] = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->insert('simpanan', $data);
                $this->session->set_flashdata('flash', 'Menambahkan Simpanan');
                redirect('admin/simpanan');
            }
        }
    }

    public function detailSimpanan($id_anggota)
    {
        $data['title']      = 'Detail';
        $data['user']       = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['deposit']    = $this->db->get_where('v_deposit', ['id_anggota' => $id_anggota])->result_array();
        $data['id_anggota'] = $id_anggota;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/simpanan/detailSimpanan', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_simp()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = $this->Anggota_model->getAllSimp();
        $html = $this->load->view('laporan/laporan_simp', ['simpanan' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan_simpanan', 'I');
    }

    public function cetak_simp($id_anggota)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['simpanan'] = $this->Anggota_model->getSimpByID($id_anggota);
        $data['anggota'] = $this->Anggota_model->getAnggotaByID($id_anggota);
        $html = $this->load->view('laporan/cetak_simp', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('simpanan ' . $data["nm_anggota"] . '.pdf', 'I');
    }

    // public function tambahKredit($id_anggota)
    // {
    //     $data['title']      = 'Penarikan Tunai';
    //     $data['user']       = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['anggota']    = $this->db->get('anggota', ['id_anggota' => $id_anggota])->row_array();
    //     $data['simpanan']   = $this->db->get('simpanan', ['id_anggota' => $id_anggota])->row_array();
    //     $data['kredit']     = $this->db->get_where('v_kredit', ['id_anggota' => $id_anggota])->result_array();

    //     $this->form_validation->set_rules('no_agt', 'No Anggota', 'required');
    //     $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required');
    //     $this->form_validation->set_rules('kredit', 'Kredit', 'required', [
    //         'required' => 'Harus diisi!'
    //     ]);


    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('admin/simpanan/tambahKredit', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             'id_anggota'    => $id_anggota,
    //             'deposit'       => 0,
    //             'kredit'        => htmlspecialchars($this->input->post('kredit', true)),
    //             'tanggal'       => date('Y-m-d'),
    //         ];

    //         $this->db->insert('simpanan', $data);
    //         $this->session->set_flashdata('flash', 'Melakukan Penarikan Tunai');
    //         redirect('admin/simpanan');
    //     }
    // }


}
