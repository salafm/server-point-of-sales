<?php 
 
class mdata extends CI_Model{	
	function tampil_cabang(){		
		return $this->db->get('cabang');
	}	
	
	function tampi_barang($id){
		return $this->db->get_where('barang', $id);
	}
}