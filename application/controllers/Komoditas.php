<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komoditas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Komoditas_model');
		$this->load->model('Produk_model');
		$this->load->model('Kelompok_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $komoditas = $this->Komoditas_model->get_all();
        $data = array(
            'komoditas_data' => $komoditas,
        );
        $this->template->load('template','komoditas/komoditas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Komoditas_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'komoditas_id' => $row->komoditas_id,
		'tgl_update' => $row->tgl_update,
		'produk_id' => $row->produk_id,
		'user_dinas_id' => $row->user_dinas_id,
		'stok' => $row->stok,
		'rencana_produksi' => $row->rencana_produksi,
		'ketahanan_bulanan' => $row->ketahanan_bulanan,
		'data_minggu' => $row->data_minggu,
		'harga_dari_produsen' => $row->harga_dari_produsen,
		'harga_pedagang' => $row->harga_pedagang,
		'user_validasi_harga' => $row->user_validasi_harga,
	    );
            $this->template->load('template','komoditas/komoditas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komoditas'));
        }
    }

    public function create() 
    {
		$produk = $this->Produk_model->get_all();
		$kelompok = $this->Kelompok_model->get_all();
        $data = array(
            'button' => 'Create',
			'produk_data' => $produk,
			'kelompok' => $kelompok,
            'action' => site_url('komoditas/create_action'),
			'komoditas_id' => set_value('komoditas_id'),
			'tgl_update' => set_value('tgl_update'),
			'produk_id' => set_value('produk_id'),
			'user_dinas_id' => set_value('user_dinas_id'),
			'stok' => set_value('stok'),
			'rencana_produksi' => set_value('rencana_produksi'),
			'ketahanan_bulanan' => set_value('ketahanan_bulanan'),
			'jml_produksi_minggu' => set_value('jml_produksi_minggu'),
			'data_minggu' => set_value('data_minggu'),
			'bulan_tahun' => set_value('bulan_tahun'),
			'harga_dari_produsen' => set_value('harga_dari_produsen'),
			'harga_pedagang' => set_value('harga_pedagang'),
			'user_validasi_harga' => set_value('user_validasi_harga'),

			
		);
        $this->template->load('template','komoditas/komoditas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'tgl_update' => $this->input->post('tgl_update',TRUE),
			'produk_id' => $this->input->post('produk_id',TRUE),
			'user_dinas_id' => $this->fungsi->user_login()->user_id,
			'stok' => $this->input->post('stok',TRUE),
			'rencana_produksi' => $this->input->post('rencana_produksi',TRUE),
			'ketahanan_bulanan' => $this->input->post('ketahanan_bulanan',TRUE),
			'jml_produksi_minggu' => $this->input->post('jml_produksi_minggu',TRUE),
			'data_minggu' => $this->input->post('data_minggu',TRUE),
			'bulan_tahun' => $this->input->post('bulan_tahun',TRUE),
			'harga_dari_produsen' => $this->input->post('harga_dari_produsen',TRUE),
			'harga_pedagang' => '',
			'user_validasi_harga' => '',
			);

            $this->Komoditas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('komoditas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Komoditas_model->get_by_id(decrypt_url($id));

        if ($row) {
			$produk = $this->Produk_model->get_all();
			$kelompok = $this->Kelompok_model->get_all();
            $data = array(
                'button' => 'Update',
				'produk_data' => $produk,
				'kelompok' => $kelompok,
                'action' => site_url('komoditas/update_action'),
				'komoditas_id' => set_value('komoditas_id', $row->komoditas_id),
				'tgl_update' => set_value('tgl_update', $row->tgl_update),
				'produk_id' => set_value('produk_id', $row->produk_id),
				'user_dinas_id' => set_value('user_dinas_id', $row->user_dinas_id),
				'stok' => set_value('stok', $row->stok),
				'rencana_produksi' => set_value('rencana_produksi', $row->rencana_produksi),
				'ketahanan_bulanan' => set_value('ketahanan_bulanan', $row->ketahanan_bulanan),
				'data_minggu' => set_value('data_minggu', $row->data_minggu),
				'bulan_tahun' => set_value('bulan_tahun', $row->bulan_tahun),
				'jml_produksi_minggu' => set_value('jml_produksi_minggu', $row->jml_produksi_minggu),
				'harga_dari_produsen' => set_value('harga_dari_produsen', $row->harga_dari_produsen),
				'harga_pedagang' => set_value('harga_pedagang', $row->harga_pedagang),
				'user_validasi_harga' => set_value('user_validasi_harga', $row->user_validasi_harga),
				);
            $this->template->load('template','komoditas/komoditas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komoditas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('komoditas_id', TRUE));
        } else {
            $data = array(
			'tgl_update' => $this->input->post('tgl_update',TRUE),
			'produk_id' => $this->input->post('produk_id',TRUE),
			'stok' => $this->input->post('stok',TRUE),
			'rencana_produksi' => $this->input->post('rencana_produksi',TRUE),
			'ketahanan_bulanan' => $this->input->post('ketahanan_bulanan',TRUE),
			'data_minggu' => $this->input->post('data_minggu',TRUE),
			'bulan_tahun' => $this->input->post('bulan_tahun',TRUE),
			'jml_produksi_minggu' => $this->input->post('jml_produksi_minggu',TRUE),
			'harga_dari_produsen' => $this->input->post('harga_dari_produsen',TRUE),
			);

            $this->Komoditas_model->update($this->input->post('komoditas_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('komoditas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komoditas_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Komoditas_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komoditas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komoditas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');
	$this->form_validation->set_rules('produk_id', 'produk id', 'trim|required');
	// $this->form_validation->set_rules('user_dinas_id', 'user dinas id', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('rencana_produksi', 'rencana produksi', 'trim|required');
	$this->form_validation->set_rules('ketahanan_bulanan', 'ketahanan bulanan', 'trim|required');
	$this->form_validation->set_rules('data_minggu', 'data minggu', 'trim|required');
	$this->form_validation->set_rules('bulan_tahun', 'Bulan Tahun', 'trim|required');
	$this->form_validation->set_rules('jml_produksi_minggu', 'jml produksi minggu', 'trim|required');
	$this->form_validation->set_rules('harga_dari_produsen', 'harga dari produsen', 'trim|required');
	// $this->form_validation->set_rules('harga_pedagang', 'harga pedagang', 'trim|required');
	// $this->form_validation->set_rules('user_validasi_harga', 'user validasi harga', 'trim|required');

	$this->form_validation->set_rules('komoditas_id', 'komoditas_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Komoditas.php */
/* Location: ./application/controllers/Komoditas.php */
/* Please DO NOT modify this information : */