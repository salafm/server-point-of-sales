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
		$data['judul'] = 'Waroenkpos | Database Barang Cabang';
		$data['barang'] = $this->mdata->tampil_all('barang')->result();
		$data['cabang'] = $this->mdata->tampil_all('cabang')->result();
		$this->load->view('vdata',$data);
	}

	function tampilbarang($id){
		$where = array('idcabang' => $id);
		$data = $this->mdata->tampil_where('barangclient', $where)->result();
		$no = 1;
		foreach($data as $d){
		echo '<tr id="'.$d->id.'" name="barangclient"><td>'.$no++.'</td>
		  <td title="Kolom ini tidak bisa diedit" class="idbarang" id="idbarang">'.$d->idbarang.'</td>
		  <td title="Double click untuk edit and tekan Enter untuk menyimpan" class="edit nama" id="nama">'.$d->nama.'</td>
		  <td title="Double click untuk edit and tekan Enter untuk menyimpan" class="edit harga" id="harga"> Rp. '.$d->harga.'</td>
		  <td title="Kolom ini tidak bisa diedit" class="stok" id="">'.$d->stok.'</td>
		  <td title="Kolom ini tidak bisa diedit" class="satuan" id="">'.$d->satuan.'</td>
		  <td><button class="btn btn-default btn-sm setting" ><i class="fa fa-cogs"></i> Pengaturan</button></td>
		  <td><button class="btn btn-danger btn-xs hapus" name="'.$d->id.'"><i class="fa fa-remove"></i></button></td></tr>';
		}
	}

	function tampilproduk($id){
		$where = array('idcabang' => $id);
		$data = $this->mdata->tampil_where('produkclient', $where)->result();
		$no = 1;
		foreach($data as $da){
		echo '<tr id="'.$da->idproduk.'" name="produkclient"><td>'.$no++.'</td>
		  <td title="Kolom ini tidak bisa diedit" class="idbarang" id="idproduk">'.$da->idproduk.'</td>
		  <td title="Double click untuk edit and tekan Enter untuk menyimpant" class="edit nama" id="nama">'.$da->nama.'</td>
		  <td title="Double click untuk edit and tekan Enter untuk menyimpan" class="edit" id="harga"> Rp. '.$da->harga.'</td>
		  <td title="Kolom ini tidak bisa diedit" class="" id="stok">'.$da->stok.'</td>
			<td><button class="btn btn-default btn-sm details" id=""><i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
		  <td><button class="btn btn-danger btn-xs hapus" name="'.$da->id.'"><i class="fa fa-remove"></i></button></td></tr>';
		}
	}

	function simpanbarang()
	{
		$this->db->trans_begin();
		$id = $this->input->post('idcabang',true);
		$idtrx = $this->db->query('SELECT MAX(id) as id FROM barangkeluar');
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
		$idtrans = 'out'.$id.$ids;
		$idbarang = $this->input->post('pil',true);
		$harga = $this->input->post('harga',true);
		$satuan = $this->input->post('satuan',true);
		$desk = $this->input->post('desk',true);
		$jml = $this->input->post('jml',true);
		$n = sizeof($idbarang);
    for ($i = 0; $i < $n; $i++){
			//input barangkeluar_details
      $input = array(
				'idtransaksi' => $idtrans,
				'idbarang' => $idbarang[$i],
        'jumlah' => $jml[$i],
				'harga' => $harga[$i],
				'satuan' => $satuan[$i]
      );
      $this->mdata->simpan('barangkeluar_details',$input); //simpan barangkeluar_details

			//cek apakah sudah ada barang di barangclient
			$where3 = array('idbarang' => $idbarang[$i], 'idcabang' => $id);
			$barang = $this->mdata->tampil_where('barang',array('idbarang' => $idbarang[$i]))->result();
			$cekbarang = $this->mdata->tampil_where('barangclient',$where3)->num_rows();
			if($cekbarang == 0){
				foreach ($barang as $b) {
					$inputbarang = array(
						'idcabang' => $id,
						'idbarang' => $b->idbarang,
						'nama' => $b->nama,
						'harga' => $b->harga,
						'satuan' => $b->satuan
					);
					$this->mdata->simpan('barangclient',$inputbarang);
				}
			}
    }

		$hasil = $this->mdata->namacabang($id)->result();
		$input2 = array(
			'idtransaksi' => $idtrans,
			'idcabang' => $id,
			'nama' => $hasil[0]->nama,
			'deskripsi' => $desk
		);
		$this->mdata->simpan('barangkeluar',$input2);
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE, 'pesan' => 'Berhasil mengirim barang'));
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

	function detailproduk()
  {
		$idproduk = $this->input->get('idproduk',true);
		$idcabang = $this->input->get('idcabang',true);
    $hasil = $this->mdata->tampil_join4('produkclient_details',$idproduk,$idcabang)->result();
    $output ='';
    foreach ($hasil as $h) {
      $output .= '<tr><td>'.$h->nama.'</td>';
      $output .= '<td>'.$h->jumlah.'</td>';
      $output .= '<td>'.$h->satuan.'</td>';
      $output .= '</tr>';
    }
		$output .= '<tr><td colspan="3"><button class="btn btn-sm btn-default pull-right komposisi"><i class="fa fa-pencil-square-o"></i>&nbsp; Edit Komposisi</button></td></tr>';
    echo $output;
  }

	function konversi()
	{
		$this->db->trans_begin();
		$id = $this->input->post('idcabang',true);
		$idbarang =  $this->input->post('idbarang',true);
		$stok = $this->input->post('stok',true);
		$jml = $this->input->post('jml',true);
		$satuan = $this->input->post('satuan',true);
		$harga = $this->input->post('harga',true);
		$jumlah = $stok*$jml;
		$harga = $harga/$jml;
		$where = array('idcabang' => $id, 'idbarang' => $idbarang );
		$update = array('stok' => $jumlah, 'satuan' => $satuan, 'harga' => $harga, 'flag' => 0, 'cons' => $jml);
		$this->mdata->update($where,$update,'barangclient');

		$hasil = $this->mdata->tampil_where('produkclient_details',$where)->result();
		foreach ($hasil as $h) {
			$update2 = array('jumlah' => $h->jumlah*$jml);
			$where2 = array('idcabang' => $id, 'idbarang' => $idbarang, 'idproduk' => $h->idproduk);
			$this->mdata->update(array('idproduk' => $h->idproduk),array('flag' => 0), 'produkclient');
			$this->mdata->update($where2,$update2,'produkclient_details');
		}
		if ($this->db->trans_status() === FALSE)
		{
						$this->db->trans_rollback();
		}
		else
		{
						$this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE, 'pesan' => 'Satuan berhasil dikonversi '));
	}

	function komposisi()
	{
		$idproduk = $this->input->get('idproduk',true);
		$idcabang = $this->input->get('idcabang',true);
		$hasil = $this->mdata->tampil_join4('produkclient_details',$idproduk,$idcabang)->result();
		$barang = $this->mdata->tampil_where('barangclient',array('idcabang' => $idcabang))->result();
		$row = $this->mdata->tampil_join4('produkclient_details',$idproduk,$idcabang)->num_rows();
		$output = '';
		$x = 1;
		foreach ($hasil as $h) {
			$output .= '<div class="input3" id="komposisi'.$x.'">';
			$output .= '<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Nama bahan</label>
										<div class="col-md-7">
											<select name="pil[]" class="form-control pil2" onchange="" id="pilihan" required>';
											foreach ($barang as $b) {
												if($h->idbarang == $b->idbarang){
													$output .= '<option value="'.$b->idbarang.'" selected>'.$b->nama.'</option>';
												}else{
													$output .= '<option value="'.$b->idbarang.'">'.$b->nama.'</option>';
												}
											}
			$output .= '</select></div></div>';
			$output .= '<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Jumlah</label>
										<div class="col-md-3">
											<input name="jml[]" id="" value="'.$h->jumlah.'" placeholder="" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
											<input name="harga[]" id="" value="'.$h->harga.'" class="form-control" type="hidden">
										</div>
										<label class="control-label col-md-1" style="padding-left:3px">Satuan</label>
										<div class="col-md-3 colsatuan">
											<input name="" value="'.$h->satuan.'" id="" class="form-control" type="text" disabled>
									</div>';
									if($x == $row){
										$output .= '<div class="col-md-1"><a class="btn btn-primary btn-sm plusss" id="plus'.$x.'"><i class="fa fa-plus"></i></a></div>
										<div class="col-md-1"><a class="btn btn-danger btn-sm minusss" id="minus'.$x.'"><i class="fa fa-minus"></i></a></div></div></div>';
									}else{
										$output .= '<div class="col-md-1"><a class="btn btn-primary btn-sm plusss hidden" id="plus'.$x.'"><i class="fa fa-plus"></i></a></div>
										<div class="col-md-1"><a class="btn btn-danger btn-sm minusss hidden" id="minus'.$x.'"><i class="fa fa-minus"></i></a></div></div></div>';
									}
			$x++;
		}

		echo $output;
	}

	function simpankomposisi()
	{
		$this->db->trans_begin();
		$idproduk = $this->input->post('idproduk',true);
		$idcabang = $this->input->post('idcabang',true);
		$idbarang = $this->input->post('pil',true);
		$harga = $this->input->post('harga',true);
		$jml = $this->input->post('jml',true);
		$total = 0;
		$n = sizeof($idbarang);
		$where = array('idcabang' => $idcabang, 'idproduk' => $idproduk);
		$this->mdata->hapus($where,'produkclient_details');
		for ($i = 0; $i < $n; $i++){
			$total = $total + ($harga[$i]*$jml[$i]);
			$where2 = array('idcabang' => $idcabang, 'idproduk' => $idproduk, 'idbarang' => $idbarang[$i], 'jumlah' => $jml[$i]);
			$this->mdata->simpan('produkclient_details',$where2);
		}

		$where2 = array('idcabang' => $idcabang, 'idproduk' => $idproduk);
		$update2 = array('harga' => $total, 'flag' => 0);
		$this->mdata->update($where2,$update2,'produkclient');
		if ($this->db->trans_status() === FALSE)
		{
						$this->db->trans_rollback();
		}
		else
		{
						$this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE, 'pesan' => 'Komposisi produk berhasil diubah'));
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
          $kolom => $isi,
					'flag' => 0
        );
				$where = array(
					'idcabang' => $idcabang,
					$kolomwhere => $id
				);

        $this->mdata->editsimpan($where,$fields,$table);
				if($table== 'barangclient' && $kolom == 'harga'){
          $this->updateharga($id,$idcabang);
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

	function updateharga($id,$idcabang)
  {
    $this->db->trans_begin();
    $produk = $this->mdata->tampil_where('produkclient_details',array('idbarang' => $id,'idcabang' => $idcabang))->result();
    foreach ($produk as $p) {
      $total = 0;
      $hasil = $this->mdata->tampil_join4('produkclient_details',$p->idproduk,$idcabang)->result();
      foreach ($hasil as $h) {
        $total = $total + ($h->jumlah*$h->harga);
      }
      $this->mdata->update(array('idproduk' => $p->idproduk, 'idcabang' => $idcabang ), array('harga' => $total,'flag' => 0),'produkclient');
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

	function simpanproduk(){
    $this->db->trans_begin();
		$idcabang = $this->input->post('idcabang',true);
    $idproduk = $this->input->post('idproduk',true);
    $idbarang = $this->input->post('pil',true);
    $nama = $this->input->post('nama',true);
    $jml = $this->input->post('jml',true);

    $n = sizeof($idbarang);
    $total = 0;
    for ($i = 0; $i < $n; $i++){
      $hasil = $this->mdata->harga(array('idbarang' => $idbarang[$i], 'idcabang' => $idcabang), 'barangclient')->result();
      $total = $total + ($hasil[0]->harga * $jml[$i]);
    }
    $input2 = array('idcabang' => $idcabang ,'idproduk' => $idproduk, 'nama' => $nama, 'harga' => $total);
    $this->mdata->simpan('produkclient',$input2);

    for ($i = 0; $i < $n; $i++){
      $input = array(
				'idcabang' => $idcabang,
        'idbarang' => $idbarang[$i],
        'idproduk' => $idproduk,
        'jumlah' => $jml[$i]
      );
      $this->mdata->simpan('produkclient_details',$input);
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

	function pilihbarang($id){
		$barang = $this->mdata->tampil_where('barangclient',array('idcabang' => $id))->result();
		$output = '<option value="" selected>--Pilih--</option>';
		foreach ($barang as $b) {
			$output .= '<option value="'.$b->idbarang.'">'.$b->nama.'</option>';
		}

		echo $output;
	}

	function satuanbarangclient()
	{
		$id = $this->input->get('idbarang',true);
		$idcabang = $this->input->get('idcabang',true);
		$where = array('idbarang' => $id, 'idcabang' => $idcabang);
		$data = $this->mdata->tampil_where('barangclient', $where)->result();
		echo '<input name="" value="'.$data[0]->satuan.'" id="" class="form-control" type="text" disabled><input name="harga[]" id="" value="'.$data[0]->harga.'" class="form-control" type="hidden">';
	}

	function satuanbarang()
	{
		$id = $this->input->get('idbarang',true);
		$where = array('idbarang' => $id);
		$data = $this->mdata->tampil_where('barang', $where)->result();
		echo '<input name="satuan[]" value="'.$data[0]->satuan.'" id="" class="form-control" type="text" readOnly><input name="harga[]" id="" value="'.$data[0]->harga.'" class="form-control" type="hidden">';
	}
}
