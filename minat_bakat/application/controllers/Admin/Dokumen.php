<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
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
        $get = $this->input->get('folder');
        if ($get == NULL) {
            $title = '';
        } else {
            $title = '(' . $get . ')';
        }
        $data['isi_get'] = $title;
        $data['title'] = 'Lihat Dokumen SPMI ' . $title;
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['num_dokumen_fti'] = $this->admin->getNumWhere('dokumen', ['fakultas_dokumen' => 'FTI']);
        $data['num_dokumen_si'] = $this->admin->getNumWhere('dokumen', ['fakultas_dokumen' => 'SI']);
        $data['num_dokumen_ik'] = $this->admin->getNumWhere('dokumen', ['fakultas_dokumen' => 'IK']);
        $data['dokumen'] = $this->admin->getWhere('dokumen', ['fakultas_dokumen' => $get])->result_array();
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/Dokumen/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id, $fakultas_dokumen, $jenis_dokumen, $kategori_dokumen, $file_dokumen)
    {
        unlink(FCPATH . 'assets/Documents/' . $fakultas_dokumen . '/' . $jenis_dokumen . '/' . $kategori_dokumen . '/' . $file_dokumen);
        $this->admin->delete('dokumen', ['dokumen_id' => $id]);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Dokumen?folder=' . $fakultas_dokumen);
    }
}
