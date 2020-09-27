<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard Admin';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['countUser'] = $this->admin->getNumWhere('user', ['role' => 'USER']);
        $data['countOrganisasi'] = $this->admin->getNum('organisasi');
        $data['countGaleri'] = $this->admin->getNum('galeri');
        $data['countPendaftaran'] = $this->admin->getNum('pendaftaran');
        $data['newUser'] = $this->admin->getWhereOrder('user', ['role' => 'USER'], 'date_created', 'DESC');

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }
}
