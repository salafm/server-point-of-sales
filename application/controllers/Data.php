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
	
	function tampil($id){
		$where = array('idcabang' => $id);
		$data = $this->mdata->tampil_barang('barang', $where)->result();
		$no = 1;
		foreach($data as $d){
		echo '<tr id="'.$d->id.'"><td>'.$no++.'</td>
		  <td>'.$d->idbarang.'</td>
		  <td title="Double click to Edit and press Enter to Save" class="edit" id="nama">'.$d->nama.'</td>
		  <td title="Double click to Edit and press Enter to Save" class="edit" id="harga">'.$d->harga.'</td>
		  <td title="Double click to Edit and press Enter to Save" class="edit" id="stok">'.$d->stok.'</td>
		  <td title="Double click to Edit and press Enter to Save" class="edit" id="satuan">'.$d->satuan.'</td>
		  <td><button class="btn btn-danger btn-xs" onclick="hapus('.$d->id.')"><i class="fa fa-remove"></i></button></td></tr>';
		}
	}
	
	function simpanbarang($id)
	{
		$idbarang = $this->input->post('idbarang',true);
		$nama = $this->input->post('nama',true);
		$harga = $this->input->post('harga',true);
		$stok = $this->input->post('stok',true);
		$satuan = $this->input->post('satuan',true);
		$input = array(
			'idbarang' => $idbarang,
			'idcabang' => $id,
			'nama' => $nama,
			'harga' => $harga,
			'stok' => $stok,
			'satuan' => $satuan
		);
		
		$this->mdata->simpan('barang',$input);
		echo json_encode(array("status" => TRUE));
	}
	
	function hapus($id)
	{
		$this->mdata->hapus($id,'barang');
		echo json_encode(array("status" => TRUE));
	}
}