<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unggah extends CI_Controller
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
        $data['title'] = 'Unggah Dokumen SPMI';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required', [
            'required' => 'Nama Dokumen harus diisi'
        ]);
        $this->form_validation->set_rules('kategori_dokumen', 'Kategori Dokumen', 'required', [
            'required' => 'Kategori Dokumen harus diisi'
        ]);
        $this->form_validation->set_rules('fakultas_dokumen', 'Fakultas Dokumen', 'required', [
            'required' => 'Fakultas Dokumen harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_dokumen', 'Jenis Dokumen', 'required', [
            'required' => 'Jenis Dokumen harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('Admin/Unggah/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload = $_FILES['file_dokumen']['name'];
            $fakultas_dokumen = $this->input->post('fakultas_dokumen');
            $jenis_dokumen = $this->input->post('jenis_dokumen');
            $kategori_dokumen = $this->input->post('kategori_dokumen');
            $nama_dokumen = $this->input->post('nama_dokumen');

            if ($kategori_dokumen == 'GAMBAR') {
                $allowed = 'jpg|jpeg|png';
            } else if ($kategori_dokumen == 'PDF') {
                $allowed = 'pdf';
            } else if ($kategori_dokumen == 'OFFICE') {
                $allowed = 'doc|docx|xls|xlsx|ppt|pptx';
            }

            if ($upload) {
                $config['allowed_types'] = $allowed;
                $config['max_size']     = '5000';
                $config['upload_path'] = './assets/Documents/' . $fakultas_dokumen . '/' . $jenis_dokumen . '/' . $kategori_dokumen . '/';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file_dokumen')) {
                    $file_dokumen = $this->upload->data('file_name');
                } else {
                    $err = $this->upload->display_errors();
                    $this->session->set_flashdata('notif', 'notif_unggah_gagal');
                    redirect('Admin/Unggah');
                }
            } else {
                echo 'Error';
            }

            $data = [
                'nama_dokumen' => $nama_dokumen,
                'kategori_dokumen' => $kategori_dokumen,
                'jenis_dokumen' => $jenis_dokumen,
                'fakultas_dokumen' => $fakultas_dokumen,
                'file_dokumen' => $file_dokumen,
                'tgl_dokumen_masuk' => time()
            ];

            $this->admin->insert('dokumen', $data);
            $this->session->set_flashdata('notif', 'Diunggah');
            redirect('Admin/Unggah');
        }
    }
}
