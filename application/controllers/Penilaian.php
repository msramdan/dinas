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
			$this->template->load('template','penilaian/index');
		}

		public function step()
		{	
			$this->template->load('template','penilaian/step');
		}
	}
