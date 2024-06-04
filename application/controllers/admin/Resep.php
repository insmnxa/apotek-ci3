<?php

use Aidid\BladeView\BladeView;

class Resep extends CI_Controller
{
    public $bladeView;
    public function __construct()
    {
        parent::__construct();
        $this->bladeView = new BladeView();

        $this->load->model(['resep_model', 'pasien_model', 'dokter_model', 'obat_model']);

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

        $this->bladeView->render('admin/resep/index', compact('pasien'));
    }

    public function create(string $id)
    {
        if ($this->input->method() === 'post') {
            // var_dump($this->input->post());
            // return;
            $this->load->helper('form');
            $this->load->library('form_validation');

            if ($this->form_validation->run() === FALSE) {
                $this->bladeView->render('admin/resep/create');
            } else {
                $this->resep_model->insert();
                redirect(base_url('admin/resep'));
            }
        }

        if ($this->input->method() === 'get') {
            $pasien = $this->pasien_model->get_pasien($id);
            $dokter = $this->dokter_model->get_dokter();
            $obat = $this->obat_model->get_obat();

            $this->bladeView->render('admin/resep/create', compact('pasien', 'dokter', 'obat'));
        }
    }
}
