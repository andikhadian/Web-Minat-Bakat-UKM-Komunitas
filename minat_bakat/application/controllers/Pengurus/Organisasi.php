<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Pengurus_Model', 'pengurus');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = 'Organisasi &mdash; Pengurus';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['item'] = $this->pengurus->getWhere('organisasi', ['pengurus_id' => $this->session->userdata('user_id')])->row_array();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/pengurus_sidebar', $data);
        $this->load->view('Pengurus/Organisasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function buka($id)
    {
        $data = [
            'status_pendaftaran' => "BUKA PENDAFTARAN"
        ];

        $this->pengurus->update('organisasi', ['organisasi_id' => $id], $data);
        $this->session->set_flashdata('notif', 'Diubah');
        redirect('Pengurus/Organisasi');
    }

    public function tutup($id)
    {
        $data = [
            'status_pendaftaran' => "TUTUP PENDAFTARAN"
        ];

        $this->pengurus->update('organisasi', ['organisasi_id' => $id], $data);
        $this->session->set_flashdata('notif', 'Diubah');
        redirect('Pengurus/Organisasi');
    }

    public function kelola($id)
    {
        $item = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $id])->row_array();
        $data['title'] = 'Kelola ' . $item['nama_organisasi'];
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['item_deskripsi'] = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $id, 'pengurus_id' => $this->session->userdata('user_id')])->row_array();
        $data['item_struktur'] = $this->pengurus->getStrukturOrganisasiJoin($id);
        $data['item_kegiatan'] = $this->pengurus->getKegiatanOrganisasiJoin($id);

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/pengurus_sidebar', $data);
        $this->load->view('Pengurus/Organisasi/kelola', $data);
        $this->load->view('templates/footer');
    }

    public function buat_deskripsi($id)
    {
        $item = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $id])->row_array();
        $data['title'] = 'Kelola ' . $item['nama_organisasi'];
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', ['required'], [
            'required' => 'Anda harus mengisi deskripsi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/pengurus_sidebar', $data);
            $this->load->view('Pengurus/Organisasi/buat_deskripsi', $data);
            $this->load->view('templates/footer');
        } else {
            $deskripsi = $this->input->post('deskripsi');
            $data = [
                'deskripsi_organisasi' => $deskripsi
            ];
            $this->pengurus->update('organisasi', ['organisasi_id' => $id], $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Pengurus/Organisasi/kelola/' . $id);
        }
    }

    public function hapus_deskripsi($id)
    {
        $data = [
            'deskripsi_organisasi' => ''
        ];
        $this->pengurus->update('organisasi', ['organisasi_id' => $id], $data);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Pengurus/Organisasi/kelola/' . $id);
    }

    public function buat_struktur($organisasi_id)
    {
        $item = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $organisasi_id])->row_array();
        $data['title'] = 'Kelola ' . $item['nama_organisasi'];
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->form_validation->set_rules('nama', 'Nama', ['required'], [
            'required' => 'Anda harus mengisi nama'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', ['required'], [
            'required' => 'Anda harus mengisi Jabatan'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/pengurus_sidebar', $data);
            $this->load->view('Pengurus/Organisasi/buat_struktur', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $nama = $this->input->post('nama');
            $upload = $_FILES['gambar']['name'];
            $folder = 'Struktur Organisasi';

            if ($upload) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '5000';
                $config['upload_path'] = './asset_organisasi/Documents/' . $item['nama_organisasi'] . '/' . $folder . '/';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('notif', 'notif_unggah_gagal');
                    redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
                }
            } else {
                echo 'Error';
            }

            $data = [
                'organisasi_id' => $organisasi_id,
                'nama' => $nama,
                'jabatan' => $jabatan,
                'gambar' => $gambar,
                'date_created' => time()
            ];
            $this->pengurus->insert('struktur_organisasi', $data);
            $this->session->set_flashdata('notif', 'Dibuat');
            redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
        }
    }

    public function hapus_struktur($id, $organisasi_id)
    {
        $folder = 'Struktur Organisasi';
        $A_OrganisasiId = [
            'organisasi_id' => $organisasi_id
        ];
        $A_StrukturOrganisasiId = [
            'struktur_organisasi_id' => $id
        ];
        $folder = 'Struktur Organisasi';
        $item = $this->pengurus->getWhere('organisasi', $A_OrganisasiId)->row();
        $itemStruktur = $this->pengurus->getWhere('struktur_organisasi', $A_StrukturOrganisasiId)->row();

        $this->pengurus->delete('struktur_organisasi', $A_StrukturOrganisasiId);
        unlink(FCPATH . 'asset_organisasi/Documents/' . $item->nama_organisasi . '/' . $folder . '/' . $itemStruktur->gambar);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
    }

    public function buat_kegiatan($organisasi_id)
    {
        $item = $this->pengurus->getWhere('organisasi', ['organisasi_id' => $organisasi_id])->row_array();
        $data['title'] = 'Kelola ' . $item['nama_organisasi'];
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', ['required'], [
            'required' => 'Anda harus mengisi nama kegiatan'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/pengurus_sidebar', $data);
            $this->load->view('Pengurus/Organisasi/buat_kegiatan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $upload = $_FILES['gambar']['name'];
            $folder = 'Kegiatan Organisasi';

            if ($upload) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '5000';
                $config['upload_path'] = './asset_organisasi/Documents/' . $item['nama_organisasi'] . '/' . $folder . '/';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('notif', 'notif_unggah_gagal');
                    redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
                }
            } else {
                echo 'Error';
            }

            $data = [
                'organisasi_id' => $organisasi_id,
                'nama_kegiatan' => $nama_kegiatan,
                'gambar' => $gambar,
                'date_created' => time()
            ];
            $this->pengurus->insert('kegiatan_organisasi', $data);
            $this->session->set_flashdata('notif', 'Dibuat');
            redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
        }
    }

    public function hapus_kegiatan($id, $organisasi_id)
    {
        $folder = 'Kegiatan Organisasi';
        $A_OrganisasiId = [
            'organisasi_id' => $organisasi_id
        ];
        $A_KegiatanOrganisasiId = [
            'kegiatan_organisasi_id' => $id
        ];
        $folder = 'Kegiatan Organisasi';
        $item = $this->pengurus->getWhere('organisasi', $A_OrganisasiId)->row();
        $itemKegiatan = $this->pengurus->getWhere('kegiatan_organisasi', $A_KegiatanOrganisasiId)->row();

        $this->pengurus->delete('kegiatan_organisasi', $A_KegiatanOrganisasiId);
        unlink(FCPATH . 'asset_organisasi/Documents/' . $item->nama_organisasi . '/' . $folder . '/' . $itemKegiatan->gambar);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Pengurus/Organisasi/kelola/' . $organisasi_id);
    }
}
