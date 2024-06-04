<?php

class Resep_model extends CI_Model
{
    public $id;
    public $id_pasien;
    public $id_obat;
    public $id_dokter;

    public function insert()
    {
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_obat' => $this->input->post('obat')
        ];

        $this->db->insert_batch('resep', $data);
    }
}
