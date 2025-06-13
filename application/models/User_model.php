<?php

class User_model extends CI_Model {

    public function insert_user($data){
        return $this->db->insert('users', $data);
    }
    public function check_user($username, $password){
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if($user && password_verify($password, $user->password)){
            return $user;
        }
        return false;
    }

    public function get_by_id($id)
{
    return $this->db->get_where('users', ['id' => $id])->row();
}

public function count_pasien()
{
    $this->db->where('role', 'pasien');
    return $this->db->count_all_results('users');
}

}