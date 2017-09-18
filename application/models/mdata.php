<?php
date_default_timezone_set("Asia/Jakarta");
setlocale(LC_ALL, 'IND');


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

	function editsimpan($where,$fields,$table){
		$this->db->where($where)->update($table,$fields);
  }

  function update($where,$fields,$table){
		$this->db->where($where)->update($table,$fields);
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

  function tampil_join1($table,$where){
    return $this->db->query('SELECT '.$table.'.*, barang.nama FROM '.$table.' INNER JOIN barang ON '.$table.'.idbarang = barang.idbarang WHERE idtransaksi = "'.$where.'"');
  }

  function tampil_join2($table,$where){
    return $this->db->query('SELECT '.$table.'.*, produk.nama FROM '.$table.' INNER JOIN produk ON '.$table.'.idproduk = produk.idproduk WHERE idtransaksi = "'.$where.'"');
  }

  function tampil_join3($table,$where){
    return $this->db->query('SELECT * FROM '.$table.' INNER JOIN barang ON '.$table.'.idbarang = barang.idbarang WHERE idproduk = "'.$where.'"');
  }

  function tampil_join4($table,$where1,$where2){
    return $this->db->query('SELECT * FROM '.$table.' INNER JOIN barangclient ON '.$table.'.idbarang = barangclient.idbarang WHERE idproduk = "'.$where1.'" AND '.$table.'.idcabang = '.$where2.' AND barangclient.idcabang = '.$where2.'');
  }

  function harga($where){
    return $this->db->query('SELECT harga FROM barang WHERE idbarang = "'.$where.'" ');
  }

  function namacabang($where){
    return $this->db->query('SELECT nama FROM cabang WHERE id = '.$where.'');
  }
}
