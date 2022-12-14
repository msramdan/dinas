<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public $table = 'kategori';
    public $id = 'kategori_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kategori_id', $q);
	$this->db->or_like('nama_kategori', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
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

    public function count_information(){
        $this->db->join('informasi', 'informasi.kategori_id = kategori.kategori_id', 'left');
        return $this->db->get($this->table)->result();
    }

    public function getInformasi ($kategori_id, $limit, $offset)
    {
        return $this->db
            ->join('informasi', 'informasi.kategori_id = kategori.kategori_id', 'left')
            ->join('user_dinas', 'user_dinas.user_dinas_id = informasi.author', 'left')
            ->where('kategori.kategori_id', $kategori_id)
            ->where('informasi.status', 'publish')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result();
    }

}