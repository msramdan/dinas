<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $produk = $this->Produk_model->get_all();
        $data = array(
            'produk_data' => $produk,
        );
        $this->template->load('template','produk/produk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'produk_id' => $row->produk_id,
		'kode_produk' => $row->kode_produk,
		'nama_produk' => $row->nama_produk,
	    );
            $this->template->load('template','produk/produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
	    'produk_id' => set_value('produk_id'),
	    'kode_produk' => set_value('kode_produk'),
	    'nama_produk' => set_value('nama_produk'),
	);
        $this->template->load('template','produk/produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
		'produk_id' => set_value('produk_id', $row->produk_id),
		'kode_produk' => set_value('kode_produk', $row->kode_produk),
		'nama_produk' => set_value('nama_produk', $row->nama_produk),
	    );
            $this->template->load('template','produk/produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('produk_id', TRUE));
        } else {
            $data = array(
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
	    );

            $this->Produk_model->update($this->input->post('produk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Produk_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_produk', 'kode produk', 'trim|required');
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');

	$this->form_validation->set_rules('produk_id', 'produk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
