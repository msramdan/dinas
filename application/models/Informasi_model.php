<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

    public $table = 'informasi';
    public $id = 'informasi_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$this->db->join('kategori', 'kategori.kategori_id = informasi.kategori_id', 'left');
		$this->db->join('user_dinas', 'user_dinas.user_dinas_id = informasi.author', 'left');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

	 function get_where($id)
    {
		$this->db->join('kategori', 'kategori.kategori_id = informasi.kategori_id', 'left');
		$this->db->join('user_dinas', 'user_dinas.user_dinas_id = informasi.author', 'left');
		$this->db->where('author', $id);
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
        $this->db->like('informasi_id', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('kategori_id', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('author', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('thumbnail', $q);
	$this->db->or_like('status', $q);
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

}
