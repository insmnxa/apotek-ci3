<?php

use Aidid\BladeView\BladeView;

class Home extends CI_Controller
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
        $this->load->model(['obat_model', 'pasien_model', 'dokter_model']);
        $obat_count = $this->obat_model->count_obat();
        $pasien_count = $this->pasien_model->count_pasien();
        $dokter_count = $this->dokter_model->count_dokter();

        $this->bladeView->render('admin/dashboard', compact('obat_count', 'pasien_count', 'dokter_count'));
    }
}
