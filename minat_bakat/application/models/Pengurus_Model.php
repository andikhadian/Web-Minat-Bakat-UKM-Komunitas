<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus_Model extends CI_Model
{
    public function getStrukturOrganisasiJoin($id)
    {
        $this->db->from('struktur_organisasi a');
        $this->db->join('organisasi b', 'b.organisasi_id=a.organisasi_id');
        $this->db->where('b.organisasi_id ', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKegiatanOrganisasiJoin($id)
    {
        $this->db->from('kegiatan_organisasi a');
        $this->db->join('organisasi b', 'b.organisasi_id=a.organisasi_id');
        $this->db->where('b.organisasi_id ', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $id, $data)
    {
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($table);
    }

    public function delete($table, $id)
    {
        $this->db->delete($table, $id);
    }

    public function logout($table, $data, $user_id)
    {
        $this->db->update($table, $data, $user_id);
    }
}
