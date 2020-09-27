<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model', 'auth');
        $this->load->model('Pengurus_Model', 'pengurus');
    }

    public function index()
    {
        $id = $this->input->get('q');
        $data['title'] = 'Layanan Minat & Bakat FTI';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id'),
            'role' => $this->session->userdata('role')
        ];

        if ($this->session->userdata('user_id')) {
            $data['user'] = $this->auth->getWhere('user', $S_UserId);
            $data['cekDaftar'] = $this->pengurus->getWhere('pendaftaran', ['organisasi_id' => $id, 'user_id' => $this->session->userdata('user_id')])->num_rows();
            $data['itemOrganisasi'] = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $id])->row_array();
            $data['itemKegiatan'] = $this->pengurus->getKegiatanOrganisasiJoin($id);
            $data['itemStruktur'] = $this->pengurus->getStrukturOrganisasiJoin($id);

            $this->form_validation->set_rules('nama', 'Name', 'required', [
                'required' => 'Anda harus mengisi nama'
            ]);
            $this->form_validation->set_rules('npm', 'NPM', 'required', [
                'required' => 'Anda harus mengisi npm'
            ]);
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
                'required' => 'Anda harus mengisi tgl_lahir'
            ]);
            $this->form_validation->set_rules('prodi', 'Program Studi', 'required', [
                'required' => 'Anda harus mengisi prodi'
            ]);
            $this->form_validation->set_rules('alasan', 'Name', 'required', [
                'required' => 'Anda harus mengisi alasan'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('Home/organisasi_header', $data);
                $this->load->view('Home/Organisasi/index', $data);
                $this->load->view('Home/footer', $data);
            } else {
                $nama = $this->input->post('nama');
                $npm = $this->input->post('npm');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $prodi = $this->input->post('prodi');
                $alasan = $this->input->post('alasan');

                $data = [
                    'organisasi_id' => $id,
                    'user_id' => $this->session->userdata('user_id'),
                    'nama' => $nama,
                    'npm' => $npm,
                    'tgl_lahir' => $tgl_lahir,
                    'prodi' => $prodi,
                    'alasan' => $alasan,
                    'tgl_data_masuk' => time()
                ];

                $this->pengurus->insert('pendaftaran', $data);
                $this->session->set_flashdata('notif', 'daftar_organisasi');
                redirect('Organisasi?q=' . $id);
            }
        } else {
            $this->session->set_flashdata('notif', 'harus_login');
            redirect('');
        }
    }
}
