<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Setting_website extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Setting_website_model');
		$this->load->library('form_validation');
	}

	public function update($id)
	{
		$row = $this->Setting_website_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('setting_website/update_action'),
				'setting_website' => set_value('setting_website', $row->setting_website),
				'nama_website' => set_value('nama_website', $row->nama_website),
				'logo_dark' => set_value('logo_dark', $row->logo_dark),
				'logo_light' => set_value('logo_light', $row->logo_light),
				'telpon' => set_value('telpon', $row->telpon),
				'email' => set_value('email', $row->email),
				'alamat' => set_value('alamat', $row->alamat),
				'about_us' => set_value('about_us', $row->about_us),
				'url_fb' => set_value('url_fb', $row->url_fb),
				'url_yt' => set_value('url_yt', $row->url_yt),
				'url_ig' => set_value('url_ig', $row->url_ig),
				'url_twitter' => set_value('url_twitter', $row->url_twitter),
				'peta_lokasi' => set_value('peta_lokasi', $row->peta_lokasi),
			);
			$this->template->load('template', 'setting_website/setting_website_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('setting_website/update/Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('setting_website', TRUE));
		} else {

			$id = $this->input->post('setting_website');

			$config['upload_path']      = './temp/img';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("logo_dark")) {
				$row = $this->Setting_website_model->get_by_id($id);
				$data = $this->upload->data();
				$logo_dark = $data['file_name'];
				if ($row->logo_dark == null || $row->logo_dark == '') {
				} else {
					$target_file = './temp/img/' . $row->logo_dark;
					unlink($target_file);
				}
			} else {
				$logo_dark = $this->input->post('logo_dark_lama');
			}

			// logo light
			$config['upload_path']      = './temp/img';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("logo_light")) {
				$row = $this->Setting_website_model->get_by_id($id);
				$data = $this->upload->data();
				$logo_light = $data['file_name'];
				if ($row->logo_light == null || $row->logo_light == '') {
				} else {
					$target_file = './temp/img/' . $row->logo_light;
					unlink($target_file);
				}
			} else {
				$logo_light = $this->input->post('logo_light_lama');
			}
			

			
			$data = array(
				'nama_website' => $this->input->post('nama_website', TRUE),
				'logo_dark' => $logo_dark,
				'logo_light' => $logo_light,
				'telpon' => $this->input->post('telpon', TRUE),
				'email' => $this->input->post('email', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'about_us' => $this->input->post('about_us', TRUE),
				'url_fb' => $this->input->post('url_fb', TRUE),
				'url_yt' => $this->input->post('url_yt', TRUE),
				'url_ig' => $this->input->post('url_ig', TRUE),
				'url_twitter' => $this->input->post('url_twitter', TRUE),
				'peta_lokasi' => $this->input->post('peta_lokasi', TRUE),
			);

			$this->Setting_website_model->update($this->input->post('setting_website', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('setting_website/update/Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09'));
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nama_website', 'nama website', 'trim|required');
		// $this->form_validation->set_rules('logo_dark', 'logo dark', 'trim|required');
		// $this->form_validation->set_rules('logo_light', 'logo light', 'trim|required');
		$this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('about_us', 'about us', 'trim|required');
		$this->form_validation->set_rules('url_fb', 'url fb', 'trim|required');
		$this->form_validation->set_rules('url_yt', 'url yt', 'trim|required');
		$this->form_validation->set_rules('url_ig', 'url ig', 'trim|required');
		$this->form_validation->set_rules('url_twitter', 'url twitter', 'trim|required');
		$this->form_validation->set_rules('peta_lokasi', 'peta lokasi', 'trim|required');
		$this->form_validation->set_rules('setting_website', 'setting_website', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Setting_website.php */
/* Location: ./application/controllers/Setting_website.php */
/* Please DO NOT modify this information : */