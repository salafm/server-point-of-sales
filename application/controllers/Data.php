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
		$data['produk'] = $this->mdata->tampil_all('produk')->result();
		$data['cabang'] = $this->mdata->tampil_all('cabang')->result();
		$this->load->view('vdata',$data);
	}

	function tampil($id){
		$where = array('idcabang' => $id);
		$data = $this->mdata->tampil_where('barang', $where)->result();
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
		$idtrans = $this->input->post('idtrans',true);
		$idproduk = $this->input->post('pil',true);
		$jml = $this->input->post('jml',true);
		$n = sizeof($idproduk);
    for ($i = 0; $i < $n; $i++){
      $input = array(
				'idtransaksi' => $idtrans,
        'idproduk' => $idproduk[$i],
        'jumlah' => $jml[$i]
      );
      $this->mdata->simpan('barangkeluar_details',$input);
    }

		$input2 = array(
			'idtransaksi' => $idtrans,
			'idcabang' => $id
		);
		$this->mdata->simpan('barangkeluar',$input2);
		echo json_encode(array("status" => TRUE));
	}

	function hapus($id)
	{
		$this->mdata->hapus($id,'barang');
		echo json_encode(array("status" => TRUE));
	}
}
