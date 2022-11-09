<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Web extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Kategori_model');
    }

	public function index()
	{
		
		$kategori = $this->Kategori_model->get_all();
        $data = array(
            'kategori_data' => $kategori,
        );
        $this->template->load('template_web','web/home',$data);
	}

}