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

  function cabang_get()
  {
    $valid_logins = $this->mdata->cabang();
    $id = $this->get('id');
    if ($id == ''){
      $cabang = $this->mdata->tampil_cabang()->result();
    }
    else {
      $cabang = $this->db->where('id',$id)->get('cabang')->result();
    }

    $this->response($cabang, 200);
  }
}
