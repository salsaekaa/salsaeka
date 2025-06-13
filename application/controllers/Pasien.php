<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Cek jika bukan pasien, redirect
        if ($this->session->userdata('role') !== 'pasien') {
            redirect('auth/login');
        }

        $this->load->model('Pendaftaran_model');
        $this->load->model('User_model');
        $this->load->model('Dokter_model'); // ambil daftar dokter dari database
    }

    public function daftar()
{
    $data['title'] = "Form Pendaftaran";

    // Ambil data user yang sedang login
    $user_id = $this->session->userdata('user_id');
    $user = $this->User_model->get_by_id($user_id);
    $data['nama_pasien'] = $user ? $user->nama : 'Tidak Diketahui';

    $data['dokter'] = $this->Dokter_model->get_all();

    if ($this->input->post()) {
        // Validasi input
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('jam', 'Jam Kunjungan', 'required');
        $this->form_validation->set_rules('dokter_poli', 'Dokter & Poli', 'required');

        if ($this->form_validation->run() === TRUE) {
            // Pisahkan dokter dan poli dari value select
            list($dokter, $poli) = explode('|', $this->input->post('dokter_poli'));

            // Simpan data ke database
            $data_insert = [
                'user_id'    => $user_id,
                'nama'       => $user->nama, // nama diambil dari tabel users
                'tgl_lahir'  => $this->input->post('tgl_lahir'),
                'alamat'     => $this->input->post('alamat'),
                'telepon'    => $this->input->post('telepon'),
                'keluhan'    => $this->input->post('keluhan'),
                'tanggal'    => $this->input->post('tanggal'),
                'jam'        => $this->input->post('jam'),
                'dokter'     => $dokter,
                'poli'       => $poli,
                'status'     => 'menunggu'
            ];

            $this->Pendaftaran_model->insert($data_insert);
            $this->session->set_flashdata('success', 'Pendaftaran berhasil!');
            redirect('pasien/status');
            return;
        }
    }
 // nama pasien untuk ditampilkan di form (readonly)
    $data['nama_pasien'] = $user->nama;
    // Tampilkan form
    $this->load->view('templates/header');
    $this->load->view('pasien/form_pendaftaran', $data);
    $this->load->view('templates/footer');
}


    public function status()
    {
        $data['title'] = "Status Pendaftaran";
        $data['title'] = "Status Pendaftaran / Jadwal Kunjungan";
        $data['pendaftaran'] = $this->Pendaftaran_model->get_by_user($this->session->userdata('user_id'));

        $this->load->view('templates/header');
        $this->load->view('pasien/status', $data);
        $this->load->view('templates/footer');
    }
}
