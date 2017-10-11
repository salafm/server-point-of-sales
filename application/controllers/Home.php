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

	function notifikasi(){
		$d = (int)date('d');
		$m = (int)date('m');
		$y = (int)date('Y');
		$output = '';
		$hasil = $this->db->query('SELECT * FROM logs WHERE (uri like "%delete%" OR uri like "%stokproduk%") AND  (DAY(tanggal) = '.$d.' AND MONTH(tanggal) = '.$m.' AND YEAR(tanggal) = '.$y.') AND terbaca = 0 AND response_code = 200')->result();
		$error = $this->db->query('SELECT * FROM logs WHERE (DAY(tanggal) = '.$d.' AND MONTH(tanggal) = '.$m.' AND YEAR(tanggal) = '.$y.') AND terbaca = 0 AND response_code != 200')->result();
		$notif = '';
		$bubble ='';
		if(sizeof($error) > 0){
			$this->mdata->update(array('response_code != '=> 200),array('terbaca' => 1),'logs');
			$notif=0;
			$bubble = 'badge bg-red';
			$uri = explode('/',$h->uri);
			foreach ($error as $e) {
				$output .= '<li>
											<a>
												<span class="image"><img src="'.base_url('build/images/index.png').'" alt="Profile Image" /></span>
												<span>
													<span>Tidak diketahui ('.$e->ip_address.')</span>
													<span class="time">'.strftime('%T', strtotime($e->tanggal)).'</span>
												</span>
												<span class="message">Ip address <b>'.$e->ip_address.'</b> berusaha mengakses server dengan API Key <b>'.$uri[6].'</b> namun gagal.</span>
											</a>
										</li>';
				$notif++;
			}
			$output .= '<li>
										<div class="text-center">
											<a>
												<strong>Lihat semua aktifitas client</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>';
		}else if(sizeof($hasil)>0){
			$this->mdata->update(array('response_code' => 200),array('terbaca' => 1),'logs');
			$c = 1;
			$notif=0;
			foreach ($hasil as $h) {
				$bubble = 'badge bg-green';
				$cabang = $this->mdata->tampil_where('cabang',array('ip' => $h->ip_address))->result();
				$nama = $cabang[0]->nama.' ('.$cabang[0]->ip.')';
				$uri = explode('/',$h->uri);
				if($uri[1] == 'cekdelete'){
					$output .= '<li>
												<a>
													<span class="image"><img src="'.base_url('build/images/user.png').'" alt="Profile Image" /></span>
													<span>
														<span>'.$nama.'</span>
														<span class="time">'.strftime('%T', strtotime($h->tanggal)).'</span>
													</span>
													<span class="message">'.$cabang[0]->nama.' menerima data dari server dan mengupdate harga, stok barang dan produk dengan API Key <b>'.$h->api_key.'</b></span>
												</a>
											</li>';
					$notif++;
				}elseif($uri[1] == 'stokproduk' && $c == 1){
					$output .= '<li>
												<a>
													<span class="image"><img src="'.base_url('build/images/user.png').'" alt="Profile Image" /></span>
													<span>
														<span>'.$nama.'</span>
														<span class="time">'.strftime('%T', strtotime($h->tanggal)).'</span>
													</span>
													<span class="message">'.$cabang[0]->nama.' mengirim data dan mengupdate stok di server dengan API Key <b>'.$h->api_key.'</b></span>
												</a>
											</li>';
					$c++;
					$notif++;
				}
			}
			$output .= '<li>
										<div class="text-center">
											<a>
												<strong>Lihat semua aktifitas client</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>';
		}else{
			$output .= '<li>
										<div class="message">
												<span>Tidak ada aktifitas terbaru client</span>
										</div>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>Lihat semua aktifitas client</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>';
		}

		echo json_encode(array('isi' => $output,'notif' => $notif,'bubble' => $bubble));
	}
}
