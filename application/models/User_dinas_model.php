<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_dinas_model extends CI_Model
{

    public $table = 'user_dinas';
    public $id = 'user_dinas_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$this->db->join('dinas', 'dinas.dinas_id = user_dinas.dinas_id', 'left');
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
        $this->db->like('user_dinas_id', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('dinas_id', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_telpon', $q);
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

	public function login ($post)
    {
        $this->db->select('*');
        $this->db->from('user_dinas');
        $this->db->where('username',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query=$this->db->get();
        return $query;
    }

	public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user_dinas');
        if ($id !=null){
            $this->db->where('user_dinas_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

}
