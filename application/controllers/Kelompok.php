<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelompok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Kelompok_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kelompok = $this->Kelompok_model->get_all();
        $data = array(
            'kelompok_data' => $kelompok,
        );
        $this->template->load('template','kelompok/kelompok_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kelompok_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'kelompok_id' => $row->kelompok_id,
		'nama_kelompok' => $row->nama_kelompok,
	    );
            $this->template->load('template','kelompok/kelompok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelompok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelompok/create_action'),
	    'kelompok_id' => set_value('kelompok_id'),
	    'nama_kelompok' => set_value('nama_kelompok'),
	);
        $this->template->load('template','kelompok/kelompok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kelompok' => $this->input->post('nama_kelompok',TRUE),
	    );

            $this->Kelompok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelompok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kelompok_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelompok/update_action'),
		'kelompok_id' => set_value('kelompok_id', $row->kelompok_id),
		'nama_kelompok' => set_value('nama_kelompok', $row->nama_kelompok),
	    );
            $this->template->load('template','kelompok/kelompok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelompok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kelompok_id', TRUE));
        } else {
            $data = array(
		'nama_kelompok' => $this->input->post('nama_kelompok',TRUE),
	    );

            $this->Kelompok_model->update($this->input->post('kelompok_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelompok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kelompok_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Kelompok_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelompok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelompok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kelompok', 'nama kelompok', 'trim|required');

	$this->form_validation->set_rules('kelompok_id', 'kelompok_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelompok.php */
/* Location: ./application/controllers/Kelompok.php */
/* Please DO NOT modify this information : */