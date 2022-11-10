<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Kontak_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$kontak = $this->Kontak_model->get_all();
		$data = array(
			'kontak_data' => $kontak,
		);
		$this->template->load('template', 'kontak/kontak_list', $data);
	}

	public function read($id)
	{
		$row = $this->Kontak_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'kontak_id' => $row->kontak_id,
				'nama' => $row->nama,
				'email' => $row->email,
				'telpon' => $row->telpon,
				'judul' => $row->judul,
				'deskripsi' => $row->deskripsi,
			);
			$this->template->load('template', 'kontak/kontak_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('kontak/create_action'),
			'kontak_id' => set_value('kontak_id'),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'telpon' => set_value('telpon'),
			'judul' => set_value('judul'),
			'deskripsi' => set_value('deskripsi'),
		);
		$this->template->load('template', 'kontak/kontak_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'telpon' => $this->input->post('telpon', TRUE),
				'judul' => $this->input->post('judul', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Kontak_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('kontak'));
		}
	}

	public function update($id)
	{
		$row = $this->Kontak_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('kontak/update_action'),
				'kontak_id' => set_value('kontak_id', $row->kontak_id),
				'nama' => set_value('nama', $row->nama),
				'email' => set_value('email', $row->email),
				'telpon' => set_value('telpon', $row->telpon),
				'judul' => set_value('judul', $row->judul),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
			);
			$this->template->load('template', 'kontak/kontak_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('kontak_id', TRUE));
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'telpon' => $this->input->post('telpon', TRUE),
				'judul' => $this->input->post('judul', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
			);

			$this->Kontak_model->update($this->input->post('kontak_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('kontak'));
		}
	}

	public function delete($id)
	{
		$row = $this->Kontak_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Kontak_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('kontak'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kontak'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

		$this->form_validation->set_rules('kontak_id', 'kontak_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */