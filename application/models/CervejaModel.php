<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class CervejaModel extends CI_Model {
	public function getAllCevas(){
		return $this->db->get('cerveja')->result_array();
	}

	public function getUserCevas($id_fella){
		$this->db->where('id', $id_fella);
		return $this->db->get('cerveja')->result();
	}
	
	public function updateCevas($id, $cevas){
		$this->db->set('quantidade', $id);
		$this->db->where('id', $cevas);
		return $this->db->update('cerveja');
	}

}