<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Gudang extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
		$this->load->model('mdata');

		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
    }
  }

  function index()
  {
		$data['barang'] = $this->mdata->tampil_all('barang')->result();
    $data['barangmasuk'] = $this->mdata->tampil_all('barangmasuk')->result();
    $data['barangkeluar'] = $this->mdata->tampil_all('barangkeluar')->result();
    $data['produk'] = $this->mdata->tampil_all('produk')->result();
    $data['judul'] = 'Database Gudang';
    $this->load->view('vgudang',$data);
  }

  function simpanbarang()
	{
		$idbarang = $this->input->post('idbarang',true);
		$nama = $this->input->post('nama',true);
		$harga = $this->input->post('harga',true);
		$stok = $this->input->post('stok',true);
		$satuan = $this->input->post('satuan',true);
		$input = array(
			'idbarang' => $idbarang,
			'nama' => $nama,
			'harga' => $harga,
			'stok' => $stok,
			'satuan' => $satuan
		);
		$this->mdata->simpan('barang',$input);
		echo json_encode(array("status" => TRUE));
	}

  function updatestok()
  {
    $idtrans = $this->input->post('idtrans',true);
    $idbarang = $this->input->post('pil',true);
    $nama = $this->input->post('nama',true);
    $harga = $this->input->post('harga',true);
    $jml = $this->input->post('jml',true);
    $satuan = $this->input->post('satuan',true);
    $n = sizeof($idbarang);
    for ($i = 0; $i < $n; $i++){
      $where = array('idbarang' => $idbarang[$i]);
      $cek = $this->mdata->tampil_where('barang', $where)->num_rows();
      if($cek>0){
        $input = array(
          'idbarang' => $idbarang[$i],
          'harga' => $harga[$i],
          'idtransaksi' => $idtrans,
          'jumlah' => $jml[$i],
          'satuan' => $satuan[$i]
        );
        $this->mdata->simpan('barangmasuk_details',$input);
      }
      else {
        $input = array(
          'idbarang' => $idbarang[$i],
          'nama' => $nama[$i],
          'harga' => $harga[$i],
          'stok' => $jml[$i],
          'satuan' => $satuan[$i]
        );
        $this->mdata->simpan('barang',$input);
      }
    }

    $input2 = array('idtransaksi' => $idtrans );
    $this->mdata->simpan('barangmasuk',$input2);
    echo json_encode(array("status" => TRUE));
  }

  function simpanproduk(){
    $idproduk = $this->input->post('idproduk',true);
    $idbarang = $this->input->post('pil',true);
    $nama = $this->input->post('nama',true);
    $jml = $this->input->post('jml',true);
    $n = sizeof($idbarang);
    for ($i = 0; $i < $n; $i++){
      $input = array(
        'idbarang' => $idbarang[$i],
        'idproduk' => $idproduk,
        'jumlah' => $jml[$i]
      );
      $this->mdata->simpan('produk_details',$input);
    }

    $input2 = array('idproduk' => $idproduk, 'nama' => $nama);
    $this->mdata->simpan('produk',$input2);
    echo json_encode(array("status" => TRUE));
  }

  function satuanbarang($id)
  {
    $where = array('idbarang' => $id);
    $data = $this->mdata->tampil_where('barang', $where)->result();
    echo '<input name="satuan[]" id="" value="'.$data[0]->satuan.'" class="form-control satuan" type="text" readOnly>';
  }

  function search($cari){
    $hasil = $this->mdata->search($cari)->result();
    $cek = $this->mdata->search($cari)->num_rows();
    $output = '<ul class="list-unstyled" id="pilihanbarang">';
    if ($cek > 0){
      foreach ($hasil as $h) {
        $output .= '<li id="'.$h->idbarang.'" class="list-group-item">'.$h->nama.'</li>';
      }
    }
    else {
      $output .= '<li class="list-group-item" name="baru" id="'.$cari.'">Tambah barang baru "'.$cari.'"</li>';
    }
    $output .= '</ul>';
    echo $output;
  }
}