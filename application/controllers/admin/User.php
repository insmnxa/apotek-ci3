<?php

use Aidid\BladeView\BladeView;

class User extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();

        $this->load->model('auth_model');
        $user = $this->auth_model->current_user();

        if (!$user) {
            redirect(base_url('login'));
        }

        if ($user->is_active == 0) {
            redirect(base_url('inactive'));
        }
    }

    public function index()
    {
        $this->load->model('user_model');

        $users = $this->user_model->get_user();

        $this->bladeView->render('admin/user/index', compact('users'));
    }

    public function create()
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
                redirect(base_url('admin/user'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('admin/user/create');
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->load->helper('form');

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/user/edit');
            } else {
                $this->load->model('user_model');
                $this->user_model->update($id);
                redirect(base_url('admin/user'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('user_model');
            $user = $this->user_model->get_user($id);

            if (empty($user)) {
                show_404();
            }

            $this->bladeView->render('admin/user/edit', compact('user'));
        }
    }

    public function delete(string $id)
    {
        $this->load->model('user_model');
        $user = $this->user_model->get_user($id);

        if (empty($user)) {
            show_404();
        }

        $this->user_model->destroy($id);
        redirect(base_url('admin/user'));
    }
}
