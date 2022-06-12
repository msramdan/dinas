<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Karyawan_model');
		$this->load->model('Jabatan_model');
		$this->load->model('Departemen_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$karyawan = $this->Karyawan_model->get_all();
		$data = array(
			'karyawan_data' => $karyawan,
		);
		$this->template->load('template', 'karyawan/karyawan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Karyawan_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'karyawan_id' => $row->karyawan_id,
				'nik' => $row->nik,
				'nama_karyawan' => $row->nama_karyawan,
				'jabatan_id' => $row->jabatan_id,
				'departemen_id' => $row->departemen_id,
				'alamat' => $row->alamat,
				'jenis_kelamin' => $row->jenis_kelamin,
				'tanggal_lahir' => $row->tanggal_lahir,
				'tanggal_masuk' => $row->tanggal_masuk,
				'no_telpon' => $row->no_telpon,
				'status_karyawan' => $row->status_karyawan,
			);
			$this->template->load('template', 'karyawan/karyawan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'nik_lama' => set_value('nik'),
			'password' => set_value('password'),
			'jabatan' =>$this->Jabatan_model->get_all(),
			'departemen' =>$this->Departemen_model->get_all(),
			'action' => site_url('karyawan/create_action'),
			'karyawan_id' => set_value('karyawan_id'),
			'nik' => set_value('nik'),
			'nama_karyawan' => set_value('nama_karyawan'),
			'jabatan_id' => set_value('jabatan_id'),
			'departemen_id' => set_value('departemen_id'),
			'alamat' => set_value('alamat'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'tanggal_masuk' => set_value('tanggal_masuk'),
			'no_telpon' => set_value('no_telpon'),
			'status_karyawan' => set_value('status_karyawan'),
		);
		$this->template->load('template', 'karyawan/karyawan_form', $data);
	}

	public function create_action()
	{
		$this->_rules(null, null, null);

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			if($this->input->post('jabatan_id')==1){
				$level_id = 2;
			}else{
				$level_id = 3;
			}
			$data2 = array(
				'password' => sha1($this->input->post('password', TRUE)),
				'username' => $this->input->post('nik', TRUE),
				'level_id' => $level_id
			);
			$this->db->insert('user', $data2);

			if ($this->db->affected_rows() > 0) {
				$data = array(
					'nik' => $this->input->post('nik', TRUE),
					'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
					'jabatan_id' => $this->input->post('jabatan_id', TRUE),
					'departemen_id' => $this->input->post('departemen_id', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'tanggal_masuk' => $this->input->post('tanggal_masuk', TRUE),
					'no_telpon' => $this->input->post('no_telpon', TRUE),
					'status_karyawan' => $this->input->post('status_karyawan', TRUE),
				);
				$this->Karyawan_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('karyawan'));
			}else{
				$this->session->set_flashdata('error', 'Tambah data gagal');
				redirect(site_url('karyawan'));
			}

			
			
		}
	}

	public function update($id)
	{
		$row = $this->Karyawan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'nik_lama' => $row->nik,
				'action' => site_url('karyawan/update_action'),
				'jabatan' =>$this->Jabatan_model->get_all(),
				'departemen' =>$this->Departemen_model->get_all(),
				'karyawan_id' => set_value('karyawan_id', $row->karyawan_id),
				'nik' => set_value('nik', $row->nik),
				'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
				'jabatan_id' => set_value('jabatan_id', $row->jabatan_id),
				'departemen_id' => set_value('departemen_id', $row->departemen_id),
				'alamat' => set_value('alamat', $row->alamat),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
				'no_telpon' => set_value('no_telpon', $row->no_telpon),
				'status_karyawan' => set_value('status_karyawan', $row->status_karyawan),
			);
			$this->template->load('template', 'karyawan/karyawan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function update_action()
	{
		$this->_rules('update', $this->input->post('nik'), $this->input->post('nik'));

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('karyawan_id', TRUE));
		} else {
			if($this->input->post('jabatan_id')==1){
				$level_id = 2;
			}else{
				$level_id = 3;
			}

			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'username' => $this->input->post('nik', TRUE),
					'level_id' => $level_id 
				);
				$this->db->where('username', $this->input->post('nik_lama'));
				$this->db->update('user', $data);
			} else {
				$data = array(
					'password' => sha1($this->input->post('password', TRUE)),
					'username' => $this->input->post('nik', TRUE),
					'level_id' => $level_id 
				);
				$this->db->where('username', $this->input->post('nik_lama'));
				$this->db->update('user', $data);
			}

			$data = array(
				'nik' => $this->input->post('nik', TRUE),
				'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
				'jabatan_id' => $this->input->post('jabatan_id', TRUE),
				'departemen_id' => $this->input->post('departemen_id', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tanggal_masuk' => $this->input->post('tanggal_masuk', TRUE),
				'no_telpon' => $this->input->post('no_telpon', TRUE),
				'status_karyawan' => $this->input->post('status_karyawan', TRUE),
			);

			$this->Karyawan_model->update($this->input->post('karyawan_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('karyawan'));
		}
	}

	public function delete($id)
	{
		$row = $this->Karyawan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Karyawan_model->delete(decrypt_url($id));
			if ($this->db->affected_rows() > 0) {
				$this->db->where('username', $row->nik);
				$this->db->delete('user');
			}

			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('karyawan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('karyawan'));
		}
	}

	public function _rules($type, $new, $original_value)
	{
		if ($type != null) {
			if ($new == $original_value) {
				$is_unique =  '';
			} else {
				$is_unique =  '|is_unique[karyawan.nik]|is_unique[user.username]';
			}
		} else {
			$is_unique =  '|is_unique[karyawan.nik]|is_unique[user.username]';
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}

		$this->form_validation->set_rules('nik', 'nik', 'trim|required' . $is_unique);
		$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
		$this->form_validation->set_rules('jabatan_id', 'jabatan id', 'trim|required');
		$this->form_validation->set_rules('departemen_id', 'departemen id', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'trim|required');
		$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');
		$this->form_validation->set_rules('status_karyawan', 'status karyawan', 'trim|required');

		$this->form_validation->set_rules('karyawan_id', 'karyawan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
