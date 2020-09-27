<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'User';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $data['allUser'] = $this->admin->getAll('user');
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('Admin/User/index', $data);
        $this->load->view('templates/footer');
    }

    public function aktif($user_id)
    {
        $data = [
            'status' => 'AKTIF'
        ];

        $this->admin->update('user', ['user_id' => $user_id], $data);
        $this->session->set_flashdata('notif', 'Diubah');
        redirect('Admin/Dashboard');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password harus diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
            'required' => 'Username harus diisi',
            'is_unique' => 'Username sudah terdaftar, silahkan masukan username yang lain'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('Admin/User/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $password_bawaan = 'passwordbawaan';
            $data = [
                'nama_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($password_bawaan, PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'status' => 'AKTIF',
                'date_created' => time()
            ];
            $this->admin->insert('user', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/User');
        }
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Status User';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);

        $data['item'] = $this->admin->getWhere('user', ['user_id' => $id])->row_array();
        $this->form_validation->set_rules('status', 'Status', ['required'], [
            'required' => 'Anda harus mengisi status'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('Admin/User/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $status = $this->input->post('status');
            $data = [
                'status' => $status
            ];
            $this->admin->update('user', ['user_id' => $id], $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Admin/User');
        }
    }

    public function hapus($user_id)
    {
        $A_UserId = [
            'user_id' => $user_id
        ];
        $this->admin->delete('user', $A_UserId);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/User');
    }
}
