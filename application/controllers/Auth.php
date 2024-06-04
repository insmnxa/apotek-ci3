<?php

use Aidid\BladeView\BladeView;

class Auth extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();
    }

    public function login()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('auth/login');
            } else {
                $this->load->model('auth_model');
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                if ($this->auth_model->login($username, $password)) {
                    redirect(base_url('admin/home'));
                } else {
                    $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
                    $this->bladeView->render('auth/login');
                }
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('auth/login');
        }
    }

    public function register()
    {
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/user/create');
            } else {
                $this->load->model('user_model');
                $this->user_model->insert();
                redirect(base_url('inactive'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('auth/register');
        }
    }

    public function logout()
    {
        $this->load->model('auth_model');
        $this->auth_model->logout();
        redirect(base_url('login'));
    }

    public function inactive()
    {
        $this->bladeView->render('auth/inactive');
    }
}
