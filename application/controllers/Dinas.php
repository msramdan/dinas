<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dinas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
        $this->load->model('Dinas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $dinas = $this->Dinas_model->get_all();
        $data = array(
            'dinas_data' => $dinas,
        );
        $this->template->load('template','dinas/dinas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dinas_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'dinas_id' => $row->dinas_id,
		'nama_dinas' => $row->nama_dinas,
	    );
            $this->template->load('template','dinas/dinas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dinas/create_action'),
	    'dinas_id' => set_value('dinas_id'),
	    'nama_dinas' => set_value('nama_dinas'),
	);
        $this->template->load('template','dinas/dinas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dinas' => $this->input->post('nama_dinas',TRUE),
	    );

            $this->Dinas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dinas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dinas_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dinas/update_action'),
		'dinas_id' => set_value('dinas_id', $row->dinas_id),
		'nama_dinas' => set_value('nama_dinas', $row->nama_dinas),
	    );
            $this->template->load('template','dinas/dinas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('dinas_id', TRUE));
        } else {
            $data = array(
		'nama_dinas' => $this->input->post('nama_dinas',TRUE),
	    );

            $this->Dinas_model->update($this->input->post('dinas_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dinas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dinas_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Dinas_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dinas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dinas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_dinas', 'nama dinas', 'trim|required');

	$this->form_validation->set_rules('dinas_id', 'dinas_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dinas.php */
/* Location: ./application/controllers/Dinas.php */
/* Please DO NOT modify this information : */