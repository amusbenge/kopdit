<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['anggota'] = $this->session->all_userdata();
        $data['title'] = "Kontak";
        
        $this->load->view('templates/front_header', $data);
        $this->load->view('templates/front_topbar', $data);
        $this->load->view('kontak/index.php', $data);
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
                $this->load->view('kontak/index.php', $data);
                $this->load->view('templates/front_footer');
            } else {
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
    
                $this->sendEmail($email, $name , $subject, $message);
                
                $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terimakasih!</strong> Pesan anda telah dikirim.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('kontak/#contact');
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
}
