<?php

use Aidid\BladeView\BladeView;

class Dokter extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();

        $this->load->model('dokter_model');
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
        $dokter = $this->dokter_model->get_dokter();

        $this->bladeView->render('admin/dokter/index', compact('dokter'));
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_dokter', 'Nama dokter', 'required|trim');
            $this->form_validation->set_rules('alamat_dokter', 'Alamat dokter', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/dokter/create');
            } else {
                $this->dokter_model->insert();
                redirect(base_url('admin/dokter'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('admin/dokter/create');
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_dokter', 'Nama dokter', 'required|trim');
            $this->form_validation->set_rules('alamat_dokter', 'Alamat dokter', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/dokter/edit');
            } else {
                $this->dokter_model->update($id);
                redirect(base_url('admin/dokter'));
            }
        }

        if ($this->input->method() === 'get') {
            $dokter = $this->dokter_model->get_dokter($id);

            $this->bladeView->render('admin/dokter/edit', compact('dokter'));
        }
    }

    public function delete(string $id)
    {
        $this->dokter_model->destroy($id);
        redirect(base_url('admin/dokter'));
    }
}
