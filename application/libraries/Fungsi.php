<?php
class Fungsi
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function user_login()
	{
		$this->ci->load->model('User_model');
		$user_id = $this->ci->session->userdata('userid');
		$user_data = $this->ci->User_model->get($user_id)->row();
		return $user_data;
	}

	public function user_dinas()
	{
		$this->ci->load->model('User_dinas_model');
		$user_id = $this->ci->session->userdata('user_dinas_id');
		$user_data = $this->ci->User_dinas_model->get($user_id)->row();
		return $user_data;
	}

	
}
