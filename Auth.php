<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login(){
        $this->load->view('login');
    }

    public function login_submit(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->get_by_email($email);
        if($user && password_verify($password, $user->password)){
            $this->session->set_userdata('user_id', $user->id);
            redirect('employee');
        } else {
            $this->session->set_flashdata('error', 'Invalid credentials');
            redirect('auth/login');
        }
    }

    public function register(){
        $this->load->view('register');
    }

    public function register_submit(){
        $data = array(
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );
        $this->User_model->insert($data);
        redirect('auth/login');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
