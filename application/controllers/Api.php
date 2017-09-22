<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

/**
 *
 */
class Api extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('mdata');
    $this->config->load('rest');
  }

  function barang_get()
  {
    $id = $this->get('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $cabang = $this->db->where($where)->get('barangclient')->result();
    $this->response($cabang, 200);
  }

  function barang_post()
  {
    $id = $this->post('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $input = array('flag' => 1);
    $this->db->where($where)->update('barangclient',$input);
    $this->response($id, 200);
  }

  function produk_get()
  {
    $id = $this->get('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $cabang = $this->db->where($where)->get('produkclient')->result();
    $this->response($cabang, 200);
  }

  function produk_post()
  {
    $id = $this->post('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $input = array('flag' => 1);
    $this->db->where($where)->update('produkclient',$input);
    $this->response($id, 200);
  }

  function produkdetails_get()
  {
    $id = $this->get('id',true);
    $cabang = $this->db->where('idcabang',$id)->get('produkclient_details')->result();
    $this->response($cabang, 200);
  }

  function barangmasuk_get()
  {
    $id = $this->get('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $cabang = $this->db->where($where)->get('barangkeluar')->result();
    $this->response($cabang, 200);
  }

  function barangmasuk_post()
  {
    $id = $this->post('id',true);
    $where = array('idcabang' => $id, 'flag' => 0);
    $input = array('flag' => 1);
    $this->db->where($where)->update('barangkeluar',$input);
    $this->response($id, 200);
  }

  function bmdetails_get()
  {
    $idtrans = $this->get('id',true);
    $cabang = $this->db->where('idtransaksi',$idtrans)->get('barangkeluar_details')->result();
    $this->response($cabang, 200);
  }

  function cabangid_get()
  {
    $user = $this->get('user',true);
    $id = $this->db->query('SELECT id FROM cabang WHERE user = "'.$user.'"')->result();
    $this->response($id,200);
  }

  function petugas_get()
  {
    $id = $this->get('id',true);
    $petugas = $this->db->where('idcabang',$id)->get('petugas')->result();
    $this->response($petugas, 200);
  }

  function petugas_post(){
    $id = $this->post('id',true);
    $hasil = $this->db->where('id',$id)->get('petugas')->result();
    if($hasil[0]->count == 0){
      $input = array('count' => 1);
    }else{
      $input = array('count' => 0);
    }
    $this->db->where('id',$id)->update('petugas',$input);
    $this->response($id, 200);
  }
}
