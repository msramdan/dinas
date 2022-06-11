<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departemen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Departemen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $departemen = $this->Departemen_model->get_all();
        $data = array(
            'departemen_data' => $departemen,
        );
        $this->template->load('template','departemen/departemen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Departemen_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'departemen_id' => $row->departemen_id,
		'kode_departemen' => $row->kode_departemen,
		'nama_departemen' => $row->nama_departemen,
	    );
            $this->template->load('template','departemen/departemen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departemen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('departemen/create_action'),
	    'departemen_id' => set_value('departemen_id'),
	    'kode_departemen' => set_value('kode_departemen'),
	    'nama_departemen' => set_value('nama_departemen'),
	);
        $this->template->load('template','departemen/departemen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_departemen' => $this->input->post('kode_departemen',TRUE),
		'nama_departemen' => $this->input->post('nama_departemen',TRUE),
	    );

            $this->Departemen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('departemen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Departemen_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('departemen/update_action'),
		'departemen_id' => set_value('departemen_id', $row->departemen_id),
		'kode_departemen' => set_value('kode_departemen', $row->kode_departemen),
		'nama_departemen' => set_value('nama_departemen', $row->nama_departemen),
	    );
            $this->template->load('template','departemen/departemen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departemen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('departemen_id', TRUE));
        } else {
            $data = array(
		'kode_departemen' => $this->input->post('kode_departemen',TRUE),
		'nama_departemen' => $this->input->post('nama_departemen',TRUE),
	    );

            $this->Departemen_model->update($this->input->post('departemen_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('departemen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Departemen_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Departemen_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('departemen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departemen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_departemen', 'kode departemen', 'trim|required');
	$this->form_validation->set_rules('nama_departemen', 'nama departemen', 'trim|required');

	$this->form_validation->set_rules('departemen_id', 'departemen_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Departemen.php */
/* Location: ./application/controllers/Departemen.php */
/* Please DO NOT modify this information : */