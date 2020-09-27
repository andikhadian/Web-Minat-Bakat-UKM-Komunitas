<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Pengurus_Model', 'pengurus');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = 'Dashboard &mdash; Pengurus';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $organisasi = $this->auth->getWhere('organisasi', ['pengurus_id' => $this->session->userdata('user_id')]);

        $data['countOrganisasi'] = $this->admin->getNumWhere('organisasi', ['pengurus_id' => $this->session->userdata('user_id')]);
        $data['countStruktur'] = $this->admin->getNumWhere('struktur_organisasi', ['organisasi_id' => $organisasi['organisasi_id']]);
        $data['countKegiatan'] = $this->admin->getNumWhere('kegiatan_organisasi', ['organisasi_id' => $organisasi['organisasi_id']]);
        $data['countPendaftaran'] = $this->admin->getNumWhere('pendaftaran', ['organisasi_id' => $organisasi['organisasi_id']]);

        $data['newDaftar'] = $this->admin->getWhereOrder('pendaftaran', ['organisasi_id' => $organisasi['organisasi_id']], 'tgl_data_masuk', 'DESC');

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/pengurus_sidebar', $data);
        $this->load->view('Pengurus/index', $data);
        $this->load->view('templates/footer');
    }
}
