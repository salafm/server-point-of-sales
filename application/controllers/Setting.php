<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('msetting');

		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		}
	}

	function index(){
		$data['judul'] = 'Waroenkpos | Pengaturan';
		$data['admins'] = $this->msetting->tampil()->result();
		$this->load->view('vsetting',$data);
	}

	function email($id){
		$password = $this->input->post('password',true);
		$email = $this->input->post('email2',true);
		$where = array(
			'id' => $id
		);
		$edit = array(
			'email' => $email
		);
		$data = $this->msetting->tampilAdmin($where)->result_array();
		$cekpass = $data[0]['pass'];
		if($password == $cekpass){
			$this->msetting->edit($id,$edit);
			$data['status'] = 'sukses';
		}else{
			$data['status'] = 'gagal';
		}
		$data['judul'] = 'Waroenkpos | Pengaturan';
		$data['admins'] = $this->msetting->tampil()->result();
		$this->load->view('vsetting',$data);
	}

	function password($id){
		$password = $this->input->post('pass',true);
		$pass = $this->input->post('pass2',true);
		$where = array(
			'id' => $id
		);
		$edit = array(
			'pass' => $pass
		);
		$data = $this->msetting->tampilAdmin($where)->result_array();
		$cekpass = $data[0]['pass'];
		if($password == $cekpass){
			$this->msetting->edit($id,$edit);
			$data['status1'] = 'sukses';
		}else{
			$data['status1'] = 'gagal';
		}
		$data['judul'] = 'Waroenkpos | Pengaturan';
		$data['admins'] = $this->msetting->tampil()->result();
		$this->load->view('vsetting',$data);
	}
}
