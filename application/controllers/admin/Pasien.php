<?php

use Aidid\BladeView\BladeView;

class Pasien extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();

        $this->load->model('pasien_model');

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
        $pasien = $this->pasien_model->get_pasien();

        $this->bladeView->render('admin/pasien/index', compact('pasien'));
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_pasien', 'Nama pasien', 'required|trim');
            $this->form_validation->set_rules('keluhan_pasien', 'Keluhane pasien', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/pasien/create');
            } else {
                $this->pasien_model->insert();
                redirect(base_url('admin/pasien'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('admin/pasien/create');
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_pasien', 'Nama pasien', 'required|trim');
            $this->form_validation->set_rules('keluhan_pasien', 'Keluhan pasien', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/pasien/edit');
            } else {
                $this->pasien_model->update($id);
                redirect(base_url('admin/pasien'));
            }
        }

        if ($this->input->method() === 'get') {
            $pasien = $this->pasien_model->get_pasien($id);

            $this->bladeView->render('admin/pasien/edit', compact('pasien'));
        }
    }

    public function delete(string $id)
    {
        $this->pasien_model->destroy($id);
        redirect(base_url('admin/pasien'));
    }
}
