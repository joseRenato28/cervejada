<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{

    public $table = "ceva";

    public function login($email, $senha){
		$this->db->where('email',$email);
		$this->db->where('senha',$senha);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

}