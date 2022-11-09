<?php
date_default_timezone_set('Asia/Jayapura');

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

function check_already_login_user_dinas()
{
	$ci = &get_instance();
	$user_session_dinas = $ci->session->userdata('user_dinas_id');
	if ($user_session_dinas) {
		redirect('panel');
	}
}

function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function is_login_user_dinas()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('user_dinas_id');
	if (!$user_session) {
		redirect('panel_user');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		redirect('dashboard_user');
	}
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
