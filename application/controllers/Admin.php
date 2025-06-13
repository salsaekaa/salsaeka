<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
        $this->load->model('Dokter_model');
        $this->load->model('User_model');
    }

    public function dashboard()
{
    $this->load->model('Pendaftaran_model');
    $data['title'] = "Dashboard Admin";

    $all = $this->Pendaftaran_model->get_all_with_detail();
    $data['total_pendaftar'] = count($all);
    $data['total_diterima'] = count($this->Pendaftaran_model->get_all_with_detail('diterima'));
    $data['total_ditolak'] = count($this->Pendaftaran_model->get_all_with_detail('ditolak'));
    $data['total_menunggu'] = count($this->Pendaftaran_model->get_all_with_detail('menunggu'));

    $this->load->view('templates/header');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
}
    public function pendaftaran()
    {
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_user();
        $data['title'] = 'Data Pendaftaran Pasien';

        $this->load->view('templates/header');
        $this->load->view('admin/pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function setuju($id)
    {
        $this->db->update('pendaftaran', ['status' => 'diterima'], ['id' => $id]);
        redirect('admin/pendaftaran');
    }

    public function tolak($id)
    {
        $this->db->update('pendaftaran', ['status' => 'ditolak'], ['id' => $id]);
        redirect('admin/pendaftaran');
    }

    public function pasien_terdaftar()
    {
        $this->load->model('Pendaftaran_model');
        $data['pasien'] = $this->Pendaftaran_model->get_diterima();
        $data['title'] = "Pasien Diterima";

        $this->load->view('templates/header');
        $this->load->view('admin/pasien_terdaftar', $data);
        $this->load->view('templates/footer');
    }

    public function pasien_ditolak()
{
    $this->load->model('Pendaftaran_model');
    $data['pasien'] = $this->Pendaftaran_model->get_all_with_detail('ditolak');
    $data['title'] = "Pasien Ditolak";

    $this->load->view('templates/header');
    $this->load->view('admin/pasien_ditolak', $data);
    $this->load->view('templates/footer');
}

public function konfirmasi()
{
    $this->load->model('Pendaftaran_model');
    $data['pasien'] = $this->Pendaftaran_model->get_all_with_detail('menunggu');
    $data['title'] = "Pasien Menunggu Konfirmasi";

    $this->load->view('templates/header');
    $this->load->view('admin/konfirmasi', $data); // Buat view ini nanti
    $this->load->view('templates/footer');
}


    public function laporan()
{
    $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_user();
    $data['title'] = "Laporan Pendaftaran Pasien";
    $this->load->view('templates/header');
    $this->load->view('admin/laporan', $data);
    $this->load->view('templates/footer');
}


    public function kelola_pasien()
{
    $this->load->model('Pendaftaran_model');
    $data['pasien'] = $this->Pendaftaran_model->get_all_with_user(); // atau get_pasien_terdaftar()
    $data['title'] = "Kelola Pasien";

    $this->load->view('templates/header');
    $this->load->view('admin/kelola_pasien', $data);
    $this->load->view('templates/footer');
}


    public function edit_pasien($id)
{
    $this->load->model('Pendaftaran_model');
    $data['pasien'] = $this->Pendaftaran_model->get_by_id($id);

    if (!$data['pasien']) {
        show_404(); // jika data tidak ditemukan
    }

    $data['title'] = "Edit Pasien";

    if ($this->input->post()) {
        $input = $this->input->post();

        // Debug opsional
        // echo "<pre>"; print_r($input); exit;

        $this->Pendaftaran_model->update($id, $input);
        $this->session->set_flashdata('success', '✅ Data pasien berhasil diperbarui.');
        redirect('admin/kelola_pasien');
    }

    $this->load->view('templates/header');
    $this->load->view('admin/form_pasien', $data);
    $this->load->view('templates/footer');
}

    public function hapus_pasien($id)
    {
        $this->Pendaftaran_model->delete($id);
        redirect('admin/kelola_pasien');
    }

    public function ubah_status($id, $status)
    {
        if (in_array($status, ['diterima', 'ditolak'])) {
            $this->Pendaftaran_model->update_status($id, $status);
            $this->session->set_flashdata('success', 'Status pendaftaran berhasil diubah.');
        } else {
            $this->session->set_flashdata('error', 'Status tidak valid.');
        }

        redirect('admin/pendaftaran');
    }

    public function jadwal()
    {
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_detail('diterima');
        $data['title'] = "Jadwal Kunjungan Pasien";

        $this->load->view('templates/header');
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pasien()
    {
        $data['dokter'] = $this->Dokter_model->get_all();
        $data['title'] = "Tambah Pasien";

        if ($this->input->post()) {
            $last_id = $this->User_model->count_pasien();
            $username = 'pasien' . ($last_id + 1);

            $user_data = [
                'username' => $username,
                'password' => password_hash('pasien123', PASSWORD_DEFAULT),
                'nama'     => $this->input->post('nama'),
                'role'     => 'pasien'
            ];
            $this->User_model->insert_user($user_data);
            $user_id = $this->db->insert_id();

            $dokter_poli = explode('|', $this->input->post('dokter'));
            $nama_dokter = $dokter_poli[0];
            $poli = $dokter_poli[1];

            $data = [
                'user_id'    => $user_id,
                'nama'       => $this->input->post('nama'),
                'tgl_lahir'  => $this->input->post('tgl_lahir'),
                'alamat'     => $this->input->post('alamat'),
                'telepon'    => $this->input->post('telepon'),
                'keluhan'    => $this->input->post('keluhan'),
                'tanggal'    => $this->input->post('tanggal'),
                'jam'        => $this->input->post('jam'),
                'dokter'     => $nama_dokter,
                'poli'       => $poli,
                'status'     => 'menunggu'
            ];

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan. Username: ' . $username . ', Password: pasien123');
            redirect('admin/pendaftaran');
        }

        $this->load->view('templates/header');
        $this->load->view('admin/tambah_pasien', $data);
        $this->load->view('templates/footer');
    }
public function export_csv()
{
    $this->load->model('Pendaftaran_model');
    $data = $this->Pendaftaran_model->get_all_with_user();

    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=laporan_pasien.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");
    fputcsv($output, ['Nama', 'Tanggal', 'Poli', 'Dokter', 'Keluhan', 'Status']);

    foreach ($data as $row) {
        fputcsv($output, [$row->nama, $row->tanggal, $row->poli, $row->dokter, $row->keluhan, $row->status]);
    }

    fclose($output);
}

public function export_pdf()
{
    $this->load->model('Pendaftaran_model');
    $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_user();
    $data['title'] = "Laporan Pendaftaran Pasien";

    $html = $this->load->view('admin/laporan_pdf', $data, true);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $dompdf->stream('laporan_pasien.pdf', array("Attachment" => true));
}



    
} 
