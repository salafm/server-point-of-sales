<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		}
	}
	
	function index(){
		$data = array('judul' => 'Restopos | Dashboard');
		$this->load->view('vhome',$data);
	}
}