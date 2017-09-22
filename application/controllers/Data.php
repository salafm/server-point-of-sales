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
		$data['produk'] = $this->mdata->tampil_all('produk')->result();
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
		  <td><button class="btn btn-danger btn-xs" onclick="hapus('.$d->id.')"><i class="fa fa-remove"></i></button></td></tr>';
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
		  <td><button class="btn btn-danger btn-xs" onclick="hapus('.$da->id.')"><i class="fa fa-remove"></i></button></td></tr>';
		}
	}

	function simpanbarang()
	{
		$this->db->trans_begin();
		$id = $this->input->post('idcabang',true);
		$idtrans = $this->input->post('idtrans',true);
		$idtrans = 'out'.$idtrans;
		$idproduk = $this->input->post('pil',true);
		$nama = $this->input->post('nama',true);
		$kategori = $this->input->post('kategori',true);
		$harga = $this->input->post('harga',true);
		$desk = $this->input->post('desk',true);
		$jml = $this->input->post('jml',true);
		$n = sizeof($idproduk);
    for ($i = 0; $i < $n; $i++){
			//input barangkeluar_details
      $input = array(
				'idtransaksi' => $idtrans,
        'idproduk' => $idproduk[$i],
        'jumlah' => $jml[$i],
				'harga' => $harga[$i]
      );
			//cek apakah sudah ada produk di produkclient
			$where = array (
				'idproduk' => $idproduk[$i],
				'idcabang' => $id
			);
			//cek???
			$where2 = array (
				'idproduk' => $idproduk[$i]
			);

      $this->mdata->simpan('barangkeluar_details',$input);											//simpan barangkeluar_details
			//cek apakah sudah ada produk ini di tabel produkclient
			$cek = $this->mdata->tampil_where('produkclient',$where)->num_rows();
			if($cek == 0){
				//input produkclient
				$inputprodukclient = array(
						'idcabang' => $id,
		        'idproduk' => $idproduk[$i],
						'nama' => $nama[$i],
						'harga' => $harga[$i],
						'kategori' => $kategori[$i]
				);
				$this->mdata->simpan('produkclient',$inputprodukclient);								//simpan produkclient
			}

			//ambil idbarang dari produk_details
			$idbarang = $this->mdata->tampil_where('produk_details',$where2)->result();
			foreach ($idbarang as $idb) {
				//cek apakah sudah ada barang di barangclient
				$where3 = array('idbarang' => $idb->idbarang, 'idcabang' => $id);
				$cekbarang = $this->mdata->tampil_where('barangclient',$where3)->num_rows();
				if($cekbarang == 0){
					//ambilharga dari table barang
					$where4 = array('idbarang' => $idb->idbarang );
					$barang = $this->mdata->tampil_where('barang',$where4)->result();
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

			$where5 = array('idcabang' => $id, 'idproduk' => $idproduk[$i]);
			$cekproduk = $this->mdata->tampil_where('produkclient_details',$where5)->num_rows();
			if($cekproduk == 0){
				$produkdetails = $this->mdata->tampil_where('produk_details',$where2)->result();
				foreach ($produkdetails as $p) {
					$inputprodukdetails = array(
						'idcabang' => $id,
						'idproduk' => $idproduk[$i],
						'idbarang' => $p->idbarang,
						'jumlah' => $p->jumlah
					);
					$this->mdata->simpan('produkclient_details',$inputprodukdetails);
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
		$this->mdata->hapus($id,$table);
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

	function hargaproduk($id)
  {
    $where = array('idproduk' => $id);
    $data = $this->mdata->tampil_where('produk', $where)->result();
    $output1 =  '<input name="harga[]" id="" value="'.$data[0]->harga.'" class="form-control harga" placeholder="Harga produk" type="text" readOnly>';
		$output2 = $data[0]->kategori;
		$output = array('output1' => $output1, 'output2' => $output2);
		echo json_encode($output);
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
		$update2 = array('jumlah' => $hasil[0]->jumlah*$jml);
		$this->mdata->update($where,$update2,'produkclient_details');
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
		$output = '';
		foreach ($hasil as $h) {
			$output .= '<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Nama bahan</label>
										<div class="col-md-8">
											<input name="idbarang[]" id="" value="'.$h->idbarang.'" class="form-control" type="hidden">
											<input name="jml" id="" title="" placeholder="" value="'.$h->nama.'" class="form-control" type="text" disabled>
									</div></div>';
			$output .= '<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Jumlah</label>
										<div class="col-md-3">
											<input name="jml[]" id="" value="'.$h->jumlah.'" placeholder="" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
											<input name="harga[]" id="" value="'.$h->harga.'" class="form-control" type="hidden">
										</div>
										<label class="control-label col-md-2" style="padding-left:3px">Satuan</label>
										<div class="col-md-3">
											<input name="" value="'.$h->satuan.'" id="" class="form-control" type="text" disabled>
									</div></div>';
		}

		echo $output;
	}

	function simpankomposisi()
	{
		$this->db->trans_begin();
		$idproduk = $this->input->post('idproduk',true);
		$idcabang = $this->input->post('idcabang',true);
		$idbarang = $this->input->post('idbarang',true);
		$harga = $this->input->post('harga',true);
		$jml = $this->input->post('jml',true);
		$total = 0;
		$n = sizeof($idbarang);
		for ($i = 0; $i < $n; $i++){
			$total = $total + ($harga[$i]*$jml[$i]);
			$where = array('idcabang' => $idcabang, 'idproduk' => $idproduk, 'idbarang' => $idbarang[$i]);
			$update = array('jumlah' => $jml[$i]);
			$this->mdata->update($where,$update,'produkclient_details');
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
}
