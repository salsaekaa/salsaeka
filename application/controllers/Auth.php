<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    // Tampilkan form register
    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    }

    // Proses data dari form register
    public function process_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama'     => $this->input->post('nama'),
                'role'     => 'pasien'
            ];
            $this->User_model->insert_user($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('auth/login');
        }
    }

    // Tampilkan form login
    public function login()
    {
        $this->load->view('auth/login');
    }

    // Proses login admin & pasien
    public function process_login()
{
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth/login');
    } else {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row();

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id'  => $user->id,
                'username' => $user->username,
                'role'     => $user->role,
                'nama'     => $user->nama
            ]);

            if ($user->role === 'admin') {
                redirect('admin/pendaftaran');
            } else {
                redirect('pasien/daftar');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth/login');
        }
    }
}


    // Fungsi tambahan untuk buat akun admin
    public function buat_admin()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'nama'     => 'Administrator',
            'role'     => 'admin'
        ];
        $this->db->insert('users', $data);
        echo "✅ Akun admin berhasil dibuat.";
    }

    public function reset_password_admin()
{
    $newPassword = password_hash('admin123', PASSWORD_DEFAULT);
    $this->db->where('username', 'admin')->update('users', ['password' => $newPassword]);
    echo "✅ Password admin berhasil direset ke admin123";
}

public function logout()
{
    $this->session->sess_destroy();
    redirect('auth/login');
}

}
