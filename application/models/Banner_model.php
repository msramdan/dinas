<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model
{
    public $table = 'banner';
    public $id = 'id';
    
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert ($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
