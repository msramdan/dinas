<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komoditas_model extends CI_Model
{

    public $table = 'komoditas';
    public $id = 'komoditas_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($where = [], $like = false)
    {
		$this->db->join('user_dinas', 'user_dinas.user_dinas_id = komoditas.user_dinas_id', 'left');
		$this->db->join('dinas', 'dinas.dinas_id = user_dinas.dinas_id', 'left');
		$this->db->join('produk', 'produk.produk_id = komoditas.produk_id', 'left');
        $this->db->order_by($this->id, $this->order);
        if(!empty($where)){
            $this->db->where($where);
        }
        if($like){
            $this->db->like('kelompok', $like);
        }
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
        $this->db->like('komoditas_id', $q);
	$this->db->or_like('tgl_update', $q);
	$this->db->or_like('produk_id', $q);
	$this->db->or_like('user_dinas_id', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('rencana_produksi', $q);
	$this->db->or_like('ketahanan_bulanan', $q);
	$this->db->or_like('data_minggu', $q);
	$this->db->or_like('hasil_produksi_harian', $q);
	$this->db->or_like('harga_total_produksi', $q);
	$this->db->or_like('harga_dari_produsen', $q);
	$this->db->or_like('harga_pedagang', $q);
	$this->db->or_like('user_validasi_harga', $q);
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