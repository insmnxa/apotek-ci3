<?php

class Pasien_model extends CI_Model
{
    public $id;
    public $nama;
    public $tgl_datang;
    public $keluhan;
    public $status;

    public function insert()
    {
        $this->id = uniqid('DR');
        $this->nama = $this->input->post('nama_pasien');
        $this->tgl_datang = date('Y-m-d');
        $this->keluhan = $this->input->post('keluhan_pasien');
        $this->status = 'queued';

        $this->db->insert('pasien', $this);
    }

    public function get_pasien(string $id = '')
    {
        if (empty($id)) {
            $query = $this->db->get('pasien');
            return $query->result();
        }

        $query = $this->db->get_where('pasien', ['id' => $id]);
        return $query->row();
    }

    public function update(string $id)
    {
        $data = [
            'nama' => $this->input->post('nama_pasien'),
            'keluhan' => $this->input->post('keluhan_pasien'),
            'status' => $this->input->post('status')
        ];

        $this->db->update('pasien', $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete('pasien', ['id' => $id]);
    }

    public function count_pasien()
    {
        return $this->db->count_all_results('pasien');
    }
}
