<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_website_model extends CI_Model
{

    public $table = 'setting_website';
    public $id = 'setting_website';
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
        $this->db->like('setting_website', $q);
	$this->db->or_like('nama_website', $q);
	$this->db->or_like('logo_dark', $q);
	$this->db->or_like('logo_light', $q);
	$this->db->or_like('telpon', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('about_us', $q);
	$this->db->or_like('url_fb', $q);
	$this->db->or_like('url_yt', $q);
	$this->db->or_like('url_ig', $q);
	$this->db->or_like('url_twitter', $q);
	$this->db->or_like('peta_lokasi', $q);
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