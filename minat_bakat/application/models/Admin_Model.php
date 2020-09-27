<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function getOrganisasiJoin()
    {
        $this->db->from('organisasi a');
        $this->db->join('user b', 'b.user_id=a.pengurus_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPendaftaranJoin()
    {
        $this->db->from('pendaftaran a');
        $this->db->join('organisasi b', 'b.organisasi_id=a.organisasi_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPendaftaranJoinWhere($pengurus_id)
    {
        $this->db->from('pendaftaran a');
        $this->db->join('organisasi b', 'b.organisasi_id=a.organisasi_id');
        $this->db->where('b.pengurus_id', $pengurus_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function getWhereOrder($table, $where, $order, $by)
    {
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order, $by);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNum($table)
    {
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getNumWhere($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
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
}
