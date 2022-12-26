<?php

class  LoginModel extends CI_Model
{
    public function get_posts()
    {
        $this->load->database();

        $query = $this->db->get('user');

        return $query->result();
    }
    public function Cek_Login($email, $password)
    {
        $builder = $this->db->table('user');
        $query   = $builder->get();
        var_dump($query);
    }
    public function register($fullname, $username, $telp, $email, $password)
    {
        $data = array('nama_lengkap' => $fullname, 'username' => $username, 'no_telp' => $telp, 'email' => $email, 'password' => $password);
        $this->load->database();
        $this->db->insert('user', $data);
        $data['data'] = $username;
        $this->load->view('Login', $data);
    }
}
