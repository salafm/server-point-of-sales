<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mdata');

		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		}
	}

	function index(){
		$data['judul'] = 'Database Cabang';
		$data['cabang'] = $this->mdata->tampil_all('cabang')->result();
		$this->load->view('vcabang',$data);
	}

	public function editsimpan()
    {
        If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            echo 'method salah';
        }

        $id = $this->input->post('id',true);
        $isi = $this->input->post('isi',true);
				$kolom =  $this->input->post('kolom',true);
				$table = $this->input->post('tabel',true);

        $fields = array(
                    $kolom => $isi
                  );

        $this->mdata->editsimpan($id,$fields,$table);

        echo "Data berhasil disimpan";

    }

	function simpancabang()
	{
		$nama = $this->input->post('nama',true);
		$user = $this->input->post('user',true);
		$pass = $this->input->post('pass',true);
		$ip = $this->input->post('ip',true);
		$api = $this->input->post('api',true);
		$input = array(
			'nama' => $nama,
			'user' => $user,
			'pass' => $pass,
			'ip' => $ip
		);
		$this->mdata->simpan('cabang',$input);
		$id = $this->mdata->getId($user);
		if($id > 0){
			$input2 = array (
				'user_id' => $id,
				'apikey' => $api,
				'level' => 10,
				'ip_addresses' => $ip
			);
			$this->mdata->simpan('apikeys',$input2);
		}
		echo json_encode(array("status" => TRUE));
	}

	function hapus($id)
	{
		$this->mdata->hapus($id,'cabang');
		echo json_encode(array("status" => TRUE));
	}
}
