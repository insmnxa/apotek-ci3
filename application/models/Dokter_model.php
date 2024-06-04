<?php

class Dokter_model extends CI_Model
{
    public $id;
    public $nama;
    public $alamat;

    public function insert()
    {
        $this->id = uniqid('DR');
        $this->nama = $this->input->post('nama_dokter');
        $this->alamat = $this->input->post('alamat_dokter');

        $this->db->insert('dokter', $this);
    }

    public function get_dokter(string $id = '')
    {
        if (empty($id)) {
            $query = $this->db->get('dokter');
            return $query->result();
        }

        $query = $this->db->get_where('dokter', ['id' => $id]);
        return $query->row();
    }

    public function update(string $id)
    {
        $data = [
            'nama' => $this->input->post('nama_dokter'),
            'alamat' => $this->input->post('alamat_dokter')
        ];

        $this->db->update('dokter', $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete('dokter', ['id' => $id]);
    }

    public function count_dokter()
    {
        return $this->db->count_all_results('dokter');
    }
}
