<?php
date_default_timezone_set('Asia/Jakarta');

class Laporan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
		$this->template->load('template', 'laporan/index');
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data = array(

		);
		$this->load->view('laporan/pdf', $data);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan.pdf", array('Attachment' => 0));
	}
}
