<?php
date_default_timezone_set('Asia/Jakarta');

class Penilaian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
		$this->template->load('template', 'penilaian/index');
	}

	public function step()
	{
		$this->template->load('template', 'penilaian/step');
	}

	public function addPenilaian()
	{
		$kategori_id  = $_POST['kategori_id'];
		$priode       = $_POST['priode'];
		$nilai       = $_POST['nilai'];
		$karyawan_id       = $_POST['karyawan_id'];
		$user_id = $this->fungsi->user_login()->user_id;

		$jumlah_data = count($nilai);
		for ($i = 0; $i < $jumlah_data; $i++) {
			$k = $karyawan_id[$i];
			$n = $nilai[$i];
			// cek sudah ada data atw blm
			$jmlPenialaian = $this->db->query("SELECT * FROM nilai where priode='$priode' and kategori_id='$kategori_id' and karyawan_id='$k'");
			$jml = $jmlPenialaian->num_rows();

			if ($jml > 0) {
				$this->db->query("UPDATE nilai SET nilai =$n,penilai_id=$user_id where priode='$priode' and kategori_id='$kategori_id' and karyawan_id='$k' ");
			} else {
				$data = array(
					'priode'	=> $priode,
					'kategori_id' => $kategori_id,
					'karyawan_id' => $k,
					'nilai'	=> $n,
					'penilai_id' => $user_id
				);
				$this->db->insert('nilai', $data);
			}
		}
		// last id
		$cek = $this->db->query('SELECT * FROM kategori  ORDER BY kategori_id DESC LIMIT 1')->row();
		$lastID = $cek->kategori_id;
		if ($lastID == $kategori_id) {
			$this->session->set_flashdata('message', 'Proses Penilaian Telah Selesai');
			redirect(site_url('penilaian'));
		} else {
			$base = "penilaian/step?p=$priode&k=$kategori_id";
			$this->session->set_flashdata('message', 'Penilaian Tersimpan');
			redirect(site_url($base));
		}
	}
}
