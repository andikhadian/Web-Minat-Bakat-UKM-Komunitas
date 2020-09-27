<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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
        $data['title'] = 'Pendaftaran Peserta';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['allPendaftaran'] = $this->admin->getPendaftaranJoin();
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/Pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }
}
