<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model', 'auth');
        $this->load->model('Admin_Model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Layanan Minat & Bakat FTI';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id'),
            'role' => $this->session->userdata('role')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['galeri'] = $this->admin->getWhere('galeri', ['status' => 'AKTIF'])->result_array();
        $data['organisasi'] = $this->admin->getAll('organisasi');
        $this->load->view('Home/header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('Home/footer', $data);
    }
}
