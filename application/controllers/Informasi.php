<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Informasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
		$this->load->model('Informasi_model');
		$this->load->library('form_validation');
		$this->load->model('Kategori_model');
	}

	public function index()
	{
		$informasi = $this->Informasi_model->get_all();
		$data = array(
			'informasi_data' => $informasi,
		);
		$this->template->load('template', 'informasi/informasi_list', $data);
	}



	public function create()
	{
		$kategori = $this->Kategori_model->get_all();
		$data = array(
			'button' => 'Create',
			'kategori_data' => $kategori,
			'action' => site_url('informasi/create_action'),
			'informasi_id' => set_value('informasi_id'),
			'judul' => set_value('judul'),
			'kategori_id' => set_value('kategori_id'),
			'deskripsi' => set_value('deskripsi'),
			'author' => set_value('author'),
			'tanggal' => set_value('tanggal'),
			'thumbnail' => set_value('thumbnail'),
			'status' => set_value('status'),
		);
		$this->template->load('template', 'informasi/informasi_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$config['upload_path']      = './temp/img';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload("thumbnail");
			$data = $this->upload->data();
			$thumbnail = $data['file_name'];

			
			$data = array(
				'judul' => $this->input->post('judul', TRUE),
				'kategori_id' => $this->input->post('kategori_id', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'author' => $this->fungsi->user_login()->user_id,
				'tanggal' => date('Y-m-d H:i:s'),
				'thumbnail' => $thumbnail,
				'status' => 'Draft',
			);

			$this->Informasi_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('informasi'));
		}
	}

	public function update($id)
	{
		$row = $this->Informasi_model->get_by_id(decrypt_url($id));
		$kategori = $this->Kategori_model->get_all();
		if ($row) {
			$data = array(
				'button' => 'Update',
				'kategori_data' => $kategori,
				'action' => site_url('informasi/update_action'),
				'informasi_id' => set_value('informasi_id', $row->informasi_id),
				'judul' => set_value('judul', $row->judul),
				'kategori_id' => set_value('kategori_id', $row->kategori_id),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'author' => set_value('author', $row->author),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'thumbnail' => set_value('thumbnail', $row->thumbnail),
				'status' => set_value('status', $row->status),
			);
			$this->template->load('template', 'informasi/informasi_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('informasi'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('informasi_id')));
		} else {
			$id = $this->input->post('informasi_id');
			$config['upload_path']      = './temp/img';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("thumbnail")) {
				$row = $this->Informasi_model->get_by_id($id);
				$data = $this->upload->data();
				$thumbnail = $data['file_name'];
				if ($row->thumbnail == null || $row->thumbnail == '') {
				} else {
					$target_file = './temp/img/' . $row->thumbnail;
					unlink($target_file);
				}
			} else {
				$thumbnail = $this->input->post('thumbnail_lama');
			}

			
			$data = array(
				'judul' => $this->input->post('judul', TRUE),
				'kategori_id' => $this->input->post('kategori_id', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'thumbnail' => $thumbnail,
			);

			$this->Informasi_model->update($this->input->post('informasi_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('informasi'));
		}
	}

	public function delete($id)
	{
		$row = $this->Informasi_model->get_by_id(decrypt_url($id));

		if ($row) {
			if ($row->thumbnail == null || $row->thumbnail == '') {
			} else {
				$target_file = './temp/img/' . $row->thumbnail;
				unlink($target_file);
			}
			$this->Informasi_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('informasi'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('informasi'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('kategori_id', 'kategori id', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		// $this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim|required');
		$this->form_validation->set_rules('informasi_id', 'informasi_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function publish($id){
		$data = array(
				'status' => 'Publish',
		);

		$this->db->where('informasi_id', $id);
		$this->db->update('informasi', $data);
		$this->session->set_flashdata('message', 'Informasi Berhasil Di Set Publish');
		redirect(site_url('informasi'));
	}

	public function draft($id){
		$data = array(
				'status' => 'Draft',
		);

		$this->db->where('informasi_id', $id);
		$this->db->update('informasi', $data);
		$this->session->set_flashdata('message', 'Informasi Berhasil Di Set Draft');
		redirect(site_url('informasi'));
	}

	public function ajax_image()
	{
		$config['upload_path']          = './temp/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         = true;
		$this->load->library('upload', $config);
		$this->load->helper('debug');
		if (!$this->upload->do_upload('file')) {
			pJson([
				'success' => false
			]);
		} else {
			$data = $this->upload->data();
			pJson([
				'success' => true,
				'url' => base_url('temp/img/' . $data['file_name'])
			]);

		}
	}
}

/* End of file Informasi.php */
/* Location: ./application/controllers/Informasi.php */
/* Please DO NOT modify this information : */