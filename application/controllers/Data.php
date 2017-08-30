<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mdata');
		
		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		}
	}
	
	function index(){
		$data['judul'] = 'Restopos | Database Barang';
		$data['cabang'] = $this->mdata->tampil_cabang()->result();
		$this->load->view('vdata',$data);
	}
	
	function tampilbarang(id){
	
	}
}