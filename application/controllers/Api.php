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
    $id = $this->get('id');
    $cabang = $this->db->where('idcabang',$id)->get('barang')->result();
    $this->response($cabang, 200);
  }

  function cabangid_get()
  {
    $user = $this->get('user');
    $id = $this->db->query('select id from cabang where user = "'.$user.'"')->result();
    $this->response($id,200);
  }
}
