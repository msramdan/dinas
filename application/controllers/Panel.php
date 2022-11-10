<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Panel extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('User_dinas_model');
		$this->load->model('Informasi_model');
		$this->load->model('Kategori_model');
		$this->load->model('Komoditas_model');
		$this->load->model('Produk_model');
    }

	public function index()
	{
		is_login_user_dinas();
		$this->template->load('template_user','panel/home');
	}

	
	
	// ================================================ START INFORMASI ======================================================================
	// INFORMASI
	public function informasi()
	{
		is_login_user_dinas();
		$user_dinas_id = $this->fungsi->user_dinas()->user_dinas_id;
		$informasi = $this->Informasi_model->get_where($user_dinas_id);
		$data = array(
			'informasi_data' => $informasi,
		);
		$this->template->load('template_user','panel/informasi',$data);
	}

	public function create_informasi()
	{
		$kategori = $this->Kategori_model->get_all();
		$data = array(
			'button' => 'Create',
			'kategori_data' => $kategori,
			'action' => site_url('panel/create_action_informasi'),
			'informasi_id' => set_value('informasi_id'),
			'judul' => set_value('judul'),
			'kategori_id' => set_value('kategori_id'),
			'deskripsi' => set_value('deskripsi'),
			'author' => set_value('author'),
			'tanggal' => set_value('tanggal'),
			'thumbnail' => set_value('thumbnail'),
			'status' => set_value('status'),
		);
		$this->template->load('template_user', 'panel/informasi_form', $data);
	}

	public function create_action_informasi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create_informasi();
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
				'author' => $this->fungsi->user_dinas()->user_dinas_id,
				'tanggal' => date('Y-m-d H:i:s'),
				'thumbnail' => $thumbnail,
				'status' => 'Draft',
			);

			$this->Informasi_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('panel/informasi'));
		}
	}

	public function update_informasi($id)
	{
		$row = $this->Informasi_model->get_by_id(decrypt_url($id));
		$kategori = $this->Kategori_model->get_all();
		if ($row) {
			$data = array(
				'button' => 'Update',
				'kategori_data' => $kategori,
				'action' => site_url('panel/update_action_informasi'),
				'informasi_id' => set_value('informasi_id', $row->informasi_id),
				'judul' => set_value('judul', $row->judul),
				'kategori_id' => set_value('kategori_id', $row->kategori_id),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'author' => set_value('author', $row->author),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'thumbnail' => set_value('thumbnail', $row->thumbnail),
				'status' => set_value('status', $row->status),
			);
			$this->template->load('template_user', 'panel/informasi_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('panel/informasi'));
		}
	}

	public function update_action_informasi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update_informasi(encrypt_url($this->input->post('informasi_id')));
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
			redirect(site_url('panel/informasi'));
		}
	}

	public function delete_informasi($id)
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
			redirect(site_url('panel/informasi'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('panel/informasi'));
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

	// ================================================ END INFORMASI =======================================================================

	// ================================================ START KOMODITAS =====================================================================
	public function komoditas()
	{
		is_login_user_dinas();
		$komoditas = $this->Komoditas_model->get_all();
        $data = array(
            'komoditas_data' => $komoditas,
        );
		$this->template->load('template_user','panel/komoditas',$data);
	}

    public function create_komoditas() 
    {
		$produk = $this->Produk_model->get_all();
        $data = array(
            'button' => 'Create',
			'produk_data' => $produk,
            'action' => site_url('panel/create_action_komoditas'),
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
        $this->template->load('template_user','panel/komoditas_form', $data);
    }
    
    public function create_action_komoditas() 
    {
        $this->_rules_komoditas();

        if ($this->form_validation->run() == FALSE) {
            $this->create_komoditas();
        } else {
            $data = array(
			'tgl_update' => $this->input->post('tgl_update',TRUE),
			'produk_id' => $this->input->post('produk_id',TRUE),
			'user_dinas_id' => $this->fungsi->user_dinas()->user_dinas_id,
			'stok' => $this->input->post('stok',TRUE),
			'rencana_produksi' => $this->input->post('rencana_produksi',TRUE),
			'ketahanan_bulanan' => $this->input->post('ketahanan_bulanan',TRUE),
			'jml_produksi_minggu' => $this->input->post('jml_produksi_minggu',TRUE),
			'data_minggu' => $this->input->post('data_minggu',TRUE),
			'bulan_tahun' => $this->input->post('bulan_tahun',TRUE),
			'harga_dari_produsen' => $this->input->post('harga_dari_produsen',TRUE),
			);

            $this->Komoditas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('panel/komoditas'));
        }
    }
    
    public function update_komoditas($id) 
    {
        $row = $this->Komoditas_model->get_by_id(decrypt_url($id));

        if ($row) {
			$produk = $this->Produk_model->get_all();
            $data = array(
                'button' => 'Update',
				'produk_data' => $produk,
                'action' => site_url('panel/update_action_komoditas'),
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
            $this->template->load('template_user','komoditas/komoditas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panel/komoditas'));
        }
    }
    
    public function update_action_komoditas() 
    {
        $this->_rules_komoditas();

        if ($this->form_validation->run() == FALSE) {
            $this->update_komoditas($this->input->post('komoditas_id', TRUE));
        } else {
            $data = array(
			'tgl_update' => $this->input->post('tgl_update',TRUE),
			'produk_id' => $this->input->post('produk_id',TRUE),
			'stok' => $this->input->post('stok',TRUE),
			'rencana_produksi' => $this->input->post('rencana_produksi',TRUE),
			'ketahanan_bulanan' => $this->input->post('ketahanan_bulanan',TRUE),
			'jml_produksi_minggu' => $this->input->post('jml_produksi_minggu',TRUE),
			'data_minggu' => $this->input->post('data_minggu',TRUE),
			'bulan_tahun' => $this->input->post('bulan_tahun',TRUE),
			'harga_dari_produsen' => $this->input->post('harga_dari_produsen',TRUE),
			);

            $this->Komoditas_model->update($this->input->post('komoditas_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('panel/komoditas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komoditas_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Komoditas_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('panel/komoditas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panel/komoditas'));
        }
    }

	public function update_harga(){
		$id = $this->input->post('komoditas_id_modal');
		$data = array(
				'harga_pedagang' => $this->input->post('harga_pedagang'),
				'user_validasi_harga' =>$this->fungsi->user_dinas()->user_dinas_id
		);
		$this->db->where('komoditas_id', $id);
		$this->db->update('komoditas', $data);
		$this->session->set_flashdata('message', 'Update harga pedagangan berhasil');
        redirect(site_url('panel/komoditas'));
	}

    public function _rules_komoditas() 
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


	// ================================================ END KOMODITAS =======================================================================




	// ================================================ START AUTH ==========================================================================
	public function login()
	{
		check_already_login_user_dinas();
		$this->load->view('login_user');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->User_dinas_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'user_dinas_id' => $row->user_dinas_id,
				);
				$this->session->set_userdata($params);				
				echo "<script>window.location='" . site_url('panel') . "'</script>";
			} else {
				$this->session->set_flashdata('gagal', 'Login gagal, username atau password salah');
				redirect(site_url('panel_user'));
			}
		}
	}

	public function logout()
	{
		is_login_user_dinas();
		$params = array('user_dinas_id');
		$this->session->unset_userdata($params);
		redirect('panel_user');
	}

	public function ganti_password($id)
	{
		$data = array(
			'password' => sha1($this->input->post('password')),
		);
		$this->User_dinas_model->update($id, $data);

		// unset session login
		$params = array('user_dinas_id');
		$this->session->unset_userdata($params);
		echo "<script>
        alert('Update password berhasil, Silahkan login kembali !');
        window.location='".site_url('panel_user')."'</script>";

	}
	// ================================================== END AUTH ===========================================================================

	

}