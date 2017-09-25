<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mdata');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		}
	}

	function index(){
		$data = array('judul' => 'Waroenkpos | Dashboard');
		$this->load->view('vhome',$data);
	}

	function reset(){
		$this->mdata->deleteall('produkclient');
		$this->mdata->deleteall('produkclient_details');
		$this->mdata->deleteall('barangclient');
		$this->mdata->deleteall('barangkeluar');
		$this->mdata->deleteall('barangkeluar_details');
		redirect(site_url('data'));
	}
}
