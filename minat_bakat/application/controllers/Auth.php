<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = "Login";
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role') == 'ADMIN') {
                redirect('Admin/Dashboard');
            } elseif ($this->session->userdata('role') == 'PENGURUS') {
                redirect('Pengurus/Dashboard');
            } elseif ($this->session->userdata('role') == 'USER') {
                redirect('Home');
            }
        }
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Anda Harus Mengisi Username'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Anda Harus Mengisi Password'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = [
            'username' => $this->input->post('username')
        ];
        $password = $this->input->post('password');

        $user = $this->auth->getWhere('user', $username);
        if ($user) {
            if ($user['status'] == 'AKTIF') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if ($password == 'passwordbawaan') {
                        $this->session->set_flashdata('message', '
                        <div class="hero bg-primary text-white mb-4">
                          <div class="hero-inner">
                            <h2>Selamat Bergabung, ' . $user['nama_user'] . '</h2>
                            <p class="lead">Sebelum kamu menggunakan sistem ini, Silahkan ubah password bawaan anda untuk keamanan akun.</p>
                            <div class="mt-4">
                              <a href="' . base_url('Auth/passwordbaru/') . $user['username'] . '" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-key"></i> Ubah Password</a>
                            </div>
                          </div>
                        </div>
                        ');
                        if ($user['role'] == 'ADMIN') {
                            redirect('Admin/Dashboard');
                        } elseif ($user['role'] == 'PENGURUS') {
                            redirect('Pengurus/Dashboard');
                        } elseif ($user['role'] == 'USER') {
                            redirect('Home');
                        }
                    } else {
                        if ($user['role'] == 'ADMIN') {
                            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Selamat Datang<strong> ' . $user['nama_user'] . '</strong> ! Saat ini Anda masuk sebagai  <strong>Admin</strong>. Tutup pesan ini jika sudah paham
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button></div>');
                            redirect('Admin/Dashboard');
                        } elseif ($user['role'] == 'PENGURUS') {
                            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Selamat Datang<strong> ' . $user['nama_user'] . '</strong> ! Saat ini Anda masuk sebagai <strong>Fakultas</strong>. Tutup pesan ini jika sudah paham
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button></div>');
                            redirect('Pengurus/Dashboard');
                        } else if ($user['role'] == 'USER') {
                            redirect('Home');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger">
                  Password Anda salah, Silahkan di cek kembali
                </div>');
                    redirect('Auth');
                }
            } else if ($user['status'] == 'MENUNGGU PERSETUJUAN') {
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger">
                Akun anda belum aktif, Silahkan menunggu paling lambat 1x24 jam dari waktu anda mendaftar.
                </div>');
                redirect('Auth');
            } else if ($user['status'] == 'TIDAK AKTIF') {
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger">
                Akun anda sudah tidak aktif, Silahkan menghubungi admin untuk informasi lebih lanjut.
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger">
              Username anda tidak terdaftar
            </div>');
            redirect('Auth');
        }
    }

    public function registrasi()
    {
        $data['title'] = "Registrasi";
        $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim', [
            'required' => 'Anda Harus Mengisi Nama Lengkap'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
            'required' => 'Anda Harus Mengisi Username',
            'is_unique' => 'Username ini Sudah Terdaftar, Silahkan Masukan Username Lain'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Anda Harus Mengisi Password',
            'matches' => 'Password Anda Tidak Sama, Tolong Periksa Lagi',
            'min_length' => 'Password Anda Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Anda Harus Mengisi Password'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/registrasi', $data);
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 'USER',
                'status' => 'MENUNGGU PERSETUJUAN',
                'date_created' => time(),
            ];
            $email = $this->input->post('email');
            $this->admin->insert('user', $data);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success">
              Selamat! Akun Anda berhasil dibuat. Silahkan menunggu paling 1x24 jam, kami akan memverifikasi data akun yang baru anda buat.
            </div>');
            redirect('Auth');
        }
    }

    public function passwordbaru($username)
    {
        $data['title'] = "Password Baru &mdash; SPMI";
        $data['username'] = $username;

        $this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[5]|matches[password2]', [
            'required' => 'Anda harus mengisi password',
            'min_length' => 'Password anda minimal 5 karakter',
            'matches' => 'Password anda tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]', [
            'required' => 'Anda harus mengisi konfirmasi password',
            'matches' => 'Password anda tidak sama'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Passwordbaru', $data);
        } else {
            $username = $this->input->post('username');
            $password1 = $this->input->post('password1');

            $data = [
                'password' => password_hash($password1, PASSWORD_DEFAULT)
            ];
            $A_username = [
                'username' => $username,
            ];
            $this->auth->update('user', $data, $A_username);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password anda berhasil diganti. Silahkan login.</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success">
          Anda berhasil logout!
        </div>');
        redirect('Auth');
    }
}
