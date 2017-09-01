<?php 
 
class mdata extends CI_Model{	
	function tampil_cabang(){		
		return $this->db->get('cabang');
	}	
	
	function tampil_barang($table, $where){
		return $this->db->get_where('barang', $where);
	}
	
	function editsimpan($id,$fields){
		$this ->db->where('id',$id)->update('cabang',$fields);
    }
}