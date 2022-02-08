<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->model('Kredit_model');
        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data['anggota']    = $this->session->all_userdata();
        $data['title']      = "Pelayanan";

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
            $id_anggota         = $data['anggota']['anggota']['id_anggota'];
            $data['cekKredit']  = $this->Kredit_model->cekKreditAnggota($id_anggota);
            $data['kredit']     = $this->Kredit_model->getKreditAnggotaByID($id_anggota);
            $id_kredit = $data['kredit']['id_kredit'];
            $data['cekAngsuran'] = $this->Kredit_model->cekStatusDiterimaByIdKredit($id_kredit);
            $data['cekUmur'] = $this->Kredit_model->cekUmurAnggota($data['anggota']['anggota']['tgl_lhr']);
            $data['cekBulanMasuk'] = $this->Kredit_model->cekBulanMasuk($data['anggota']['anggota']['tgl_masuk']);

            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('pelayanan/index.php', $data);
            $this->load->view('templates/front_footer', $data);
        }
    }

    public function angsuran($id_kredit)
    {
        $data['anggota']    = $this->session->all_userdata();
        $data['title']      = "Angsuran";
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
            $data['angsuran']   = $this->db->get_where('angsuran', ['id_kredit' => $id_kredit])->result_array();
            $data['kredit']     = $this->db->get_where('kredit', ['id_kredit' => $id_kredit])->row_array();
            $data['total_angsur'] = $this->Kredit_model->cekSisaPinjamanAnggota($id_kredit);
            $data['jenis_bunga'] = $this->Kredit_model->getBungaName($data['kredit']['id_bunga']);

            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('pelayanan/angsuran.php', $data);
            $this->load->view('templates/front_footer', $data);
        }
    }

    public function bayarAngsuran($id_angsuran)
    {
        $data['title'] = "Bayar Angsuran";
        $data['anggota'] = $this->session->all_userdata();

        if (empty($data['anggota']['anggota'])) { //jika belum login
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda belum login!</strong> Silahkan login terlebih dahulu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');
        } else { //jika sudah login
            $data['angsuran'] = $this->db->get_where('angsuran', ['id_angsuran' => $id_angsuran])->row_array();
            $id_anggota = $data['anggota']['anggota']['id_anggota'];
            $data['kredit'] = $this->db->get_where('kredit', ['id_anggota' => $id_anggota, 'status' => 'Diterima'])->row_array();

            $total_angsur = $data['kredit']['total_angsur'];
            $id_kredit = $data['kredit']['id_kredit'];
            $bunga = $data['kredit']['id_bunga'];
            $old_image = $data['angsuran']['bukti'];

            $tgl_hari_ini = date('Y-m-d');
            // $tgl_hari_ini = date('Y-m-d', strtotime('2021-12-29'));
            $tgl_jatuh_tempo = $data['angsuran']['jatuh_tempo'];

            if ($tgl_hari_ini > $tgl_jatuh_tempo) {
                $data['denda'] = $data['angsuran']['bunga'];
            } else {
                $data['denda'] = 0;
            }

            $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required|trim', [
                'required' => 'Harus diisi!'
            ]);

            if (empty($_FILES['bukti']['name'])) {
                $this->form_validation->set_rules('bukti', 'Bukti', 'required|trim', ['required' => 'Harus diisi!']);
            }

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/front_header', $data);
                $this->load->view('templates/front_topbar', $data);
                $this->load->view('pelayanan/bayarAngsuran.php', $data);
                $this->load->view('templates/front_footer', $data);
            } else {
                $total_bayar  = $this->input->post('jumlah_bayar');
                $denda = $this->input->post('denda');
                $jumlah_harus_bayar = $data['angsuran']['jumlah_harus_bayar'];

                $jumlah_bayar = $total_bayar - $denda;
                $sisa_jumlah_bayar = $total_bayar - $jumlah_bayar;

                // Jika bunga menurun
                if ($bunga == 1 || $bunga == 3) {
                    $sisa_angsur   = $jumlah_bayar - $jumlah_harus_bayar;
                    if ($jumlah_bayar >= $jumlah_harus_bayar) {
                        if ($jumlah_bayar >= 0) {
                            $data = [
                                'jumlah_bayar'      => $jumlah_bayar,
                                'tanggal_bayar'     => date('Y-m-d'),
                                'denda'             => $sisa_jumlah_bayar,
                                'status'            => 'Dibayar'
                            ];
                        } else {
                            $data = [
                                'jumlah_bayar'      => $jumlah_bayar,
                                'tanggal_bayar'     => date('Y-m-d'),
                                'status'            => 'Belum Dibayar',
                            ];
                        }
                    } else {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Mohon maaf!</strong> Silahkan membayar sesuai jumlah angsuran bulan ini
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            ');
                        redirect('pelayanan/angsuran/' . $id_kredit);
                    }
                    $upload_image = $_FILES['bukti']['name'];

                    if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './assets/img/angsuran';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('bukti')) {
                            $data['bukti'] = $this->upload->data('file_name');
                        } else {
                            echo $this->upload->display_errors();
                        }
                    }

                    $this->db->set($data);
                    $this->db->where('id_angsuran', $id_angsuran);
                    $this->db->update('angsuran');

                    $angsuran_berikut = $this->Kredit_model->getAngsuranBerikut($id_kredit);
                    $data_berikut['jumlah_harus_bayar'] = $angsuran_berikut['jumlah_angsuran'] - $sisa_angsur;
                    $this->db->where('id_angsuran', $angsuran_berikut['id_angsuran']);
                    $this->db->update('angsuran', $data_berikut);
                } else { //Jika Bunga tetap

                    //jika jumlah bayar sama dengan jumlah harus bayar
                    if ($jumlah_bayar == $jumlah_harus_bayar) {
                        $data = [
                            'jumlah_bayar'      => $jumlah_bayar,
                            'tanggal_bayar'     => date('Y-m-d'),
                            'denda'             => $sisa_jumlah_bayar,
                            'status'            => 'Dibayar',
                        ];
                    } else {
                        $this->session->set_flashdata('message', '
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Mohon maaf!</strong> Silahkan membayar sesuai jumlah angsuran bulan ini
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            ');
                        redirect('pelayanan/angsuran/' . $id_kredit);
                    }

                    $upload_image = $_FILES['bukti']['name'];

                    if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './assets/img/angsuran';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('bukti')) {
                            $data['bukti'] = $this->upload->data('file_name');
                        } else {
                            echo $this->upload->display_errors();
                        }
                    }

                    $this->db->set($data);
                    $this->db->where('id_angsuran', $id_angsuran);
                    $this->db->update('angsuran');
                }

                $angsur = $total_angsur - $jumlah_bayar;

                if ($angsur <= 1000) {
                    $this->db->where('id_kredit', $id_kredit);
                    $this->db->update('kredit', [
                        'total_angsur'  => $angsur,
                        'status'        => 'Selesai'
                    ]);
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> Kredit anda telah selesai.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ');
                } else {
                    $this->db->where('id_kredit', $id_kredit);
                    $this->db->where('status', 'Diterima');
                    $this->db->update('kredit', [
                        'total_angsur' => $angsur
                    ]);
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pembayaran</strong> Berhasil!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ');
                }
                redirect('pelayanan/angsuran/' . $id_kredit);
            }
        }
    }

    public function kredit($id_anggota)
    {
        $data['anggota']        = $this->session->all_userdata();
        $data['title']          = "Kredit";
        if (empty($data['anggota']['anggota'])) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda belum login!</strong> Silahkan login terlebih dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('auth');
        } else {
            $data['pekerjaan']      = $this->Kriteria_model->getAllSubPekerjaan();
            $data['tujuan']         = $this->Kriteria_model->getAllSubTujuan();
            $data['barang']         = $this->Kriteria_model->getAllSubBarang();
            $data['bunga']          = $this->Kredit_model->getAllBunga();
            $data['t_simpanan']     = $this->db->get_where('v_simpanan', ['id_anggota' => $id_anggota])->row_array();

            // Set rules
            $this->form_validation->set_rules('penghasilan', 'Penghasilan', 'required|trim');
            $this->form_validation->set_rules('pinjaman', 'Pinjaman', 'required|trim');
            $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
            $this->form_validation->set_rules('jaminan', 'Jaminan', 'required|trim');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/front_header', $data);
                $this->load->view('templates/front_topbar', $data);
                $this->load->view('pelayanan/kredit.php', $data);
                $this->load->view('templates/front_footer', $data);
            } else {
                $penghasilan    = $this->input->post('penghasilan');
                $besar_pinj     = $this->input->post('pinjaman');
                $simpanan       = $this->input->post('simpanan');
                $pekerjaan      = $this->input->post('pekerjaan');

                $sub_pekerjaan      = $this->Kriteria_model->getSubKriteria(1);
                $sub_penghasilan    = $this->Kriteria_model->getSubKriteria(2);
                $sub_besar_pinj     = $this->Kriteria_model->getSubKriteria(3);
                $sub_simpanan       = $this->Kriteria_model->getSubKriteria(6);

                $id_sub_pekerjaan   = null;
                $id_sub_penghasilan = null;
                $id_sub_besar_pinj  = null;
                $id_sub_simpanan    = null;

                foreach ($sub_pekerjaan as $sub_pek) {
                    if ($pekerjaan == $sub_pek['nm_sub_kriteria']) {
                        $id_sub_pekerjaan = $sub_pek['id_sub'];
                    }
                }
                foreach ($sub_penghasilan as $sub_penghsln) {
                    if ($penghasilan >= $sub_penghsln['min'] && $penghasilan <= $sub_penghsln['max']) {
                        $id_sub_penghasilan = $sub_penghsln['id_sub'];
                    }
                }
                foreach ($sub_besar_pinj as $sub_pinj) {
                    if ($besar_pinj >= $sub_pinj['min'] && $besar_pinj <= $sub_pinj['max']) {
                        $id_sub_besar_pinj = $sub_pinj['id_sub'];
                    }
                }

                foreach ($sub_simpanan as $sub_simp) {
                    if ($simpanan >= $sub_simp['min'] && $simpanan <= $sub_simp['max']) {
                        $id_sub_simpanan = $sub_simp['id_sub'];
                    }
                }

                $data = [
                    'id_anggota'        => $id_anggota,
                    'id_bunga'          => $this->input->post('bunga'),
                    'c1'                => $id_sub_pekerjaan,
                    'c2'                => $id_sub_penghasilan,
                    'c3'                => $id_sub_besar_pinj,
                    'c4'                => $this->input->post('tujuan', true),
                    'c5'                => $this->input->post('jaminan', true),
                    'c6'                => $id_sub_simpanan,
                    'besar_pinjaman'    => $besar_pinj,
                    'jumlah_penghasilan' => $penghasilan,
                    'jumlah_simpanan'   => $simpanan,
                    'tgl_pengajuan'     => date('Y-m-d'),
                    'tgl_terima'        => ""
                ];

                $upload_image = $_FILES['foto_jaminan']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/img/jaminan';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto_jaminan')) {
                        $data['foto_jaminan'] = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->insert('kredit', $data);

                $id_kredit = $this->db->insert_id();
                $this->hasil_perhitungan($id_kredit);

                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terimakasih!</strong> Permohonan kredit anda sedang diproses. Mohon untuk mencek email secara berkala.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('pelayanan');
            }
        }
    }

    private function hasil_perhitungan($id_kredit)
    {
        $kredit = $this->Kredit_model->getKredit($id_kredit);

        $bobot['c1'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c1']);
        $bobot['c2'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c2']);
        $bobot['c3'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c3']);
        $bobot['c4'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c4']);
        $bobot['c5'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c5']);
        $bobot['c6'] = $this->Kriteria_model->getSubKriteriaBySub($kredit['c6']);

        $jml_ncf = 0;
        $jml_nsf = 0;
        $ncf = 0;
        $nsf = 0;


        foreach ($bobot as $key => $bot) {

            $nilai_pencapaian = $this->Kriteria_model->getNilaiPencapaian($bobot[$key]['id_kriteria']);

            $bobot[$key]['bobot'] -= $nilai_pencapaian;


            $bobot[$key]['gap'] = $this->Kriteria_model->getGap($bobot[$key]['bobot'])['bobot'];


            $jenis = $this->Kriteria_model->getKriteria($bobot[$key]['id_kriteria'])['jenis'];


            if ($jenis == 'Core Factor') {
                $jml_ncf++;
                $ncf += $bobot[$key]['gap'];
            } else {
                $jml_nsf++;
                $nsf += $bobot[$key]['gap'];
            }
        }
        $total = (0.6 * $ncf / $jml_ncf) + (0.4 * $nsf / $jml_nsf);

        $this->db->where('id_kredit', $id_kredit);
        $this->db->update('kredit', [
            'nilai_akhir' => $total,
        ]);

        if ($total >= 2.5) {
            $data = ['status' => 'Diterima'];
            $this->db->where('id_kredit', $id_kredit);
            $this->db->update('kredit', $data);
        } else {
            $data = ['status' => 'Ditolak'];
            $this->db->where('id_kredit', $id_kredit);
            $this->db->update('kredit', $data);
        }

        //buat angsuran
        $this->Kredit_model->hitungAngsuran($id_kredit);
    }

    public function simpanan($id_anggota)
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Simpanan";

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
            $data['simpanan']   = $this->Anggota_model->getSimpananById($id_anggota);
            $data['deposit']    = $this->Anggota_model->getDepositById($id_anggota);;
            $data['id_anggota'] = $id_anggota;

            $this->load->view('templates/front_header', $data);
            $this->load->view('templates/front_topbar', $data);
            $this->load->view('pelayanan/simpanan.php', $data);
            $this->load->view('templates/front_footer', $data);
        }
    }

    public function tambahSimpanan($id_anggota)
    {
        $data['title'] = 'Tambah Simpanan';
        $data['anggota'] = $this->session->all_userdata();

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
            $data['simpanan']   = $this->db->get_where('simpanan', ['id_anggota' => $id_anggota])->row_array();
            $this->form_validation->set_rules('no_agt', 'No Anggota', 'required', [
                'required' => 'Harus diisi'
            ]);
            $this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'required', [
                'required' => 'Harus diisi'
            ]);
            $this->form_validation->set_rules('deposit', 'Deposit', 'required', [
                'required' => 'Harus diisi'
            ]);
            if (empty($_FILES['bukti']['name'])) {
                $this->form_validation->set_rules('bukti', 'Bukti', 'required|trim', [
                    'required' => 'Harus Diisi!'
                ]);
            }

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/front_header', $data);
                $this->load->view('templates/front_topbar', $data);
                $this->load->view('pelayanan/tambahSimpanan.php', $data);
                $this->load->view('templates/front_footer', $data);
            } else {
                $deposit = $this->input->post('deposit');

                if ($deposit <= 150000) {
                    $this->session->set_flashdata('gagal', 'Jumlah uang yang anda masukan kurang dari Rp. 150.000,00-');
                    redirect('pelayanan/simpanan/' . $id_anggota);
                } else {
                    $data = [
                        'id_anggota'    => $id_anggota,
                        'deposit'       => htmlspecialchars($this->input->post('deposit', true)),
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
                    $this->session->set_flashdata('flash', 'Menambahkan Simpanan Anda');
                    redirect('pelayanan/simpanan/' . $id_anggota);
                }
            }
        }
    }

    public function syaratKredit()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('pelayanan/syaratKredit.php', $data);
        $this->load->view('templates/front_footer');
    }

    public function infoSimpanan()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('pelayanan/infoSimpanan.php');
        $this->load->view('templates/front_footer');
    }

    public function infoManfaat()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kopdit Swastisari";

        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('pelayanan/infoManfaat.php');
        $this->load->view('templates/front_footer');
    }

    public function lakukan_download($id)
    {
        if ($id == 1) {
            force_download('assets/frontend/assets/document/test.doc', NULL);
        } else if ($id == 2) {
            force_download('assets/frontend/assets/document/test.doc', NULL);
        } else if ($id == 3) {
            force_download('assets/frontend/assets/document/surat_potong_gaji.pdf', NULL);
        }
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

    public function cetak_simp($id_anggota)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['simpanan'] = $this->Anggota_model->getSimpByID($id_anggota);
        $data['anggota'] = $this->Anggota_model->getAnggotaByID($id_anggota);
        $html = $this->load->view('laporan/cetak_simp', ['data' => $data], TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('simpanan ' . $data["nm_anggota"] . '.pdf', 'I');
    }
}
