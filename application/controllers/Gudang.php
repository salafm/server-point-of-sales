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
    $data['judul'] = 'Waroenkpos | Database Barang Gudang';
    $this->load->view('vgudang',$data);
  }

  function updatestok()
  {
    $this->db->trans_begin();
    $idtrx = $this->db->query('SELECT MAX(id) as id FROM barangmasuk');
		if($idtrx->num_rows()>0){
			$idtrx = $idtrx->result();
			$ids = $idtrx[0]->id+1;
			if(strlen((string)$ids) == 1){
				$ids = '000'.$ids;
			}elseif (strlen((string)$ids) == 2) {
				$ids = '00'.$ids;
			}elseif (strlen((string)$ids) == 3) {
				$ids ='0'.$ids;
			}else{
				$ids = $ids;
			}
		}else{
			$ids = '0001';
		}
		$idtrans = 'in'.date('md').$ids;
    $desk = $this->input->post('desk',true);
    $idbarang = $this->input->post('pil',true);
    $nama = $this->input->post('nama',true);
    $harga = $this->input->post('harga',true);
    $jml = $this->input->post('jml',true);
    $satuan = $this->input->post('satuan',true);
    $n = sizeof($idbarang);
    for ($i = 0; $i < $n; $i++){
      $where = array('idbarang' => $idbarang[$i], 'nama' => $nama[$i]);
      $cek = $this->mdata->tampil_where('barang', $where)->num_rows();
      if($cek>0){
        $update = array(
          'harga' => $harga[$i]
        );
        $this->mdata->update($where,$update,'barang');
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
          'stok' => 0,
          'satuan' => $satuan[$i]
        );
        $this->mdata->simpan('barang',$input);
        $input3 = array(
          'idbarang' => $idbarang[$i],
          'harga' => $harga[$i],
          'idtransaksi' => $idtrans,
          'jumlah' => $jml[$i],
          'satuan' => $satuan[$i]
        );
        $this->mdata->simpan('barangmasuk_details',$input3);
      }
    }

    $input2 = array('idtransaksi' => $idtrans, 'deskripsi' => $desk);
    $this->mdata->simpan('barangmasuk',$input2);
    if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}
    echo json_encode(array("status" => TRUE));
  }

  function simpanproduk(){
    $this->db->trans_begin();
    $idproduk = $this->input->post('idproduk',true);
    $idbarang = $this->input->post('pil',true);
    $kategori = $this->input->post('kategori',true);
    $nama = $this->input->post('nama',true);
    $jml = $this->input->post('jml',true);
    
    $n = sizeof($idbarang);
    $total = 0;
    for ($i = 0; $i < $n; $i++){
      $hasil = $this->mdata->harga($idbarang[$i])->result();
      $total = $total + ($hasil[0]->harga * $jml[$i]);
    }
    $input2 = array('idproduk' => $idproduk, 'nama' => $nama, 'kategori' => $kategori, 'harga' => $total);
    $this->mdata->simpan('produk',$input2);
    for ($i = 0; $i < $n; $i++){
      $input = array(
        'idbarang' => $idbarang[$i],
        'idproduk' => $idproduk,
        'jumlah' => $jml[$i]
      );
      $this->mdata->simpan('produk_details',$input);
    }

    if ($this->db->trans_status() === FALSE)
    {
            $this->db->trans_rollback();
    }
    else
    {
            $this->db->trans_commit();
    }
    echo json_encode(array("status" => TRUE));
  }

  function satuanbarang($id)
  {
    $where = array('idbarang' => $id);
    $data = $this->mdata->tampil_where('barang', $where)->result();
    echo '<input name="satuan[]" id="" value="'.$data[0]->satuan.'" class="form-control satuan" type="text" title="Minimal 3 karakter, maksimal 15 karakter. Karakter spesial diperbolehkan" pattern="^.{3,15}$" readOnly minlength="3" maxlength="15" autocomplete="off" required>';
  }

  function search(){
    $cari = $this->input->post('nama',true);
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

  function detailbarangmasuk($id)
  {
    $hasil = $this->mdata->tampil_join1('barangmasuk_details',$id)->result();
    $output ='';
    $total = 0;
    foreach ($hasil as $h) {
      $output .= '<tr><td>'.$h->nama.'</td>';
      $output .= '<td> Rp.'.$h->harga.'</td>';
      $output .= '<td>'.$h->jumlah.'</td>';
      $output .= '<td>'.$h->satuan.'</td>';
      $output .= '<td> Rp.'.$h->harga*$h->jumlah.'</td></tr>';
      $total = $total + $h->harga*$h->jumlah;
    }
    $output .= '<tr><td colspan="4" style="text-align:center"> Total Pembelian</td><td>Rp.'.$total .'</td></tr>';
    echo $output;
  }

  function detailbarangkeluar($id)
  {
    $hasil = $this->mdata->tampil_join2('barangkeluar_details',$id)->result();
    $output ='';
    $total = 0;
    foreach ($hasil as $h) {
      $barang = $this->mdata->tampil_join3('produk_details',$h->idproduk)->result();
      $n = sizeof($barang);
      $c = 0;
      foreach ($barang as $b) {
        if ($c==0){
          $output .= '<tr id="'.$h->idproduk.'"><td rowspan="'.$n.'">'.$h->nama.'</td>';
          $output .= '<td rowspan="'.$n.'">'.$h->jumlah.'</td>';
          $output .= '<td rowspan="'.$n.'"> Rp.'.$h->harga.'</td>';
          $output .= '<td>'.$b->nama.'</td>';
          $output .= '<td>'.$h->jumlah*$b->jumlah.'</td>';
          $output .= '<td>'.$b->satuan.'</td></tr>';
        }
        else {
          $output .= '<tr>';
          $output .= '<td>'.$b->nama.'</td>';
          $output .= '<td>'.$h->jumlah*$b->jumlah.'</td>';
          $output .= '<td>'.$b->satuan.'</td></tr>';
        }
        $c++;
      }
    }
    echo $output;
  }

  function detailproduk($id)
  {
    $hasil = $this->mdata->tampil_join3('produk_details',$id)->result();
    $output ='';
    $total = 0;
    foreach ($hasil as $h) {
      $output .= '<tr><td>'.$h->nama.'</td>';
      $output .= '<td> Rp.'.$h->harga.'</td>';
      $output .= '<td>'.$h->jumlah.'</td>';
      $output .= '<td>'.$h->satuan.'</td>';
      $output .= '<td> Rp.'.$h->harga*$h->jumlah.'</td></tr>';
      $total = $total + $h->harga*$h->jumlah;
    }
    $output .= '<tr><td colspan="4" style="text-align:center"> Harga Produk</td><td>Rp.'.$total .'</td></tr>';
    echo $output;
  }


  function updateharga($id)
  {
    $this->db->trans_begin();
    $produk = $this->mdata->tampil_where('produk_details',array('idbarang' => $id))->result();
    foreach ($produk as $p) {
      $total = 0;
      $hasil = $this->mdata->tampil_join3('produk_details',$p->idproduk)->result();
      foreach ($hasil as $h) {
        $total = $total + ($h->jumlah*$h->harga);
      }
      $this->mdata->update(array('idproduk' => $p->idproduk ), array('harga' => $total),'produk');
      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
      }
      else
      {
              $this->db->trans_commit();
      }
    }
  }

  public function editsimpan()
  {
        If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            echo 'method salah';
        }
				$this->db->trans_begin();
        $id = $this->input->post('id',true);
        $isi = $this->input->post('isi',true);
				$kolom =  $this->input->post('kolom',true);
				$table = $this->input->post('tabel',true);
				$idcabang = $this->input->post('idcabang',true);
				$kolomwhere = $this->input->post('where',true);

        $fields = array(
          $kolom => $isi
        );
				$where = array(
					$kolomwhere => $id
				);

        $this->mdata->editsimpan($where,$fields,$table);
        if($table== 'barang' && $kolom == 'harga'){
          $this->updateharga($id);
        }
				if ($this->db->trans_status() === FALSE)
				{
								$this->db->trans_rollback();
				}
				else
				{
								$this->db->trans_commit();
				}
        echo "Data berhasil disimpan";
  }

  function hapus($id)
	{
		$this->db->trans_begin();
		$table = $this->input->post('tabel',true);
		$this->mdata->hapus(array('id' => $id),$table);
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE));
	}
}
