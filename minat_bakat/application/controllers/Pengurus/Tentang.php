<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = 'Tentang';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/pengurus_sidebar', $data);
        $this->load->view('Pengurus/Tentang/index', $data);
        $this->load->view('templates/footer');
    }

    public function perkenalan()
    {
        $data['title'] = 'Tentang';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/pengurus_sidebar', $data);
        $this->load->view('Pengurus/Tentang/perkenalan', $data);
        $this->load->view('templates/footer');
    }
}
