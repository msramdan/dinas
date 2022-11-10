<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Web extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->model('Setting_website_model');
		$this->load->model('Informasi_model');
		$this->load->model('Kontak_model');
	}

	public function index()
	{
		$informasi= $this->Informasi_model->get_all();
		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
			'informasi'=> $informasi,
		);
		$this->template->load('template_web', 'web/home', $data);
	}

	public function kontak()
	{
		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
		);
		$this->template->load('template_web', 'web/kontak', $data);
	}

	public function komoditas()
	{
		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
		);
		$this->template->load('template_web', 'web/komoditas', $data);
	}

	public function kategori($id)
	{
		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
		);
		$this->template->load('template_web', 'web/kategori', $data);
	}

	public function detail($id)
	{
		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
		);
		$this->template->load('template_web', 'web/detail', $data);
	}

	public function submit_kontak()
	{
		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'email' => $this->input->post('email', TRUE),
			'telpon' => $this->input->post('telpon', TRUE),
			'judul' => $this->input->post('judul', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
		);

		$this->Kontak_model->insert($data);
		$this->session->set_flashdata('message', 'Pesan Berhasil Dikirim');
		redirect(site_url('web/kontak'));
	}
}