<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            echo 'Data Tidak Terdaftar';
        } else {
            $this->_login();
        }
    }
    public function _login()
    {
        $this->load->database();
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        if ($user) {
            $data['data'] = $user['username'];
            if ($user['password'] == $password) {
                $this->load->view('Login', $data);
            } else {
                echo 'Email atau kata sandi salah';
            }
        } else {
            echo 'Data Tidak Terdaftar';
        }
    }
    public function show()
    {
        $this->load->helper('url');
        $this->load->model('LoginModel');

        $posts = $this->LoginModel->get_posts();
        $data['posts'] = $posts;

        $this->load->view('read', $data);
    }
    public function register()
    {
        $this->load->database();
        $fullname = $this->input->post('namalengkap');
        $username = $this->input->post('username');
        $telp = $this->input->post('telepon');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->helper('url');
        $this->load->model('LoginModel');
        $this->LoginModel->register($fullname, $username, $telp, $email, $password);
    }
}
