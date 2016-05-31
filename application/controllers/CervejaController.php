<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CervejaController extends CI_Controller {
	
    var $sess = 'login';

	public function __construct() {
		parent::__construct();
		$this->load->model('CervejaModel');
		$this->load->library('session');
	}

	public function index(){
		$data['cerveja'] = $this->CervejaModel->getAllCevas();
		if($this->session->userdata($this->sess)){
		    $this->load->view('viewHome', $data);
		}else{
		    $this->load->view('home',$data);
		}
	}

	public function changeCevas(){
		if($this->CervejaModel->updateCevas($this->input->post('id'), $this->input->post('cevas'))){
			echo "1";
		}else{
			echo "-1";
		}
	}

	public function getUniqueUser(){
		$quantia = $this->CervejaModel->getUserCevas($this->input->post('fella'));
		if($quantia){
			$data['quantia'] = $quantia;
			echo json_encode($data['quantia']);
		}else{
			echo "-1";
		}
	}
}
