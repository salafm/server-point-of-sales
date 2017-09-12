<?php

class mdata extends CI_Model{

  function apicabang()
  {
    $hasil = $this->db->query('SELECT user, pass FROM cabang')->result();
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
    $hasil = $this->db->query('SELECT ip FROM cabang')->result();
    $ip = '';
    foreach ($hasil as $h ) {
      $ip = $ip.$h->ip.',';
    }
    return $ip;
  }

	function tampil_all($table){
		return $this->db->get($table);
	}

	function tampil_where($table, $where){
		return $this->db->get_where($table, $where);
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

  function getId($user)
  {
    $hasil = $this->db->where('user',$user)->get('cabang')->result();
    foreach ($hasil as $h) {
      $result = $h->id;
    }
    return $result;
  }

  function search($search)
  {
    return $this->db->query('SELECT idbarang, nama FROM barang WHERE nama LIKE "%'.$search.'%"');
  }
}
