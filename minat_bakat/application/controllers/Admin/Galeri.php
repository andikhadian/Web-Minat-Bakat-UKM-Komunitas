<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
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
        $data['title'] = 'Galeri Kegiatan';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['allGaleri'] = $this->admin->getAll('galeri');
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/Galeri/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Galeri';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Anda harus mengisi status'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('Admin/Galeri/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload = $_FILES['gambar']['name'];
            if ($upload) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '5000';
                $config['upload_path'] = './asset_organisasi/Galleries/';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    $err = $this->upload->display_errors();
                    $this->session->set_flashdata('notif', 'notif_unggah_gagal');
                    redirect('Admin/Galeri');
                }
            } else {
                echo 'Error';
            }

            $data = [
                'gambar' => $gambar,
                'status' => $this->input->post('status'),
                'date_created' => time()
            ];

            $this->admin->insert('galeri', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/Galeri');
        }
    }

    public function aktif($galeri_id)
    {
        $data = [
            'status' => 'AKTIF'
        ];

        $this->admin->update('galeri', ['galeri_id' => $galeri_id], $data);
        $this->session->set_flashdata('notif', 'Diubah');
        redirect('Admin/Galeri');
    }

    public function tidak_aktif($galeri_id)
    {
        $data = [
            'status' => 'TIDAK AKTIF'
        ];

        $this->admin->update('galeri', ['galeri_id' => $galeri_id], $data);
        $this->session->set_flashdata('notif', 'Diubah');
        redirect('Admin/Galeri');
    }

    public function hapus($galeri_id)
    {
        $A_Galeri = [
            'galeri_id' => $galeri_id
        ];
        $item = $this->admin->getWhere('galeri', $A_Galeri)->row();
        unlink(FCPATH . 'asset_organisasi/Galleries/' . $item->gambar);
        $this->admin->delete('galeri', $A_Galeri);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Galeri');
    }
}
