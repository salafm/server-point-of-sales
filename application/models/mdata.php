<?php

class mdata extends CI_Model{

  function apicabang()
  {
    $hasil = $this->db->query('select user, pass from cabang')->result();
    foreach ($hasil as $h ) {
      $user[] = $h->user;
    }
    foreach ($hasil as $h ) {
      $pass[] = $h->pass;
    }
    return $result = array_combine($user,$pass);
  }

  function apiip()
  {
    $hasil = $this->db->query('select ip from cabang')->result();
    $ip = '';
    foreach ($hasil as $h ) {
      $ip = $ip.$h->ip.',';
    }
    return $ip;
  }

	function tampil_cabang(){
		return $this->db->get('cabang');
	}

	function tampil_barang($table, $where){
		return $this->db->get_where('barang', $where);
	}

	function editsimpan($id,$fields,$table){
		$this->db->where('id',$id)->update($table,$fields);
    }

	function simpan($table,$data){
		$this->db->insert($table, $data);
	}

	function hapus($id,$table)
	{
		$this->db->where('id',$id)->delete($table);
	}
}
