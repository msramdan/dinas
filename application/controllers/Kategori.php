<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kategori = $this->Kategori_model->get_all();
        $data = array(
            'kategori_data' => $kategori,
        );
        $this->template->load('template','kategori/kategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'kategori_id' => $row->kategori_id,
		'nama_kategori' => $row->nama_kategori,
	    );
            $this->template->load('template','kategori/kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori/create_action'),
	    'kategori_id' => set_value('kategori_id'),
	    'nama_kategori' => set_value('nama_kategori'),
	);
        $this->template->load('template','kategori/kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori/update_action'),
		'kategori_id' => set_value('kategori_id', $row->kategori_id),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	    );
            $this->template->load('template','kategori/kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kategori_id', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('kategori_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Kategori_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

    

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
