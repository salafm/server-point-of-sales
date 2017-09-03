<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mlogin');
	}
	
	function index(){
		$this->load->view('vlogin');
	}
	
	function aksi_login(){
		$user = $this->input->post('username',true);
		$pass = $this->input->post('password',true);
		$where = array(
			'user' => $user,
			'pass' => $pass
			);
		$cek = $this->mlogin->cek_login("admin",$where)->num_rows();
		$data = $this->mlogin->cek_login("admin",$where)->result_array();
		if($cek > 0){
			$data_session = array(
				'user' => $user,
				'status' => "login",
				'nama' => $data[0]['nama']
				);
			$this->session->set_userdata($data_session);
			redirect(site_url("home"));

		}else{
			$data['login'] = 'gagal';
			$this->load->view('vlogin',$data);
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}