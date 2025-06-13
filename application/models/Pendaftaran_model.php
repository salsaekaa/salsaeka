<?php
class Pendaftaran_model extends CI_Model {

    // Ambil semua data pendaftaran + nama user
    public function get_all_with_user()
    {
        return $this->db
            ->select('pendaftaran.*, users.nama')
            ->from('pendaftaran')
            ->join('users', 'users.id = pendaftaran.user_id')
            ->get()
            ->result();
    }

    // Ambil hanya yang status 'diterima'
    public function get_diterima()
    {
        return $this->db
            ->select('pendaftaran.*, users.nama')
            ->from('pendaftaran')
            ->join('users', 'users.id = pendaftaran.user_id')
            ->where('pendaftaran.status', 'diterima')
            ->get()
            ->result();
    }

    // Alias get_diterima (opsional)
    public function get_pasien_terdaftar()
    {
        return $this->get_diterima();
    }

    // Ambil 1 data berdasarkan ID pendaftaran
    public function get_by_id($id)
    {
        return $this->db->get_where('pendaftaran', ['id' => $id])->row();
    }

    // Tambah data pendaftaran
    public function insert($data)
    {
        return $this->db->insert('pendaftaran', $data);
    }

    // Update data pendaftaran
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('pendaftaran', $data);
    }

    // Hapus data pendaftaran
    public function delete($id)
    {
        return $this->db->delete('pendaftaran', ['id' => $id]);
    }

    // Ambil semua data berdasarkan user login
    public function get_by_user($user_id)
{
    return $this->db
        ->select('pendaftaran.*, users.nama')
        ->from('pendaftaran')
        ->join('users', 'users.id = pendaftaran.user_id')
        ->where('pendaftaran.user_id', $user_id)
        ->get()
        ->result();
}


    // Update status pendaftaran (diterima/ditolak)
    public function update_status($id, $status)
    {
        return $this->db->where('id', $id)->update('pendaftaran', ['status' => $status]);
    }

    // Ambil data detail berdasarkan status tertentu (opsional)
    public function get_all_with_detail($status = null)
    {
        $this->db->select('pendaftaran.*, users.nama');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'users.id = pendaftaran.user_id');
        
        if ($status !== null) {
            $this->db->where('pendaftaran.status', $status);
        }

        return $this->db->get()->result();
    }
}
