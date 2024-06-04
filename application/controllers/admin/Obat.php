<?php

use Aidid\BladeView\BladeView;

class Obat extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();

        $this->load->model('obat_model');

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
        $obat = $this->obat_model->get_obat();

        $this->bladeView->render('admin/obat/index', compact('obat'));
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|trim');
            $this->form_validation->set_rules('harga_obat', 'Harga obat', 'required|trim');
            $this->form_validation->set_rules('stok_obat', 'Stok obat', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/obat/create');
            } else {
                $this->obat_model->insert();
                redirect(base_url('admin/obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->bladeView->render('admin/obat/create');
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_obat', 'Nama obat', 'required|trim');
            $this->form_validation->set_rules('harga_obat', 'Harga obat', 'required|trim');
            $this->form_validation->set_rules('stok_obat', 'Stok obat', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/obat/edit');
            } else {
                $this->obat_model->update($id);
                redirect(base_url('admin/obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $obat = $this->obat_model->get_obat($id);

            $this->bladeView->render('admin/obat/edit', compact('obat'));
        }
    }

    public function delete(string $id)
    {
        $this->obat_model->destroy($id);
        redirect(base_url('admin/obat'));
    }
}
