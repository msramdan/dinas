<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_dinas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('User_dinas_model');
		$this->load->model('Dinas_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user_dinas = $this->User_dinas_model->get_all();
		$data = array(
			'user_dinas_data' => $user_dinas,
		);
		$this->template->load('template', 'user_dinas/user_dinas_list', $data);
	}

	public function read($id)
	{
		$row = $this->User_dinas_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'user_dinas_id' => $row->user_dinas_id,
				'username' => $row->username,
				'password' => $row->password,
				'dinas_id' => $row->dinas_id,
				'email' => $row->email,
				'no_telpon' => $row->no_telpon,
				'kelompok' => $row->kelompok,
			);
			$this->template->load('template', 'user_dinas/user_dinas_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user_dinas'));
		}
	}

	public function create()
	{
		$dinas = $this->Dinas_model->get_all();
		$data = array(
			'button' => 'Create',
			'action' => site_url('user_dinas/create_action'),
			'user_dinas_id' => set_value('user_dinas_id'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'dinas_id' => set_value('dinas_id'),
			'email' => set_value('email'),
			'no_telpon' => set_value('no_telpon'),
			'kelompok' => set_value('kelompok'),
			'can_input_informasi' => set_value('can_input_informasi'),
			'can_input_komoditas' => set_value('can_input_komoditas'),
			'can_update_harga' => set_value('can_update_harga'),
			'dinas_data' => $dinas,
		);
		$this->template->load('template', 'user_dinas/user_dinas_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			if($this->input->post('can_input_informasi')=='Ya'){
				$can_input_informasi ='Ya';
			}else{
				$can_input_informasi ='Tidak';
			}

			if($this->input->post('can_input_komoditas')=='Ya'){
				$can_input_komoditas ='Ya';
			}else{
				$can_input_komoditas ='Tidak';
			}

			if($this->input->post('can_update_harga')=='Ya'){
				$can_update_harga ='Ya';
			}else{
				$can_update_harga ='Tidak';
			}
			
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => sha1($this->input->post('password', TRUE)),
				'dinas_id' => $this->input->post('dinas_id', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_telpon' => $this->input->post('no_telpon', TRUE),
				'kelompok' => $this->input->post('kelompok', TRUE),
				'can_input_informasi' => $can_input_informasi,
				'can_input_komoditas' => $can_input_komoditas,
				'can_update_harga' => $can_update_harga,
			);

			$this->User_dinas_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('user_dinas'));
		}
	}

	public function update($id)
	{
		$row = $this->User_dinas_model->get_by_id(decrypt_url($id));

		if ($row) {
			$dinas = $this->Dinas_model->get_all();
			$data = array(
				'button' => 'Update',
				'dinas_data' => $dinas,
				'action' => site_url('user_dinas/update_action'),
				'user_dinas_id' => set_value('user_dinas_id', $row->user_dinas_id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'dinas_id' => set_value('dinas_id', $row->dinas_id),
				'email' => set_value('email', $row->email),
				'no_telpon' => set_value('no_telpon', $row->no_telpon),
				'kelompok' => set_value('kelompok', $row->kelompok),
				'can_input_informasi' => set_value('can_input_informasi', $row->can_input_informasi),
				'can_input_komoditas' => set_value('can_input_komoditas', $row->can_input_komoditas),
				'can_update_harga' => set_value('can_update_harga', $row->can_update_harga),
			);
			$this->template->load('template', 'user_dinas/user_dinas_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user_dinas'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('user_dinas_id', TRUE));
		} else {

			if($this->input->post('can_input_informasi')=='Ya'){
				$can_input_informasi ='Ya';
			}else{
				$can_input_informasi ='Tidak';
			}

			if($this->input->post('can_input_komoditas')=='Ya'){
				$can_input_komoditas ='Ya';
			}else{
				$can_input_komoditas ='Tidak';
			}

			if($this->input->post('can_update_harga')=='Ya'){
				$can_update_harga ='Ya';
			}else{
				$can_update_harga ='Tidak';
			}
			
			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'dinas_id' => $this->input->post('dinas_id', TRUE),
					'email' => $this->input->post('email', TRUE),
					'no_telpon' => $this->input->post('no_telpon', TRUE),
					'kelompok' => $this->input->post('kelompok', TRUE),
					'can_input_informasi' => $can_input_informasi,
					'can_input_komoditas' => $can_input_komoditas,
					'can_update_harga' => $can_update_harga,
				);
			} else {
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'password' => sha1($this->input->post('password', TRUE)),
					'dinas_id' => $this->input->post('dinas_id', TRUE),
					'email' => $this->input->post('email', TRUE),
					'no_telpon' => $this->input->post('no_telpon', TRUE),
					'kelompok' => $this->input->post('kelompok', TRUE),
					'can_input_informasi' => $can_input_informasi,
					'can_input_komoditas' => $can_input_komoditas,
					'can_update_harga' => $can_update_harga,
				);
			}

			

			$this->User_dinas_model->update($this->input->post('user_dinas_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('user_dinas'));
		}
	}

	public function delete($id)
	{
		$row = $this->User_dinas_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->User_dinas_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('user_dinas'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user_dinas'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		// $this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('dinas_id', 'dinas id', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');

		$this->form_validation->set_rules('user_dinas_id', 'user_dinas_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file User_dinas.php */
/* Location: ./application/controllers/User_dinas.php */
/* Please DO NOT modify this information : */