<?php

class Obat_model extends CI_Model
{
    public $id;
    public $nama;
    public $harga;
    public $stok;

    public function insert()
    {
        $this->id = uniqid('OB');
        $this->nama = $this->input->post('nama_obat');
        $this->harga = $this->input->post('harga_obat');
        $this->stok = $this->input->post('stok_obat');

        $this->db->insert('obat', $this);
    }

    public function get_obat(string $id = '')
    {
        if (empty($id)) {
            $query = $this->db->get('obat');
            return $query->result();
        }

        $query = $this->db->get_where('obat', ['id' => $id]);
        return $query->row();
    }

    public function update(string $id)
    {
        $data = [
            'nama' => $this->input->post('nama_obat'),
            'harga' => $this->input->post('harga_obat'),
            'stok' => $this->input->post('stok_obat')
        ];

        $this->db->update('obat', $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete('obat', ['id' => $id]);
    }

    public function count_obat()
    {
        return $this->db->count_all_results('obat');
    }
}
