<?php 
 
class mdata extends CI_Model{	
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