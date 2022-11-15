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
		$this->load->model('Banner_model');
		$this->load->model('Komoditas_model');
		 $this->load->model('Kelompok_model');
	}

	public function index()
	{
		$informasi= $this->Informasi_model->get_all(6, ['informasi.status' => 'publish']);
		$kategori = $this->Kategori_model->get_all();
		$banner = $this->Banner_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);

		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
			'informasi'=> $informasi,
			'banner'=> $banner,
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
		if($this->input->is_ajax_request()){
			$this->load->helper('debug');
			$komoditas = $this->input->get('komoditas');
			$sumber_data = $this->input->get('sumber_data');
			$kelompok = $this->input->get('kelompok');
			$bulan_tahun = $this->input->get('bulan_tahun');
			$minggu = $this->input->get('minggu');
			$where = [];

			if(!empty($komoditas)){
				$where['produk.produk_id'] = $komoditas;
			}

			if(!empty($sumber_data)){
				$where['user_dinas.dinas_id'] = $sumber_data;
			}

			if(!empty($bulan_tahun)){
				$where['komoditas.bulan_tahun'] = $bulan_tahun;
			}

			if(!empty($minggu)){
				$where['komoditas.data_minggu'] = $minggu;
			}

			if(!empty($kelompok)){
				$where['kelompok.kelompok_id'] = $kelompok;
			}

			pJson($this->Komoditas_model->get_all($where));
		}

		$kategori = $this->Kategori_model->get_all();
		$setting = $this->Setting_website_model->get_by_id(1);
		$komoditas = $this->Komoditas_model->get_all();

		$fKomoditas = $this->db->get('produk')->result();
		$fSumberData = $this->db->get('dinas')->result();
		$fKelompok = $this->Kelompok_model->get_all();;



		$data = array(
			'kategori_data' => $kategori,
			'setting' => $setting,
			'komoditas_data' => $komoditas,
			'fKomoditas' => $fKomoditas,
			'fSumberData' => $fSumberData,
			'fKelompok' => $fKelompok,
		);
		$this->template->load('template_web', 'web/komoditas', $data);
	}

	public function kategori($id)
	{
		$page = $this->input->get('page') ?? 1;
		$per_page = 6;
		$kategori_data = $this->Kategori_model->get_all();
		$kategori = $this->Kategori_model->get_by_id($id);
		$setting = $this->Setting_website_model->get_by_id(1);
		$informasi = $this->Kategori_model->getInformasi($id, $per_page, $per_page * ($page - 1) );
		$where = [
			'status' => 'publish',
			'kategori_id' => $id
		];

		$data = array(
			'kategori_data' => $kategori_data,
			'kategori' => $kategori,
			'setting' => $setting,
			'page' => $page,
			'per_page' => $per_page,
			'total_halaman' => ceil($this->db->where($where)->get('informasi')->num_rows() / $per_page),
			'informasi' => $informasi
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

	public function count_information_with_kategori()
	{
		$this->load->helper('debug');
		pJson($this->Kategori_model->count_information());
	}

	public function informasi ($id_informasi)
	{
		$this->db->join('kategori', 'kategori.kategori_id = informasi.kategori_id', 'left');
		$this->db->join('user_dinas', 'user_dinas.user_dinas_id = informasi.author', 'left');
		$data['post'] = $this->db->get_where('informasi', ['informasi_id' => $id_informasi, 'status' => 'publish'])->row();
		$data['kategori_data'] = $this->Kategori_model->get_all();
		$data['setting'] = $this->Setting_website_model->get_by_id(1);

		$this->template->load('template_web', 'web/informasi_detail', $data);
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

	public function all_informasi ()
	{
		$data['kategori_data'] = $this->Kategori_model->get_all();
		$data['setting'] = $this->Setting_website_model->get_by_id(1);
		$data['page'] = $this->input->get('page') ?? 1;
		$data['per_page'] = 6;
		$data['informasi'] = $this->Informasi_model->get_all_publish($data['per_page'], false,  $data['per_page'] * ($data['page'] - 1));
		$data['total_halaman'] = ceil($this->db->get('informasi')->num_rows() / $data['per_page']);

		
		$this->template->load('template_web', 'web/all_informasi', $data);
	}
	public function export_komoditas ()
	{
		$this->load->library('excel');
		$komoditas = $this->input->get('komoditas');
		$sumber_data = $this->input->get('sumber_data');
		$kelompok = $this->input->get('kelompok');
		$bulan_tahun = $this->input->get('bulan_tahun');
		$minggu = $this->input->get('minggu');
		$where = [];
		$like = false;

		if (!empty($komoditas)) {
			$where['produk.produk_id'] = $komoditas;
		}

		if (!empty($sumber_data)) {
			$where['user_dinas.dinas_id'] = $sumber_data;
		}

		if (!empty($bulan_tahun)) {
			$where['komoditas.bulan_tahun'] = $bulan_tahun;
		}

		if (!empty($minggu)) {
			$where['komoditas.data_minggu'] = $minggu;
		}

		if (!empty($kelompok)) {
			$like = $kelompok;
		}

		$data = $this->Komoditas_model->get_all($where, $like);
		// $this->load->helper('debug');
		// pJson($data);
		$this->excel->export($data);
		
	}
}