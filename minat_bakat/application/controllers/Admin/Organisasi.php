<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
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
        $data['title'] = 'Organisasi';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $data['allOrganisasi'] = $this->admin->getOrganisasiJoin();
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/Organisasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Organisasi';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['pengurus'] = $this->admin->getWhere('user', ['role' => 'PENGURUS'])->result_array();

        $this->form_validation->set_rules('pengurus_id', 'Pengurus', 'required', [
            'required' => 'Pengurus harus diisi'
        ]);
        $this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'required', [
            'required' => 'Nama Organisasi harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('Admin/Organisasi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload = $_FILES['gambar_organisasi']['name'];
            $pengurus_id = $this->input->post('pengurus_id');
            $jenis_organisasi = $this->input->post('jenis_organisasi');
            $nama_organisasi = $this->input->post('nama_organisasi');
            $singkatan_organisasi = $this->input->post('singkatan_organisasi');
            $status_pendaftaran = 'BUKA PENDAFTARAN';

            if ($upload) {
                mkdir('asset_organisasi/Documents/' . $nama_organisasi);
                mkdir('asset_organisasi/Documents/' . $nama_organisasi . '/Struktur Organisasi');
                mkdir('asset_organisasi/Documents/' . $nama_organisasi . '/Kegiatan Organisasi');

                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '5000';
                $config['upload_path'] = './asset_organisasi/Documents/' . $nama_organisasi . '/';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_organisasi')) {
                    $gambar_organisasi = $this->upload->data('file_name');
                } else {
                    $err = $this->upload->display_errors();
                    $this->session->set_flashdata('notif', 'notif_unggah_gagal');
                    redirect('Admin/Organisasi');
                }
            } else {
                echo 'Error';
            }

            $data = [
                'pengurus_id' => $pengurus_id,
                'jenis_organisasi' => $jenis_organisasi,
                'nama_organisasi' => $nama_organisasi,
                'singkatan_organisasi' => $singkatan_organisasi,
                'gambar_organisasi' => $gambar_organisasi,
                'status_pendaftaran' => $status_pendaftaran,
                'date_created' => time()
            ];

            $this->admin->insert('organisasi', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/Organisasi');
        }
    }

    public function hapus($organisasi_id)
    {
        $A_OrganisasiId = [
            'organisasi_id' => $organisasi_id
        ];
        $item = $this->admin->getWhere('organisasi', $A_OrganisasiId)->row();
        $this->admin->delete('organisasi', $A_OrganisasiId);
        unlink(FCPATH . 'asset_organisasi/Documents/' . $item->nama_organisasi . '/' . $item->gambar_organisasi);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Organisasi');
    }
}
